<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Profile;
use App\Classes;
use Auth;
use DB;

class ClassesController extends Controller
{
    public function index(){
    	$args['index'] = Classes::all();    	
    	return view('admin.classes.index')->with($args);
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
}
