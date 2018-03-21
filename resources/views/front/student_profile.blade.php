@extends('masterlayout')
@section('content')
<section class="profile">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="f_img_banner"><img src="{{asset('public/storage/cover-photos/'.$user->profile->cover) }}" class="img-responsive"></div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="col-md-3 border_left">
         <div class="vertical-menu">
            <div class="f_side_img"><img src="{{asset('public/storage/profile-pictures/'.$user->profile->profile_pic) }}" class="img-responsive"></div>
            <div class="side_content">
               <h3 class="name_profile">{{$user->fullname}}</h3>
               <p class="actor">{{$role->name}}</p>
               <a href="{{route('student_wall',['id'=>$user->id])}}" class="active">Wall</a>
               <a href="#">Info</a>
            </div>
         </div>
      </div>
      <div class="col-md-9">
         <h3 class="profile_content">INFORMATION</h3>
         <hr>
         <ul class="list_profile">
            <li><i class="fa fa-male male_profile"></i>Gender : {{$user->profile->gender}}</li>
            <li><i class="fa fa-map-marker marker_profile" aria-hidden="true"></i>Location : {{$user->profile->address}}</li>            
            <li><i class="fa fa-edit edit_profile"></i>About Me :</li>
         </ul>
         <div class="border_profile">
            <p class="text_profile">{{$user->profile->about_me}}</p>
         </div>
         <h3 class="profile_content">PHOTO</h3>
         <hr>
         @foreach($media_images as $value)
         <div class="col-md-4 col-sm-6">
            <div class="f_img_profile">
               <img src="{{asset('public/storage/user-images/'.$value->media) }}" class="img-responsive">
            </div>
         </div>
         @endforeach
         <div class="clearfix"></div>


         <h3 class="profile_content">VIDEO</h3>
         <hr>
         @foreach($media_videos as $value)
         <div class="col-md-4 col-sm-6">
            <div class="video">
               <video width="100%" controls>
                  <source src="{{asset('public/storage/user-videos/'.$value->media) }}" type="video/mp4">
                  <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
                  Your browser does not support HTML5 video.
               </video>
            </div>
         </div>
         @endforeach        
         <div class="clearfix"></div>
          <h3 class="profile_content">Resume</h3>
         <hr>
         <div class="col-md-4 col-sm-6">
            <div class="resume">
               @if(!empty($media_resume->id))
               <a href="{{route('download_resume',['id'=>$media_resume->id])}}">Download</a>
               @endif
            </div>
         </div>
         <div class="clearfix"></div>
         <h3 class="profile_content"></h3>        
      </div>
   </div>
</section>
@endsection