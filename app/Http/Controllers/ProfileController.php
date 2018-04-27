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
		$data['nav_head'] = 'My Profile';
		$data['profile'] = Profile::where('user_id', Auth::user()->id)->first();
		$data['user'] = User::where('id', Auth::user()->id)->first(['fullname']);
		return view('dashboard.my_profile')->with($data);
	}

	//Updating Profile
	public function profile_update(Request $request){
		//dd($request->input());
	    /* Validation */
	    $this->validate($request, [
	        'fullname' => 'required|regex:/^[\pL\s\-]+$/u',
	        'phone' => 'numeric', 
	        //'d_o_b' => 'date',
	        'profile_pic' => 'mimes:jpeg,JPEG,jpg,bmp,png',
	        'cover' => 'mimes:jpeg,JPEG,jpg,bmp,png',
	    ]);

	  try{	
			$user_id = Auth::user()->id;
			$user = User::find($user_id);
			$user->fullname = $request->input('fullname');
			$user_update = $user->save();

			$profile = Profile::where('user_id', $user_id);

			$pro_update = array('phone' => $request->input('phone'), 'gender' => $request->input('gender'), 'age_range' => $request->input('age_range'), 'hair_color' => $request->input('hair_color'), 'eye_color' => $request->input('eye_color'), 'height' => $request->input('height'), 'current_city' => $request->input('current_city'));

			  //updating file if Present
		      if(Input::hasFile('profile_pic')){
		        $file = Input::file('profile_pic');
		        $tmpFilePath = '/storage/profile-pictures';
		        $tmpFileName = time() . '-' . $file->getClientOriginalName();
		        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
		      //$path = $tmpFilePath . $tmpFileName;
		        $path = $tmpFileName;

		        $pro_update['profile_pic'] = $path;
		      }

		        //updating Cover file if Present
		      if(Input::hasFile('cover')){
		        $file = Input::file('cover');
		        $tmpFilePath = '/storage/cover-photos/';
		        $tmpFileName = time() . '-' . $file->getClientOriginalName();
		        $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);		      
		        $path = $tmpFileName;
		        $pro_update['cover'] = $path;
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
				
		        $this->validate($request, [
		            'password' => 'required|confirmed|min:6|max:18',
		        ]);

				//Updating Password
				$newpassword1 = bcrypt($request->input('password'));
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
	        $tmpFilePath = '/storage/profile-pictures/';
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
