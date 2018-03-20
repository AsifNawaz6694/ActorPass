@extends('masterlayout')
@section('content')
<section class="profile">
   <div class="container">   
      <div class="col-md-12">
@include('partials.error_section')
         <h3 class="profile_content">MY RECENT SHARING</h3>
         <hr>
	         @foreach($videos as $value)
	         	<div class="col-md-12">
	         		<div class="row">
			         	<div class="col-md-1">
					         <div class="f_wall_img img_top pull-right">
					         	<img src="{{asset('public/storage/profile-pictures/'.$value->profile_pic) }}" class="img-responsive">
					         </div>
				         </div>
				         <div class="col-md-6 f_padding_profile">
				            <h3 class="wall_content">{{$value->fullname}}</h3>
				            <p class="wall_text">{{$value->created_at}} <i class="fa fa-globe" aria-hidden="true"></i></p>
				         </div>
			         </div>
			         <div class="center_video">
			         <div class="video">
			           	<video width="70%" controls>
			              <source src="{{asset('public/assets/lecturevideos/'.$value->video) }}" type="video/mp4">
			              <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
			              Your browser does not support HTML5 video.
			           	</video>
           				<p class="video_content">{{$value->description}}</p>
           				@if(Auth::user()->id == $value->teacher_id)
           				<a href="{{route('select_winner',['id'=>$value->user_id,'class_id'=>$value->class_id])}}">Select Winner</a>
           				@endif
		                 <div class="row">
		                   <div class="col-md-12">
		                     <div class="padding_commit">
		                       <form action="{{route('post_comment',['class_id'=>$value->class_id])}}" method="post">
		                        {{csrf_field()}}
		                         <div class="comment-wrap">
		                           <div class="photo">
		                             <div class="avatar">
		                               <img src="{{asset('public/storage/profile-pictures/'. Auth::user()->profile->profile_pic)}}">
		                             </div>
		                           </div>
		                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
		                           <input type="hidden" name="video_id" value="{{$value->id}}">
		                           <div class="comment-block">
		                             <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Write a comment"></textarea>
		                           </div>
		                         </div>
		                         <div class="button_comment">
		                             <button type="submit" class="btn" >POST</button>
		                         </div>
		                       </form>		                       
		                       	@foreach($comments[$value->id] as $comment)
		                       	<div class="comment-wrap">
									<div class="photo">
									   <div class="avatar">
									     <img src="{{asset('public/storage/profile-pictures/'. $comment->profile_pic)}}">
									   </div>
									</div>
									<div class="comment-block">
									   <p class="comment-text">{{$comment->comment}}</p>
									</div>
		                       	</div>
		                       @endforeach
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