<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Profile;

class AuthenticationController extends Controller
{
    //Loading register view
    public function register_index(){
        return view('authentication.signup');
    }

    //Posting Register Form
    public function register_post(Request $request){

        /* Validating User */
        
        //inserting user
        try{
            $user = new User();
            $user->password = bcrypt($request->password);

            foreach($request->input() as $key => $value) {
                if($key != '_token' && $key != 'password2' && $key != 'password'){
                    $user->$key = $value;
                }
            }         

            if($user->save()){

	            /*Attaching User Role to the New User */ 
	            // - 2- Actor
	            // - 3- Student 
	             $user_role = Role::find($request->input('role_id'));
	             $user->attachRole($user_role);   

	             //Creating Profile for this new User.
	             Profile::create(array('user_id' => $user->id));

                 $this->set_session('User Successfully Registered.', true);
            }else{
                 $this->set_session('User Couldnot be Registered.', false);
            }
            
            return redirect()->route('register_index');

        }catch(\Exception $e){
            $this->set_session('User Couldnot be Registered.'.$e->getMessage(), false);
            return redirect()->route('register_index');                
        }
    }

    public function login_index(){
        return view('authentication.login');
    }

    public function login_post(Request $request){
        //dd($request->input());
       /* Validation */
      try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password ] )) {                
                return redirect()->route('home');  
            }else{
                $this->set_session('Invalid Username/Password', false);
                return redirect()->route('login_view');             
            }

      }catch(\Exception $e){
                $this->set_session('Something went wrong. Please try again'.$e->getMessage(), false);    
                return redirect()->route('login_view');                       
      }         
    }

    //Logging out user
    public function logout_user(){
        Auth::logout();
        return redirect()->route('home');          
    }    
}
