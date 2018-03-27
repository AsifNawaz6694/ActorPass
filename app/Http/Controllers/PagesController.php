<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Classes;
use App\StudentVideo;
use App\User;
use App\Winner;
use App\Role;
use App\Comment;
use Mail;
use Auth;
use DB;
use Session;
use App\QuestionAnswer;

class PagesController extends Controller
{
    public function index(){
        //dd(Auth::check());
    	return view('front.index');
    }

    public function take_class(){
    $classes = Classes::leftJoin('users','users.id','=','classes.teacher_id')->leftJoin('profile','profile.user_id','=','classes.teacher_id')->paginate(10);
    
    return view('front.takeaclass',['classes' => $classes]);
    }
    
    public function public_wall($id){


      if ( ( DB::table('classes')->where('id', '=', $id)->where('teacher_id','=',Auth::user()->id)->exists() )|| ( Auth::user()->role_id == '1' ) || ( DB::table('winners')->where('class_id',$id)->exists() &&  DB::table('class_student')->where('class_id',$id)->where('student id',Auth::user()->id) ) ){

             $args['winner'] = DB::table('winners')->leftJoin('users','users.id','winners.user_id')->select('user_id as winner_id')->where('class_id',$id)->first();
            
            $args['videos']= StudentVideo::leftJoin('users','users.id','=','student_videos.student_id')
                                        ->leftJoin('profile','profile.user_id','=','users.id')
                                        ->leftJoin('classes','classes.id','=','student_videos.class_id')
                                        ->select('classes.teacher_id','student_videos.class_id','student_videos.id','users.id as user_id','profile.profile_pic','student_videos.status','student_videos.description','student_videos.video','student_videos.created_at','users.fullname')
                                        ->where('student_videos.class_id','=',$id)
                                        ->where('student_videos.status','=',1)
                                        ->orderBy('student_videos.id','DESC')
                                        ->get();
                                        
            foreach ($args['videos'] as $value) {   
                $args['comments'][$value->id] = Comment::where('video_id','=',$value->id)
                                        ->get();
            }

            /* Getting Question/Answers of this Class */
            $args['question_answers'] = QuestionAnswer::join('student_videos', 'student_videos.id', '=', 'question_answers.video_id')
                ->select('question_answers.video_id', 'question_answers.question', 'question_answers.answer', 
                    'question_answers.id as question_id')
                ->where('student_videos.class_id', $id)->get();
            //dd($args['question_answers']);
            //dd($args['videos']);
             return view('front.class_wall')->with($args);           
        }else{
           return abort(404);
        }
    }

    public function winner(Request $request,$id,$class_id){
        $winner_id = Winner::where('class_id',$class_id)->first();        
        if (DB::table('winners')->where('class_id', '=', $class_id)->exists()) {              
            $winner = Winner::find($winner_id->id);            
        }
        else{ 
            $winner = new Winner;     
        }    
        $winner->user_id = $id;
        $winner->class_id = $class_id;
        if ($winner->save()) {
            $this->set_session('Winner Is Selected', true);             
        }
        else{
            $this->set_session('Winner Is Not Selected', false);            
        }
   
        return redirect()->back();
    }
    public function post_comment(Request $request,$class_id){
        if ((Auth::user()->role_id == '2') || ( DB::table('winners')->where('class_id',$class_id)->exists() &&  DB::table('class_student')->where('class_id',$class_id)->where('student id',Auth::user()->id) ) ) {
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

    public function account_feature_status(){
        $this->set_session('You Have Already Featured Your Account', false);
            return redirect()->back();  
    }

    public function reply_question(Request $request){
        //dd($request->input());

        if($request->has('ques_id') && $request->has('answer')){
            $reply_update = QuestionAnswer::find($request->input('ques_id'));
            $reply_update->answer = $request->input('answer');

            if($reply_update->save()){
                $this->set_session('Question has been Replied', true);
                return redirect()->back();              
            }else{
                $this->set_session('Question couldnot be Replied', false);
                return redirect()->back();
            }

        }else{
                $this->set_session('Question couldnot be Replied', false);
                return redirect()->back();
        }
    }
}
