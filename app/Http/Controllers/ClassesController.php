<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Profile;
use App\Classes;
use App\ClassStudent;
use Auth;
use DB;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
class ClassesController extends Controller
{
    public function index(){
    	$args['index'] = Classes::all();    	
    	return view('admin.classes.index')->with($args);
    }

    public function view_class(Request $request,$id){
        $args['class'] = Classes::find($id);
        $args['students'] = ClassStudent::leftJoin('users','users.id','=','class_student.student_id')
                                        ->leftJoin('profile','profile.user_id','=','class_student.student_id')
                                        ->select('users.fullname','users.email','users.verified','profile.d_o_b','profile.phone','profile.gender','users.id')                          
                                        ->where('class_id',$id)
                                        ->get();       
       // dd($args['students']);
        return view('admin.classes.view')->with($args);
    }

    public function create(){
    	$args['users'] = User::all();
    	return view('admin.classes.create')->with($args);
    }

    public function store(Request $request){

    	$store = new Classes;
        $store->title = $request->title; 
        $store->teacher_id = $request->teacher_id; 
        $store->location = $request->location; 
        $store->cost = $request->cost; 
        $store->age = $request->age; 
        $store->link = $request->link; 
        $store->date = $request->date; 
        $store->time = $request->time; 
        $store->description = $request->description; 
        if ($store->save()) {
            $this->set_session('Class Created Successfully.', true);
            return redirect()->route('classes');
        }else{
            $this->set_session('Class couldnot be Created. Please try again.', false);
        }
    }

    public function edit(Request $request, $id){
        $args['users'] = User::all();
        $args['edit'] = Classes::find($id);        
        return view('admin.classes.edit')->with($args);
    }

    public function update(Request $request,$id){ 
        $update_class = Classes::find($id);
        $update_class->title = $request->title; 
        $update_class->teacher_id = $request->teacher_id; 
        $update_class->location = $request->location; 
        $update_class->cost = $request->cost; 
        $update_class->age = $request->age; 
        $update_class->link = $request->link; 
        $update_class->date = $request->date; 
        $update_class->time = $request->time; 
        $update_class->description = $request->description; 
        if ($update_class->save()) {
            $this->set_session('Class Updated Successfully.', true);
            return redirect()->route('classes');
        }else{
            $this->set_session('Class couldnot be Updated. Please try again.', false);
        }
    }

    public function destroy($id){
        $delete = Classes::find($id);
        $delete->delete();
        return redirect()->route('classes');
    }
    public function enroll_students_store(Request $request){         
        $users = $request->student_id;            
        $class_id = $request->class_id;
        foreach ($users as $value) {            
            $store = new ClassStudent;
            if (ClassStudent::where('class_id', '=',$class_id)->where('student_id','=',$value)->exists()) {               
            }else{
                $store->class_id = $class_id;
                $store->student_id = $value;        
                $store->save();
            }
        }
        return redirect()->back();
    }

    public function enroll_students(Request $request,$id){
        $args['class'] = Classes::find($id); 
        $args['students'] = User::where('role_id',3)->get();
        return view('admin.classes.enroll_students')->with($args);      
    }

    // This is the function

    public function delete_enroll_student(Request $request,$id){    
    $delete = ClassStudent::where('class_student.class_id','=',$request->class_id)->where('class_student.student_id','=',$id)->delete();              
    return redirect()->back();
    }

    public function send_emails(Request $request,$id){
        $link = 'localhost/actor-pass/your_class/' . $id;       
        $users = Classes::leftJoin('class_student','class_student.class_id','=','classes.id')
                        ->leftJoin('users','users.id','=','class_student.student_id')
                        ->select('class_student.student_id','users.email','users.fullname')
                        ->where('class_student.class_id','=',$id)
                        ->get();
        foreach($users as $user){
            Mail::send('email.send_email',['users'=>$user,'link'=> $link] , function ($message) use($user) {
                $message->from('asifnawaz.aimviz@gmail.com', 'Actor Pass - Enrollment Email');
                $message->to($user->email)->subject('ACTOR PASS - YOU ARE ENROLLED');
            });
        }
        return redirect()->back();
    }
}