<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Actor Pass | Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link href="{{asset('public/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
   <link href="{{asset('public/admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
   <link href="{{asset('public/admin_assets/bower_components/Ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- Theme style -->
   <link href="{{asset('public/admin_assets/dist/css/AdminLTE.min.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="dist/css/AdminLTE.min.css"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{{asset('public/admin_assets/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> -->
  <!-- Morris chart -->
  <link href="{{asset('public/admin_assets/bower_components/morris.js/morris.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="bower_components/morris.js/morris.css"> -->
  <!-- jvectormap -->
  <link href="{{asset('public/admin_assets/bower_components/jvectormap/jquery-jvectormap.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css"> -->
  <!-- Date Picker -->
  <link href="{{asset('public/admin_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin_assets/bower_components/select2/dist/css/select2.CSS')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
  <!-- Daterange picker -->
  <link href="{{asset('public/admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="{{asset('public/admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet"> 

  <!-- Time Picker CSS -->
  <link href="{{asset('public/admin_assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">  
  <!-- Time Picker CSS -->  
  <!-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="{{asset('public/admin_assets/css/style.css')}}" rel="stylesheet">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="width: 100%;">
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(!empty(Auth::user()->profile->profile_pic)) 
                <img src="{{asset('public/storage/profile-pictures/'.Auth::user()->profile->profile_pic)}}" class="img-circle" alt="User Image"
                >  
                 @else
                <img src="{{asset('public/storage/profile-pictures/default1.png') }}" class="img-circle" alt="User Image">             
                @endif
              <span class="hidden-xs">ADMIN</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(!empty(Auth::user()->profile->profile_pic))
                <img src="{{asset('public/storage/profile-pictures/'.Auth::user()->profile->profile_pic)}}" class="img-circle" alt="User Image"
                >  
                 @else
                <img src="{{asset('public/storage/profile-pictures/default1.png') }}" class="img-circle" alt="User Image">              
                @endif
                <p>
                  ADMIN - {{Auth::user()->fullname}}
                  <small>Member since {{Auth::user()->created_at->format('Y-F-d')}}</small>
                </p>
              </li>             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('user',['id'=>Auth::user()->id])}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('admin_logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>                   
        </ul>
      </div>
    </nav>
  </header>
 @include('admin.partials.sidebar')