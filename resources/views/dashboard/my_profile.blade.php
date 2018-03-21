@extends('dashboard.dashboardmasterlayout')
@section('content')
<div class="wrapper">
    <div class="heading_one">
        <h1>My Profile</h1>
      @include('partials.error_section')          
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">About me</h4>
                </div>
                <!-- Form -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 r-m-p">
                    <div class="Form_main">
                    <form action="{{route('profile_update')}}" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                               <label>Full Name <span>*</span></label>
                               <input type="text" name="fullname" value="@if(isset($user->fullname)){{$user->fullname}}@endif" class="form-control">
                           </div>  
                           <div class="form-group">
                               <label>Phone <span>*</span></label>
                               <input type="number" name="phone" value="@if(isset($profile->phone)){{$profile->phone}}@endif"  class="form-control">
                           </div>
                           <div class="form-group">
                               <label>DOB <span>*</span></label>
                               <input type="date" name="d_o_b" value="@if(isset($profile->d_o_b)){{$profile->d_o_b}}@endif" class="form-control">
                           </div>
                           <div class="form-group">
                               <label>I am a <span>*</span></label>
                               <select class="form-control" name="gender">
                                   <option>Select</option> 
                                   <option @if(($profile->gender=="male")) selected @endif value="male">Male</option>
                                   <option @if(($profile->gender=="female")) selected @endif value="female">Female</option>
                               </select>
                           </div>

                           <div class="form-group">
                               <label>Profile Pic <span></span></label>
                               <input type="file" name="profile_pic" class="form-control">
                           </div>

                           <div class="form-group">
                               <input type="hidden" name="_token" value="{{Session::token()}}">
                               <button type="submit" class="btn btn-default center-block btn-block">Save changes
                               </button>
                           </div>
                       </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="Form_main">
                        <form action="{{route('edit_password_post')}}" method="post">
                            <h4>Edit my password</h4>
                            <div class="form-group">
                                <label>Old Password <span>*</span></label>
                                <input type="password" name="oldpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>New Password <span>*</span></label>
                                <input type="password" name="newpassword1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password <span>*</span></label>
                                <input type="password" name="newpassword2" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{Session::token()}}">                            
                                <button type="submit" class="btn btn-default center-block btn-block" id="edit_pass">Save
                                    changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">Media</h4>
                </div>
                <!-- Form -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 r-m-p">
                    <div class="Form_main">
                    <form action="{{route('upload_media')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                           <div class="form-group">
                               <label>Picture <span></span></label>
                               <input type="file" name="image[]" accept="image/x-png,image/gif,image/png,image/jpeg" class="form-control" {{ Auth::user()->profile->package_student ? 'multiple' : ''}}>
                               @if(Auth::user()->profile->package_student == 1)
                               <p>You May Select Up To 3 Images</p>
                               @endif
                                @if($errors->first('image'))
                                  <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                          </div>
                          <div class="form-group">
                               <label>Video <span></span></label>
                               <input type="file" name="video[]" accept="video/mp4,video/x-m4v,video/*" class="form-control" {{ Auth::user()->profile->package_student ? 'multiple' : ''}}>
                               @if(Auth::user()->profile->package_student == 1)
                               <p>You May Select Up To 3 Videos</p>
                               @endif
                               @if($errors->first('video'))
                                  <div class="text-danger">{{ $errors->first('video') }}</div>
                                @endif
                          </div>
                          <div class="form-group">
                               <label>Resume<span></span></label>
                               <input type="file" name="resume" accept="application/pdf" class="form-control">
                               @if($errors->first('resume'))
                                  <div class="text-danger">{{ $errors->first('resume') }}</div>
                                @endif
                          </div>                          
                           <div class="form-group">
                               <input type="hidden" name="_token" value="{{Session::token()}}">
                               <button type="submit" class="btn btn-default center-block btn-block">Save changes
                               </button>
                           </div>
                       </form>                      
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection   
