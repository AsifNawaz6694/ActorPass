<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classes;
use App\StudentVideo;
use App\User;
use App\Role;

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
}
