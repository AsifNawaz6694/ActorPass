<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Support\Facades\Input;
use Hash;

class StudentController extends Controller
{

	public function video_upload($id){	
		$class_id = $id;				
		return view('front.video_upload',['class_id'=>$class_id]);
	}
	public function submit_video(){	
		
	}
	
}
