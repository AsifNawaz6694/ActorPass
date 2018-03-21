@extends('masterlayout')
@section('content')

<!-- Login Page -->
  <section class="login">
  <div class="container">
  	<div class="row">
     <div class="col-md-4 col-md-offset-4 login">
      <h3 class="login_content">Forget Password</h3>
       <hr>
      @include('partials.error_section')
       <form id="signin_form" action="{{route('reset_pass_post')}}" method="post">

          @if($page_forget_flag=="email")
            <div class="form-group_form">
              <label for="exampleInputName">Enter Your Email to Renew Password</label>
              <input type="type" class="form-control required " name="passemail" id="exampleInputName">
              <input type="hidden" class="form-control required" name="reqPassFlag" value="email" id="exampleInputPassword1">              
            </div>            
          @elseif($page_forget_flag=="newpass")
            <div class="form-group_form">
              <label for="exampleInputName">New Password</label>
              <input type="password" class="form-control required " name="password1" id="exampleInputName">
            </div>
            <div class="form-group_form">
              <label for="exampleInputPassword1">Re-enter Password</label>
              <input type="password" class="form-control required" name="password2" id="exampleInputPassword1">              
            </div>
            <input type="hidden" name="pass_token" value="{{$token}}">
            <input type="hidden" class="form-control required" name="reqPassFlag" value="newpass" id="exampleInputPassword1">
          @endif

            <div class="form-group" role="group" aria-label="...">
              <div class="account_signin"><a href="{{route('register_index')}}" class="btn btn-default_signup">NO ACCOUNT? SIGN UP NOW</a>
                  <!--<a  href="#" class="btn btn-default_login">LOGIN NOW</a>-->
                   <input type="hidden" name="_token" value="{{Session::token()}}">          
                  
                @if($page_forget_flag=="email")
                  <button type="submit" class="btn login_now">Send Password Link</button>
                @elseif($page_forget_flag=="newpass")
                  <button type="submit" class="btn login_now">Change Password</button>
                @endif
              </div>
            </div>
      </form>
     
    </div>
  </div>
  </div>
  </section>
@endsection
