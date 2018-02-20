<?php include 'header.php'; ?>

<section class="login">
<div class="container">
	<div class="row">
   <div class="col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 login-form">
    <h3 class="login_content">LOGIN</h3>
     <hr>
     <form id="signin_form">
      <div class="form-group_form">
        <label for="exampleInputName">USERNAME</label>
        <input type="text" class="form-control required fullname" id="exampleInputName">
      </div>
      <div class="form-group_form">
        <label for="exampleInputPassword1">PASSWORD</label>
        <input type="password" class="form-control required" id="exampleInputPassword1"> 
      </div>

    <div class="col-md-6">
    	<h3 class="remember"> <input type="checkbox">Remember me</h3>
    </div>

    <div class="col-md-6">
    	<h3 class="fotgot">Forgot Password?</h3>
    </div>

      <div class="form-group" role="group" aria-label="...">
        <div class="account_signin_register"><a href="register.php" class="btn btn-default_signup">NO ACCOUNT? SIGN UP NOW</a>     
        <!--<a  href="#" class="btn btn-default_login">LOGIN NOW</a>-->
        <button type="submit" class="btn login_now">LOGIN</button>
      </div>
  </div>
    </form>
   
  </div>
</div>
</div>
</section>





<?php include 'footer.php'; ?>