<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classes;
use App\StudentVideo;
use App\User;
use App\Role;
use App\Comment;
use Mail;
use Auth;
use DB;
use Session;
class PagesController extends Controller
{
    public function index(){
    	return view('front.index');
    }  
    public function public_wall($id){
      if (DB::table('class_student')->where('class_id', '=', $id)->where('student_id','=',Auth::user()->id)->exists() || DB::table('classes')->where('id', '=', $id)->where('teacher_id','=',Auth::user()->id)->exists() || Auth::user()->role_id == '1') {
            $args['videos']= StudentVideo::leftJoin('users','users.id','=','student_videos.student_id')
                                        ->leftJoin('profile','profile.user_id','=','users.id')
                                        ->select('student_videos.id','profile.profile_pic','student_videos.status','student_videos.description','student_videos.video','student_videos.created_at','users.fullname')
                                        ->where('student_videos.class_id','=',$id)
                                        ->where('student_videos.status','=',1)
                                        ->orderBy('student_videos.id','DESC')
                                        ->get();
            foreach ($args['videos'] as $value) {            
                $args['comments'][$value->id] = Comment::where('video_id','=',$value->id)
                                        ->get();
            }
            return view('front.class_wall')->with($args);           
        }
        
    }  
    public function post_comment(Request $request){
        if (Auth::user()->role_id == '2') {
            $comment = new Comment;
            $comment->user_id = $request->user_id;
            $comment->video_id = $request->video_id;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect()->back();
        }else{
            $this->set_session('Only Teacher Can Comment.', false);
            return redirect()->back();
        }
        
    }
    public function contact_page(Request $request){
        if (Auth::check()) {
            $emailer_name = $request->name;
            $emailer_email = $request->email;
            $emailer_subject = $request->subject;
            $emailer_message = $request->user_message;
            Mail::send('email.contact_page',['emailer_name'=>$emailer_name,'emailer_email'=>$emailer_email,'emailer_subject'=>$emailer_subject,'emailer_message'=> $emailer_message] , function ($message) use($emailer_email){
                $message->from($emailer_email, 'Actor Pass - Contact Page');
                $message->to('asifnawaz.aimviz@gmail.com')->subject('ACTOR PASS - Contact Email');
            }); 
            $this->set_session('You Have Successfully Send An Email', true);
            return redirect()->back();           
        }else{
            
            $this->set_session('Please First Log In To Send An Emails', false);
            return redirect()->back();            
        }
    }
}
