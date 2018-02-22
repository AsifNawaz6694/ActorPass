@extends('masterlayout')
@section('content')

<!-- Signup Page -->

<section class="login">
<div class="container">
  <div class="row">
   <div class="col-md-4 col-md-offset-4 login">
    <h3 class="login_content">LETS GET STARTED</h3>
     <hr>
      @include('partials.error_section')
      
     <form id="signin_form" action="{{ route('signup_post') }}" method="post">
      <div class="form-group_form">
        <label for="exampleInputName">FULLNAME</label>
        <input type="text" class="form-control required fullname" name="fullname" id="exampleInputName">
      </div>

      <div class="form-group_form">
        <label for="exampleInputName">EMAIL ADDRESS</label>
        <input type="email" class="form-control required fullname" name="email"  id="exampleInputemail">
      </div>
      <div class="form-group_form">
        <label for="exampleInputName">USERNAME</label>
        <input type="text" class="form-control required fullname" name="username"  id="exampleInputuName">
      </div>
      <div class="form-group_form">
        <label for="exampleInputPassword1">PASSWORD</label>
        <input type="password" class="form-control required" name="password"  id="exampleInputPassword1"> 
      </div>

      <div class="form-group_form">
        <label for="exampleInputPassword1">REPEAT PASSWORD</label>
        <input type="password" class="form-control required" name="password2"  id="exampleInputPassword2"> 
      </div>

      <div class="form-group_form">
        <label for="exampleInputPassword1">Who are you?</label>
        <select name="role_id">
          <option value="2">Actor</option>
          <option value="3">Student</option>
        </select>
      </div>
    
      <div class="form-group" role="group" aria-label="...">
        <div class="account_signin"><a href="#" class="btn btn-default_signup">NO ACCOUNT? SIGN UP NOW</a>     
        <!--<a  href="#" class="btn btn-default_login">LOGIN NOW</a>-->
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <button type="submit" class="btn login_now">Register</button>
      </div>
  </div>
    </form>
   
  </div>
</div>
</div>
</section>

@endsection