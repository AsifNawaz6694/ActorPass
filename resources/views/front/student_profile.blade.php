@extends('masterlayout')
@section('content')
<section class="profile">
   <div class="container">
      <div class="row">
         <div class="col-md-12">         
            <div class="img_banner"><img src="{{asset('public/assets/images/profile_banner.png')}}" class="img-responsive"></div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="col-md-3 border_left">
         <div class="vertical-menu">
            <div class="side_img"><img src="{{asset('public/assets/images/profile_img.png')}}" class="img-responsive"></div>
            <div class="side_content">
               <h3 class="name_profile">ANDREW NOUMAN</h3>
               <p class="actor">ACTOR</p>
               <a href="#" class="active">About</a>
                 <ul class="list_profile">
                        <li><i class="fa fa-male male_profile"></i>Gender : Male</li>
                        <li><i class="fa fa-map-marker marker_profile" aria-hidden="true"></i>Location : Country, State</li>
                        <li><i class="fa fa-graduation-cap cap_pro"></i>School/College : Neque porro quisquam est qui dolorem</li>
                        <li><i class="fa fa-edit edit_profile"></i>About Me :</li>
                     </ul>
            
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
               <div class="tab-content">
                  <div class="tab-pane fade in active" id="tab1default">
                     <div class="wall_img"><img src="{{asset('public/assets/images/wall_image.png')}}" class="img-responsive"></div>
                     <div class="main_content">
                        <h3 class="wall_content text_content">Andrew Noueman</h3>
                        <p class="wall_text">44 mins <i class="fa fa-globe" aria-hidden="true"></i></p>
                     </div>
                     <div class="video">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/AWdA7hdP4ZA?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                        <p class="video_content">Neque porro quisquam est qui dolorem ipsum quia</p>
                        <p class="video_text">Shared via Lipsum</p>
                        <div class="details"><a href="#">click here for details</a></div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="tab2default">
                     <h3 class="profile_content">INFORMATION</h3>
                     <hr>
                     <ul class="list_profile">
                        <li><i class="fa fa-male male_profile"></i>Gender : Male</li>
                        <li><i class="fa fa-map-marker marker_profile" aria-hidden="true"></i>Location : Country, State</li>
                        <li><i class="fa fa-graduation-cap cap_pro"></i>School/College : Neque porro quisquam est qui dolorem</li>
                        <li><i class="fa fa-edit edit_profile"></i>About Me :</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection