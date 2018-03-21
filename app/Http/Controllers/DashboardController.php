<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserMedia;
use App\Profile;
use App\Classes;
use App\ClassStudent;
use Datatables;
use Validator;

class DashboardController extends Controller
{

    public function index(){
    	$data['profile'] = Profile::where('user_id', Auth::user()->id)->first();
        //dd($data['profile']);
    	return view('dashboard.index')->with($data);
    }
    
    public function dash_classes(){

        if(Auth::user()->role_id == 3){ //he is a student
            //Student Classes
            $data['classes'] = Classes::join('users', 'users.id', '=', 'classes.teacher_id')
                               ->join('class_student', 'classes.id', '=', 'class_student.class_id')
                               ->select('classes.id', 'classes.link', 'classes.title', 'users.fullname', 'classes.cost', 'classes.location', 'classes.age')                     
                               ->where('class_student.student_id', '=', Auth::user()->id)
                               ->get();

            //dd($data['classes']);
        }else if(Auth::user()->role_id == 2){ //he is a teacher
            //Teacher Classes
            //dd(1234);
            $data['classes'] = Classes::join('class_student', 'classes.id', '=', 'class_student.class_id')
                               ->join('users', 'users.id', '=', 'class_student.student_id')
                               ->select('classes.title','users.fullname', 'classes.cost', 'classes.location', 'classes.age') 
                               ->where('classes.teacher_id', '=', Auth::user()->id)                         
                               ->get();
           // / dd($data['classes']);                    
        }

    	return view('dashboard.studentclasses')->with($data);
    }

    public function upload_media(Request $request){
        $this->validate($request, [
          'image[]' => 'mimes:jpeg,JPEG,jpg,bmp,png',
          'video[]' => 'mimetypes:video/avi,video/mpeg,video/mp4,mp4,video/quicktime',
          'resume' => 'mimes:pdf'
        ]);
        
       if ($request->hasFile('image')) {
        foreach ($request->file('image') as $value) {       
          $store = New UserMedia;     
              $image=$value;
              $filename=time() . '.' . $image->getClientOriginalExtension();
              $location=public_path('storage/user-images/'.$filename);
              $store->media=$filename;
              $store->media_type = 1;
              $store->user_id = $request->user_id;
              $store->media = $this->UploadFiles('image', $value);             
              $store->save();           
          }
      }     
      if ($request->hasFile('video')) {
        foreach ($request->file('video') as $value) {
          $store = New UserMedia;     
          $video=$value;
          $filename=time() . '.' . $video->getClientOriginalExtension();
          $location=public_path('storage/user-videos/'.$filename);
          $store->media=$filename;
          $store->media = $this->UploadFiles('video', $value);
          $store->media_type = 2;
          $store->user_id = $request->user_id;
          $store->save();
        }
      }
      if ($request->hasFile('resume')) {  
          $store = New UserMedia;     
          $resume=$request->file('resume');
          $filename=time() . '.' . $resume->getClientOriginalExtension();
          $location=public_path('storage/user-resumes/'.$filename);
          $store->media=$filename;
          $store->media = $this->UploadFiles('resume', $request->file('resume'));
          $store->media_type = 3;
          $store->user_id = $request->user_id;
          $store->save();
     
    }
    $this->set_session('You Have Successfully Uploaded Media', true);
    return redirect()->back();
    }

    public function UploadFiles($type, $files){
        
        ini_set('memory_limit','256M');        
        if( $type == 'image' ){
            $path = base_path() . '/public/storage/user-images/';
        }
        if( $type == 'video' ){
            $path = base_path() . '/public/storage/user-videos/';
        }  
        if( $type == 'resume' ){
            $path = base_path() . '/public/storage/user-resumes/';
        }         
        $filename = md5($files->getClientOriginalName() . time()) . '.' . $files->getClientOriginalExtension();
        $files->move($path , $filename);   
        return $filename;
    }
    public function download_resume(Request $request,$id){
      
      $media_resume = UserMedia::where('id',$id)->select('media')->first();      
      return response()->download('public/storage/user-resumes/' . $media_resume->media);
      
       // return redirect()->back();
    }
}
