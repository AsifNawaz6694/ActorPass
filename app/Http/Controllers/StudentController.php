<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\StudentVideo;
use App\Role;
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
	public function submit_video(Request $request){	
		$store = new StudentVideo;
        $store->class_id = $request->class_id;
		$store->description = $request->description;
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

    public function student_wall($id){
        $user = User::where('id',$id)->first();
        $role = Role::select('name')->where('id','=',$user->role_id)->first();
        $videos = StudentVideo::leftJoin('users','users.id','=','student_videos.student_id')
                                ->select('student_videos.description','student_videos.video','student_videos.created_at','users.fullname')
                                ->where('student_videos.student_id','=',$id)
                                ->get();
    	return view('front.student_wall',['videos'=>$videos,'user'=>$user,'role'=>$role]);
    }

        public function update_cover(Request $request){  
            $user_id = $request->student_id;
            $p = Profile::where('user_id','=',$user_id);
             if (Input::hasFile('cover')) {             
              $cover=Input::file('cover');
              $filename=time() . '.' . $cover->getClientOriginalExtension();          
              $location=public_path('/storage/cover-photos/'.$filename);
              $result  = $this->MyUploadFiles('cover', Input::file('cover'));        
            }
            if($result){
                $p = $p->update(["cover" => $result]); 
                return \Response::json(array('success' => true, 'code' => 200), 200);         
            }else{
            }
            return redirect()->back();
        }  
        
          public function MyUploadFiles($type, $files){
            // Uploading Files[image & video]
            ini_set('memory_limit','256M');
            $path = base_path() . '/public/storage/cover-photos/';
            if( $type == 'cover' ){
                $path = base_path() . '/public/storage/cover-photos/';
            }         
            $filename = md5($files->getClientOriginalName() . time()) . '.' . $files->getClientOriginalExtension();
            $files->move( $path , $filename);   
            return $filename;
        }   

        public function student_profile($id){
            $args['user'] = User::find($id);   
            $args['role'] = Role::select('name')->where('id','=',$args['user']->role_id)->first();   
            return view('front.student_profile')->with($args);
        }   
    	
}