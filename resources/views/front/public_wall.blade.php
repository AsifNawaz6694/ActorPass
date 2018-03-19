@extends('masterlayout')
@section('content')
<section class="profile">
   <div class="container">
      <div class="col-md-12">
         <h3 class="profile_content">MY RECENT SHARING</h3>
         <hr>
	         @foreach($videos as $value)
	         	<div class="col-md-12">
	         		<div class="row">
			         	<div class="col-md-1">
					         <div class="f_wall_img img_top pull-right">
					         	<img src="{{asset('public/storage/profile-pictures/'.$value->  profile_pic) }}" class="img-responsive">
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
			            <p class="video_content">{{$value->description}}</p>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="padding_commit">
                        <form action="#" method="post">
                          <input type="hidden" name="_token" value="">
                          <div class="comment-wrap">
                            <div class="photo">
                              <div class="avatar">
                                <img src="http://128.10.1.162/music-a1/public/dashboard/profile_images/Default-avatar.jpg">
                              </div>
                            </div>
                            <div class="comment-block">
                              <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Write a comment"></textarea>
                            </div>
                          </div>
                          <div class="button_comment">
                              <button type="submit" class="btn" >POST</button>
                          </div>
                        </form>
                        
                        <div class="comment-wrap">
                          <div class="photo">
                            <div class="avatar">
                              <img src="http://128.10.1.162/music-a1/public/dashboard/profile_images/Default-avatar.jpg">
                            </div>
                          </div>
                          <div class="comment-block">
                            <p class="comment-text">dsdsdsdsdsd</p>
                            <p>#GoMusic #Rock</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
			         </div>
               <hr>
	         	</div>
	         @endforeach
      </div>
   </div>
</section>
@endsection
