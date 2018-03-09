<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Profile;
use Auth;
use DB;
class AdminController extends Controller
{
    public function users(){
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    public function user_view($id){
    	$user = User::find($id);
    	if($user){    		
    		return view('admin.users.view', compact('user'));
    	}
    	else{
    		dd('no result found');
    	}
    }

    public function user_edit($id){
        $user = User::find($id);
        if($user){            
            return view('admin.users.edit', compact('user'));
        }
        else{
            dd('no result found');
        }
    }
   
    public function ImageUpload(){
        $img_name = '';
        if(Input::file('profile_pic')){      
        $img_name = $this->UploadImage('profile_pic', Input::file('profile_pic'));

        Profile::where('user_id' ,'=', '1')->update([
        'profile_pic' => $img_name
        ]);  
        $path = asset('public/storage/profile-pictures/').'/'.$img_name; 
        return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        }else{      
        return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }
    }

    public function update(Request $request,$id){
       //updating users table data
       $update_user = User::find($id);
       $update_user->fullname = $request->fullname;
       $update_user->email =$request->email;
       $update_user->verified =$request->verified; 
       $update_user->save();
       //updating user picture
       if (!empty($request->profile_pic)) {
            $img_name = '';                 
            $img_name = $this->UploadImage('profile_pic', Input::file('profile_pic'));
            Profile::where('user_id' ,'=', $id)->update([
            'profile_pic' => $img_name
            ]);  
            $path = asset('public/storage/profile-pictures/').'/'.$img_name;                     
        }
       DB::table('profile')
            ->where('user_id', $id)
            ->update([
                'phone' => $request->phone,
                'gender' => $request->gender,
                'd_o_b' => $request->d_o_b
            ]);
        return redirect()->route('users');
    }

    public function UploadImage($type, $file){
        if( $type == 'profile_pic'){
        $path = 'public/storage/profile-pictures/';
        }
        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }
}