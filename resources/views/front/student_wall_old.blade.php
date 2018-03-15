@extends('masterlayout')
@section('content')
<style type="text/css">
   .side_img img {
    height: 250px;
    width: auto !important;
}
</style>
<section class="profile">
   <div class="container">
      <div class="row">
         <div class="col-md-12">         
              <form id="change_cover" action="{{route('ajax_change_cover')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
               <div class="img_banner">
                  <img src="{{asset('public/storage/cover-photos/'.$user->profile->cover) }}" class="img-responsive">
                    <div class="button_banner">
                      <i class="fa fa-camera set_update_btn" aria-hidden="true"></i>
                      Update Cover
                      <input type="file" name="cover" id="cover">
                      <input type="hidden" name="student_id" id="student_id" value="{{$user->id}}">                      
                    </div>           
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="col-md-3 border_left">
         <div class="vertical-menu">
            <div class="side_img"><img src="{{asset('public/storage/profile-pictures/'.$user->profile->profile_pic) }}" class="img-responsive"></div>
            <div class="side_content">
               <h3 class="name_profile">ANDREW NOUMAN</h3>
               <p class="actor">{{$role->name}}</p>
               <a href="{{route('student_wall')}}" class="active">Wall</a>
               <a href="#" class="active">Info</a>
               <!--    <ul class="list_profile">
                     <li><i class="fa fa-male male_profile"></i>Gender : {{$user->profile->gender}}</li>
                     <li><i class="fa fa-map-marker marker_profile" aria-hidden="true"></i>Location : {{$user->profile->address}}</li>
                     <li><i class="fa fa-edit edit_profile"></i>About Me : {{$user->profile->about_me}}</li>
                  </ul>   -->          
            </div>
         </div>
      </div>
      <div class="col-md-9">
          <h3 class="profile_content">MY RECENT SHARING</h3>
         <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
               <ul class="nav nav-tabs">
                  <h3 class="home">HOME</h3>                  
               </ul>
            </div>
            <div class="panel-body">
               @foreach($videos as $value)
                  <div class="tab-content">
                     <div class="tab-pane fade in active" id="tab1default">              
                       <div class="col-md-1">
                          <div class="wall_img"><img src="{{asset('public/storage/profile-pictures/'.$user->profile->profile_pic) }}" class="img-responsive"></div>
                       </div>
                       <div class="col-md-10">
                          <div class="main_content">
                             <h3 class="wall_content text_content">{{$value->fullname}}</h3>
                             <p class="wall_text">44 mins <i class="fa fa-globe" aria-hidden="true"></i></p>
                          </div>
                       </div>
                        <div class="video">
                           <iframe class="embed-responsive-item" src="{{asset('public/assets/lecturevideos/'.$value->video) }}" frameborder="0" allowfullscreen></iframe>
                           <p class="video_content">{{$value->description}}</p>
                           <!-- <div class="details"><a href="#">click here for details</a></div>                            -->
                        </div>
                     </div>                  
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
@endsection