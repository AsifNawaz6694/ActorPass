@extends('masterlayout')
@section('content')

<!-- Signup Page -->

<!-- Signup Page -->
<!-- Signup Page -->
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0  login-form">
                <h3 class="login_content">LETS GET STARTED</h3>
                <hr>
                @include('partials.error_section')
                <form id="signin_form" action="{{ route('signup_post') }}" method="post">
                    <div class="form-group_form">
                        <label for="exampleInputName">FULLNAME</label>
                        <input type="text" class="form-control required fullname" name="fullname" id="exampleInputName">
                        @if ($errors->has('fullname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group_form">
                        <label for="exampleInputemail">EMAIL ADDRESS</label>
                        <input type="email" class="form-control required email" name="email"  id="exampleInputemail">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group_form">
                        <label for="exampleInputuName">USERNAME</label>
                        <input type="text" class="form-control required fullname" name="username"  id="exampleInputuName">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group_form">
                        <label for="exampleInputPassword1">PASSWORD</label>
                        <input type="password" class="form-control required" name="password"  id="exampleInputPassword1"> 
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group_form">
                        <label for="exampleInputPassword2">REPEAT PASSWORD</label>
                        <input type="password" class="form-control required" name="password_confirmation"  id="exampleInputPassword2"> 
                    </div>
                    <div class="form-group_form">
                        <label for="UserRole">User Type</label>
                        <select class="form-control required" name="role_id"  id="UserRole">
                            <option value="2">Teacher</option>
                            <option value="3">Student</option>
                        </select>
                    </div>
                    <div class="form-group" role="group" aria-label="...">
                        <div class="account_signin">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default_signup">SIGN UP</button>     
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection