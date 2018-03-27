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
			         		<div class="crown"><img src="{{asset('public/assets/images/crown.png') }}" class="img-responsive"></div>
					         <div class="f_wall_img img_top pull-right">
					         	<img src="{{asset('public/storage/profile-pictures/'.$value->profile_pic) }}" class="img-responsive">
					         </div>
				         </div>
				         <div class="col-md-6 f_padding_profile">
				            <h3 class="wall_content">{{$value->fullname}}

				             <b style="color: grey">  @if($value->user_id == $winner->winner_id) Winner @endif</b>
				         </h3>
				            <p class="wall_text">{{$value->created_at}} <i class="fa fa-globe" aria-hidden="true"></i></p>
				         </div>
			         </div>
			         <div class="video">
			         <div class="center_video">
			           	<video width="70%" controls>
			              <source src="{{asset('public/assets/lecturevideos/'.$value->video) }}" type="video/mp4">
			              <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
			              Your browser does not support HTML5 video.
			           	</video>
			           </div>
           				<p class="video_content">{{$value->description}}</p>
           				@if(Auth::user()->id == $value->teacher_id)
           				<a href="{{route('select_winner',['id'=>$value->user_id,'class_id'=>$value->class_id])}}">Select Winner</a>
           				@endif

           				<div class="row">
		                   <div class="col-md-12">
						         <h3 class="profile_content">Questions</h3>
						          @php $quesFlag = false; @endphp
						         @foreach($question_answers as $question_answer)
						         	@if($question_answer->video_id == $value->id)
						         		@php $quesFlag = true; @endphp
						         		Q. <p>{{$question_answer->question}}</p>
						         		@if(!is_null($question_answer->answer))


						         		   @if(Auth::user()->role_id == 3)
						         		   	<!-- Student -->
						         			<p> Ans. {{$question_answer->answer}} </p>

						         		   @elseif(Auth::user()->role_id == 2)
						         		    <!-- Teacher -->
						         			 <p>Reply to this Student Question</p>						         
						         			 <form id="replyForm" action="{{route('reply_question')}}" method="post">
						         			 		<b>Reply: </b>
						         			 		<textarea id="answer" name="answer">{{$question_answer->answer}}</textarea>
						         			 		<input type="hidden" name="ques_id" value="{{$question_answer->question_id}}" >
						         			 		<input type="hidden" name="_token" value="{{Session::token()}}">
						         			 		<input type="submit" name="submit" value="Update">
						         			 </form>

						         		   @endif
						         		@else
						         		   @if(Auth::user()->role_id == 3)
						         		   	<!-- Student -->
						         		   	<p>This Question has not been Answered.</p>

						         		   @elseif(Auth::user()->role_id == 2)
						         		    <!-- Teacher -->
						         			 <p>Reply to this Student Question</p>						         		<form id="replyForm" action="{{route('reply_question')}}" method="post">
						         			 		<b>Reply: </b>
						         			 		<textarea id="answer" name="answer"></textarea>
						         			 		<input type="hidden" name="ques_id" value="{{$question_answer->question_id}}" >
						         			 		<input type="hidden" name="_token" value="{{Session::token()}}">
						         			 		<input type="submit" name="submit" value="Reply">
						         			     </form>
						         		   @endif
						         		@endif
						         	@endif
						         @endforeach

					         	<!-- Checking if there are any Questions -->
					         	@if(!$quesFlag)
					         	  <p>No Questions to Display</p>
					         	@endif					                        		
		                   </div>           					
           				</div>

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
			         <hr>		         
	         	</div>         
	         @endforeach
      </div>
   </div>
</section>
@endsection