@extends('masterlayout')
@section('content')
<section class="profile">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
         	<form id="change_cover" action="{{route('ajax_change_cover')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
	            <div class="f_img_banner">
	            	@if(!empty($user->profile->cover) && $user->profile->cover)
                <img src="{{asset('public/storage/cover-photos/'.$user->profile->cover) }}" class="img-responsive">
                @else
                <img src="{{asset('public/storage/cover-photos/default_cover.jpg') }}" class="img-responsive">
                @endif
                @if(Auth::user()->role_id == 3 && $user->id == Auth::user()->id)
	            	  <div class="button_banner">
                      <i class="fa fa-camera set_update_btn" aria-hidden="true"></i>
                      Update Cover
                      <input type="file" name="cover" id="cover">
                      <input type="hidden" name="student_id" id="student_id" value="{{$user->id}}">
                  </div>  
                @endif
	            </div>
        	</form>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="col-md-3 border_left">
         <div class="vertical-menu">
            <div class="f_side_img">
              @if(!empty($user->profile->profile_pic) && $user->profile->profile_pic)
                 <img src="{{asset('public/storage/profile-pictures/'.$user->profile->profile_pic) }}" class="img-responsive">
                @else
                 <img src="{{asset('public/storage/profile-pictures/profile_picture.jpg') }}" class="img-responsive">
                @endif
            
            </div>
            <div class="side_content">
               <h3 class="name_profile">{{$user->fullname}}</h3>
               <p class="actor">{{$role->name}}</p>
               <a href="#" class="active">Wall</a>
               <a href="{{route('student_profile',['id'=>$user->id])}}">Profile</a>
            </div>
         </div>
      </div>
      <div class="col-md-9">
         <h3 class="profile_content">MY RECENT SHARING</h3>
         <hr>
	         @foreach($videos as $value)
	         	<div class="col-md-12">
	         		<div class="row">
			         	<div class="col-md-1">
					         <div class="f_wall_img img_top pull-right">
					         	<img src="{{asset('public/storage/profile-pictures/'.$user->profile->profile_pic) }}" class="img-responsive">
					         </div>
				         </div>
				         <div class="col-md-6 f_padding_profile">
				            <h3 class="wall_content">{{$value->fullname}}</h3>
				            <p class="wall_text">{{$value->created_at}} <i class="fa fa-globe" aria-hidden="true"></i></p>
				         </div>
			         </div>
			         <div class="video">
			            <video width="100%" controls>
			               <source src="{{asset('public/assets/lecturevideos/'.$value->video) }}" type="video/mp4">
			               <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
			               Your browser does not support HTML5 video.
			            </video>
			          <!--   <p class="video_content">{{$value->description}}</p> -->
			            <!-- <p class="video_text">Shared via Lipsum</p> -->
			            <!-- <div class="details"><a href="#">click here for details</a></div> -->
			         </div><hr>		         
	         	</div>         
	         @endforeach
      </div>
   </div>
</section>
@endsection