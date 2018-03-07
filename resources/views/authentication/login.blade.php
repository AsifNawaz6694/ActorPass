@extends('masterlayout')
@section('content')

<!-- Login Page -->
  <section class="login">
  <div class="container">
  	<div class="row">
     <div class="col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 login-form">
      <h3 class="login_content">LOGIN</h3>
       <hr>
      @include('partials.error_section')       
       <form id="signin_form" action="{{route('login_post')}}" method="post">
        <div class="form-group_form">
          <label for="exampleInputName">USERNAME</label>
          <input type="text" class="form-control required" name="email" id="exampleInputName">
        </div>
        <div class="form-group_form">
          <label for="exampleInputPassword1">PASSWORD</label>
          <input type="password" class="form-control required" name="password" id="exampleInputPassword1"> 
        </div>

      <div class="col-md-6">
      	<h3 class="remember"> <input type="checkbox">Remember me</h3>
      </div>

      <div class="col-md-6">
      	<a href="{{route('pass_reset_view')}}"><h3 class="fotgot">Forgot Password?</h3></a>
      </div>

        <div class="form-group" role="group" aria-label="...">
          <div class="account_signin_register"><a href="{{route('register_index')}}" class="btn btn-default_signup">NO ACCOUNT? SIGN UP NOW</a>     
          <!--<a  href="#" class="btn btn-default_login">LOGIN NOW</a>-->
        <input type="hidden" name="_token" value="{{Session::token()}}">          
          <button type="submit" class="btn login_now">LOGIN</button>
        </div>
    </div>
      </form>
     
    </div>
  </div>
  </div>
  </section>
@endsection
