<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{

	//Dashboard Profile index function
	public function index(){		
		$data['profile'] = Profile::where('user_id', Auth::user()->id)->first();
		$data['user'] = User::where('id', Auth::user()->id)->first(['fullname']);
		return view('dashboard.my_profile')->with($data);
	}

	//Updating Profile

	public function profile_update(Request $request){

	  try{	
			$user_id = Auth::user()->id;
			$user = User::find($user_id);
			$user->fullname = $request->input('fullname');
			$user_update = $user->save();

			$profile = Profile::where('user_id', $user_id);

			$pro_update = array('phone' => $request->input('phone'), 'd_o_b' => $request->input('d_o_b'), 'gender' => $request->input('gender'));

			  //updating file if Present
		      if(Input::hasFile('profile_pic')){
		        $file = Input::file('profile_pic');
		        $tmpFilePath = '/dashboard_assets/images/profile';
		        $tmpFileName = time() . '-' . $file->getClientOriginalName();
		        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
		      //$path = $tmpFilePath . $tmpFileName;
		        $path = $tmpFileName;

		        $pro_update['profile_pic'] = $path;
		      }
			
			$profile_update = $profile->update($pro_update);

			if($user_update && $profile_update){
	           $this->set_session('Profile Updated', true);
			}else{
	           $this->set_session('Profile couldnot be Updated', false);			
			}

	        return redirect()->route('profile_index');

	  }catch(\Exception $e){
            $this->set_session('Profile couldnot be Updated. '.$e->getMessage(), false);
            return redirect()->route('profile_index');                
      }
	}

}
