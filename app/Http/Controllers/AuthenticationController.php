<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserEvent;
use Auth;
use App\User;
use App\Role;
use App\Profile;
use App\Password_reset;
use Mail;
use App\Http\Requests\RegistrationRequest;

class AuthenticationController extends Controller
{
    //Loading register view
    public function register_index(){
        return view('authentication.signup');
    }

    //Posting Register Form
    public function register_post(Request $request){
        //dd($request->input());
        /* Validating User */
        try{
            $user = new User();
            $user->password = bcrypt($request->password);
            $user->email_token = base64_encode($user->email);

            foreach($request->input() as $key => $value) {
                if($key != '_token' && $key != 'password_confirmation' && $key != 'password'){
                    $user->$key = $value;
                }
            }         
            //dd($user);
            if($user->save()){

                /*Attaching User Role to the New User */ 
	            // - 2- Actor
	            // - 3- Student 
                $user->attachRole($request->input('role_id'));   

	             //Creating Profile for this new User.
                event(new UserEvent($user));
                //dispatch(new SendVerificationEmail($user));

                $this->set_session('User Successfully Registered.', true);
            }
            else{
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
                
                if (Auth::user()->role_id == '1') {
                    return redirect()->route('admin_index');
                }else{
                return redirect()->route('dash_index');  
                }
            
            }else{
                $this->set_session('Invalid Username/Password', false);
                return redirect()->route('login_view');             
            }

        }
        catch(\Exception $e){
            $this->set_session('Something went wrong. Please try again'.$e->getMessage(), false);    
            return redirect()->route('login_view');                       
        }         
    }

    //Logging out user
    public function logout_user(){
        Auth::logout();
        return redirect()->route('public_index');          
    }

    //Reset Password Views
    public function pass_reset_view($token=null){
            //dd($token);
        if(is_null($token)){      
            $data['page_forget_flag'] = 'email';
            return view('authentication.forgetpassword')->with($data);  
        }else{
            $data['page_forget_flag'] = 'newpass';
            $data['token'] = $token;
            $password_reset_exists = Password_reset::where('token', $token)->exists();

            if($password_reset_exists){
                return view('authentication.forgetpassword')->with($data);   
            }else{
                $this->set_session('Invalid Request. Are you Lost?', false);
                return redirect()->route('login_view');                
            }

        }      
    }

    //Reset Password Post
    public function reset_pass_post(Request $request){

      if($request->input('reqPassFlag')=="email"){

        $user = User::where('email', '=', $request->input('passemail'))->first();

        if (is_null($user)) {
            $this->set_session('Email not Found.', false);
            return redirect()->route('pass_reset_view');
        }else{
                    //Emailing user Password Reset Link

                    //Updating Password reset table
            $token = str_random(30);

            $password_reset = new Password_reset();
            $password_reset->email = $request->input('passemail');
            $password_reset->token = $token;

            if($password_reset->save()){

                     //Mail user Password verification Link
                $mail = Mail::send('email.fogotPass', ['token' => $token, 'user'=>$user ], function ($m) use ($user, $request) {
                    $m->from('farhanuddin.aimviz@gmail.com', 'Online Class');
                    $m->to($request->input('passemail'))->subject('OnlineClass Forgot Password Alert');
                });

                $this->set_session('Password Renew Link Mailed to you.', true);
                return redirect()->route('pass_reset_view');


            }else{
                $this->set_session('Something went wrong. Please Try again.', false);
                return redirect()->route('pass_reset_view');

            }

        }
            //-----------------------------------------------------------------    
           }else if($request->input('reqPassFlag')=="newpass"){ //email end 

            /* Password Change Submission */
                //Password Form Validation

                //Delete Password Reset row from table 'password_resets'
            $password_reset = Password_reset::where('token', $request->input('pass_token'))->first();
            $user = User::where('email', $password_reset->email )->first();
            $user_update = User::find($user->id);

            $user_update->password = bcrypt($request->input('password1'));

            if($user_update->save()){

                $pass_deleted = Password_reset::where('token', $request->input('pass_token'))->delete();

                    //Deleting Password row from Password reset table.
                $this->set_session('Password Successfully Updated.', true);
                return redirect()->route('login_view');
            }else{
                $this->set_session('Password couldnot be Updated.', false);
                return redirect()->route('login_view');        
            }

        }

    }
}
