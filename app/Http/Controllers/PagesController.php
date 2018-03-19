<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classes;
use App\StudentVideo;
use App\User;
use App\Role;
use Mail;
use Auth;
use Session;
class PagesController extends Controller
{
    public function index(){
    	return view('front.index');
    }  
    public function public_wall($id){    	       
        $args['videos'] = StudentVideo::leftJoin('users','users.id','=','student_videos.student_id')
        ->leftJoin('profile','profile.user_id','=','users.id')
        ->select('profile.profile_pic','student_videos.status','student_videos.description','student_videos.video','student_videos.created_at','users.fullname')
        ->where('student_videos.class_id','=',$id)
        ->where('student_videos.status','=',1)
        ->orderBy('student_videos.id','DESC')
        ->get();
        return view('front.public_wall')->with($args);
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
            return redirect()->back();
            Session::flash('success_msg','You Have Successfully Send An Email');
        }else{
            Session::flash('error_msg','Please First Log In To Send An Emails');
            return redirect()->back();            
        }
    }
}
