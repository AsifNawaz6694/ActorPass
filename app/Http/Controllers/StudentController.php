<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\StudentVideo;
use Auth;
use Illuminate\Support\Facades\Input;
use Hash;

class StudentController extends Controller
{


	public function video_upload($id){	
		$class_id = $id;				
		return view('front.video_upload',['class_id'=>$class_id]);
	}
	public function submit_video(Request $request){	
		$store = new StudentVideo;
		$store->class_id = $request->class_id;
		$store->student_id =1;
		if ($request->hasFile('video')) {
          $video=$request->file('video');
          $filename=time() . '.' . $video->getClientOriginalExtension();
          $location=public_path('assets/lecturevideos/'.$filename);
          $store->video=$filename;
        }
        $store->video = $this->UploadFiles('video', Input::file('video'));
        $store->save();
        return redirect()->back();
	}

	public function UploadFiles($type, $files){
        // Uploading Files[image & video]
        ini_set('memory_limit','256M');
        $path = base_path() . '/public/assets/lecturevideos/';
        if( $type == 'video' ){
            $path = base_path() . '/public/assets/lecturevideos/';
        }         
        $filename = md5($files->getClientOriginalName() . time()) . '.' . $files->getClientOriginalExtension();
        $files->move( $path , $filename);   
        return $filename;
    }

    public function student_profile($id){
    	return view('front.student_profile');
    }
	
}