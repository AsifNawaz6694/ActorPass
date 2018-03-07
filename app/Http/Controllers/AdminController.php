<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    //

    public function users(){
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    public function user_view($id){
    	$user = User::find($id);
    	if($user){
    		
    		return view('admin.users.view', compact('user'));
    	}
    	else{
    		dd('no result found');
    	}
    }

    public function user_edit($id){
        $user = User::find($id);
        if($user){
            
            return view('admin.users.edit', compact('user'));
        }
        else{
            dd('no result found');
        }
    }
}
