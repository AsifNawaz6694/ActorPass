<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
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
    dd(123);
    Auth::logout();
    return redirect()->route('home');          
  }
}
