<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Classes;
use App\ClassStudent;
use Datatables;

class DashboardController extends Controller
{

    public function index(){
    	$data['profile'] = Profile::where('user_id', Auth::user()->id)->first();
        //dd($data['profile']);

      $data['recent_classes'] = Classes::select('classes.title', 'classes.id as class_id', 'class_student.student_id', \DB::raw('count(class_student.student_id) as student_total'), 'classes.link', 'classes.created_at','classes.date', 'classes.class_status')
                         ->where('classes.teacher_id', '=', Auth::user()->id)
                         ->leftjoin('class_student', 'class_student.class_id', '=', 'classes.id')
                         ->groupBy('classes.id')
                         ->orderby('classes.created_at', 'desc')                         
                         ->limit(3)
                         ->get();

        if(Auth::user()->role_id == 3){ //he is a student
            //Student Classes //add recent classes, add 
            $data['recent_classes'] = Classes::join('users', 'users.id', '=', 'classes.teacher_id')
                               ->join('class_student', 'classes.id', '=', 'class_student.class_id')
                               ->select('classes.id as class_id', 'classes.title', 'classes.created_at', 'classes.date', 'classes.class_status', 'users.username as teacher_name')
                               ->where('class_student.student_id', '=', Auth::user()->id)
                               ->get();


        }else if(Auth::user()->role_id == 2){ //he is a teacher
            //Teacher Classes
            $data['recent_classes'] = Classes::select('classes.title', 'classes.id as class_id', 'class_student.student_id', \DB::raw('count(class_student.student_id) as student_total'), 'classes.link', 'classes.created_at','classes.date', 'classes.class_status')
                               ->where('classes.teacher_id', '=', Auth::user()->id)
                               ->leftjoin('class_student', 'class_student.class_id', '=', 'classes.id')
                               ->groupBy('classes.id')
                               ->orderby('classes.created_at', 'desc')                         
                               ->limit(3)
                               ->get();

        }

        //dd($data['recent_classes']);
    	return view('dashboard.index')->with($data);
    }
    
    public function dash_classes(){

        if(Auth::user()->role_id == 3){ //he is a student
            //Student Classes
            $data['classes'] = Classes::join('users', 'users.id', '=', 'classes.teacher_id')
                               ->join('class_student', 'classes.id', '=', 'class_student.class_id')
                               ->select('classes.id', 'classes.title', 'users.fullname', 'classes.cost', 'classes.location', 'classes.age')                     
                               ->where('class_student.student_id', '=', Auth::user()->id)
                               ->get();


        }else if(Auth::user()->role_id == 2){ //he is a teacher
            //Teacher Classes
            
            // SELECT classes.title,COUNT(class_student.student_id) AS NumberOfStudents FROM classes
            // LEFT JOIN class_student ON classes.id = class_student.class_id
            // WHERE classes.teacher_id=46 GROUP BY classes.id;

            $data['classes'] = Classes::select('classes.title', 'classes.id as class_id', 'class_student.student_id', \DB::raw('count(class_student.student_id) as student_total'), 'classes.link','classes.date', 'classes.class_status')
                               ->where('classes.teacher_id', '=', Auth::user()->id)             
                               ->leftjoin('class_student', 'class_student.class_id', '=', 'classes.id')
                               ->groupBy('classes.id')                                                     
                               ->get();

            //  dd($data['classes']);                    
        }

    	return view('dashboard.studentclasses')->with($data);
    }

    /*public function dash_classes_dt(){



        return Datatables::of($classes)->addColumn('action',
            function($classes){
                return '<a href='.route('dash_classes_dt').'class="btn btn-primary ">View</a>';
            })->make(true);    	
    }*/
}
