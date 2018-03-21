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

            //dd($data['classes']);
        }else if(Auth::user()->role_id == 2){ //he is a teacher
            //Teacher Classes

            // $data['classes'] = Classes::join('class_student', 'classes.id', '=', 'class_student.class_id')
            //                    ->join('users', 'users.id', '=', 'class_student.student_id')
            //                    ->select('classes.title','users.fullname', 'classes.cost', 'classes.location', 'classes.age') 
            //                    ->where('classes.teacher_id', '=', Auth::user()->id)                         
            //                    ->get();

            $data['classes'] = Classes::select('class_student.student_id', \DB::raw('count(class_student.student_id) as student_total'))
                               ->where('classes.teacher_id', '=', Auth::user()->id)             
                               ->join('class_student', 'class_student.class_id', '=', 'classes.id')
                               ->groupBy('classes.id')
                                                     
                               ->get();

            dd($data['classes']);                    
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
