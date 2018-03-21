<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Support\Facades\Input;
use Hash;


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

	public function edit_password_post(Request $request){

		/* Validation */
	  try{

			if (Hash::check($request->input('oldpassword'), Auth::user()->password)) {
			    // The passwords match...
				
				//Updating Password
				$newpassword1 = bcrypt($request->input('newpassword1'));
				$user = User::find(Auth::user()->id);
				$user->password = $newpassword1;
				$password_updated = $user->save();

				if($password_updated){
		           $this->set_session('Password Updated', true);
				}else{
		           $this->set_session('Password couldnot be Updated. Please try again.', false);			
				}
			
			}else{
				//old password doesn't match
		        $this->set_session('Please enter Correct Previous Password to change your Password.', false);			
			}
		
		    return redirect()->route('profile_index');

	  }catch(\Exception $e){
            $this->set_session('Password couldnot be Updated. '.$e->getMessage(), false);
            return redirect()->route('profile_index');                
      }

	}

	public function image_upload(Request $request){

	   try{

	      if(Input::hasFile('image_upload')){

	        $file = Input::file('image_upload');
	        $tmpFilePath = '/dashboard_assets/images/profile';
	        $tmpFileName = time() . '-' . $file->getClientOriginalName();
	        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);

	        $path = $tmpFileName;
	        $profile = Profile::where('user_id', Auth::user()->id); 
	        $result = $profile->update(['profile_pic'=>$path]);
	        //return $result;

	        if($result){
	        	return \Response::json(array('success' => true, 'code' => 200), 200);  
	        }else{
	        	return \Response::json(array('success' => false, 'code' => 422), 422);  
	        }
	      }

	  }catch(\Exception $e){
            return \Response::json(array('success' => false, 'code' => 422), 422);                
      }	      
	}

}
