<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Profile;
use Auth;

class DefaultController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $profile;

    public function __construct()
    {	dd(Auth::user());
    	//$this->profile = Profile::where('user_id', Auth::user()->id)->first(['']);
    }

    //generic function for initializing session
    protected function set_session($msg, $status){
	     session()->put('result', $status);
	     session()->put('msg', $msg);
    }
}
