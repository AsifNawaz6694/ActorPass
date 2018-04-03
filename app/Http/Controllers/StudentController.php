<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\StudentVideo;
use App\Role;
use App\Profile;
use App\Classes;
use App\UserMedia;
use App\QuestionAnswer;
use Auth;
use Illuminate\Support\Facades\Input;
use Hash;
use DB;
use PDF;
use Response;

class StudentController extends Controller
{
	public function video_upload($id,Request $request){
        if(Auth::user()->role_id == '1' || DB::table('classes')->where('id',$id)->exists() && DB::table('class_student')->where('class_id', '=', $id)->where('student_id','=',Auth::user()->id)->exists()) {
            $class_id = $id;
            $class = Classes::where('id',$class_id)->select('class_status')->first();
            
            $variable = StudentVideo::select('question_answers.id as quesID','question_answers.question', 'student_videos.*')
            ->rightJoin('question_answers', function($join){
                $join->on('student_videos.id', '=', 'question_answers.video_id');
                
            })->where('student_videos.student_id',Auth::user()->id)->where('student_videos.class_id',$id)->get();

            $question = QuestionAnswer::get();
            //dd($class);
            return view('front.video_upload',['class_id'=>$class_id,'variable'=>$variable,'question'=>$question,'class'=>$class]);
        }else{            
            return abort(404);
        }		
	}
	public function submit_video(Request $request){

        if (!empty($request->video_id) && isset($request->video_id)) {
             foreach ($request->question as $key => $value) {
            $storeq = QuestionAnswer::find($request->quesID[$key]);  
            $storeq->video_id = $request->video_id;
            $storeq->question = $value;
            $storeq->save();            
        }
            $store = StudentVideo::find($request->video_id);           
        }else{     
            $store = new StudentVideo;                
        }
        $store->class_id = $request->class_id;
        $store->description = $request->description;
		$store->student_id =Auth::user()->id;
		if ($request->hasFile('video')) {
          $video=$request->file('video');
          $filename=time() . '.' . $video->getClientOriginalExtension();
          $location=public_path('assets/lecturevideos/'.$filename);
          $store->video=$filename;
        }else{
            $this->set_session('Select The Video To Upload', false);        
        }
        $store->video = $this->UploadFiles('video', Input::file('video'));
        $store->save();
        if (empty($request->video_id) && !isset($request->video_id)) {
            foreach ($request->question as $value) {
                $storeq = new QuestionAnswer; 
                $storeq->video_id = $store->id;
                $storeq->question = $value;
                $storeq->save();            
            } 
        }

          if (!empty($request->video_id) && isset($request->video_id)) {            
            $this->set_session('You Have Successfully Updated Video', true);
        }else{            
            $this->set_session('You Have Successfully Uploaded Video', true);
        }
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
            $args['media_images'] = UserMedia::where('user_id',$id)->where('media_type',1)->get();
            $args['media_videos'] = UserMedia::where('user_id',$id)->where('media_type',2)->get();
            $args['media_resume'] = UserMedia::where('user_id',$id)
                                               ->where('media_type',3)
                                               ->orderBy('id','DESC')
                                               ->first();            
            return view('front.student_profile')->with($args);
        }   
    	
}