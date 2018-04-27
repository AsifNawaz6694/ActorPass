@extends('masterlayout')
@section('content')
<section class="my_class">
   <div class="container">
      @foreach($videos as $value)
      <div class="row">
         <div class="col-md-12">
            <div class="col-md-8 bg_f">
               <div class="wall_img img_top pull-left">
                  <img src="{{asset('public/storage/profile-pictures/'.$value->profile_pic) }}" class="img-responsive">
               </div>

                <img src="{{asset('public/assets/images/crown-2.png') }}" class="img-responsive f_crown-2">
               <h3 class="wall_content f_nouman">{{$value->fullname}} <b style="color: grey">  @if(isset($winner->winner_id) && $value->user_id == $winner->winner_id) Winner @endif</h3>
               <p class="wall_text f_num">{{$value->created_at->diffForHumans()}} <i class="fa fa-globe" aria-hidden="true"></i></p>

        <!--        <img src="{{asset('public/assets/images/crown-2.png') }}" class="img-responsive f_crown-2">
               <h3 class="wall_content f_nouman">{{$value->fullname}} 
                  <b style="color: grey">  @if(isset($winner->winner_id) && $value->user_id == $winner->winner_id) Winner @endif </b>
               </h3>
               <p class="wall_text f_num">{{$value->created_at->diffForHumans()}} 
                  <i class="fa fa-globe" aria-hidden="true"></i>
               </p> -->

               <button type="button" class="btn f_right" data-toggle="modal" data-target="#myModal-2">Basic</button>
               <video width="100%" controls>
                  <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                  <source src="mov_bbb.ogg" type="video/ogg">
                        Your browser does not support HTML5 video.
               </video>
               <h3 class="f_content">QUESTIONS @php $quesFlag = false; @endphp </h3>
               <hr>
               @foreach($question_answers as $question_answer)
                  @if($question_answer->video_id == $value->id)                           
                     @php $quesFlag = true; @endphp
                     <p class="question_f">
                        Q. {{$question_answer->question}}
                     </p>
                     @if(!is_null($question_answer->answer))
                           @if(Auth::user()->role_id == 3)
                              <p> Ans. {{$question_answer->answer}} </p>
                           @elseif(Auth::user()->role_id == 2)
                              <div class="row">
                                 <form id="replyForm" action="{{route('reply_question')}}" method="post">
                                    <div class="col-md-8">
                                       <div class="form-group">
                                          <textarea class="form-control" id="answer" name="answer">{{$question_answer->answer}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <input type="hidden" name="ques_id" value="{{$question_answer->question_id}}" >
                                       <input type="hidden" name="_token" value="{{Session::token()}}">                                   
                                       <div class="button_f"><button type="submit" name="submit" class="btn">Update</button></div>
                                    </div>
                                 </form>
                              </div>
                           @endif
                        @else
                           @if(Auth::user()->role_id == 3)
                              <p>This Question has not been Answered.</p>
                           @elseif(Auth::user()->role_id == 2)
                              <div class="row">
                                 <p class="p_reply">Reply to this Student Question</p>
                                 <form id="replyForm" action="{{route('reply_question')}}" method="post">
                                    <div class="col-md-8">
                                       <div class="form-group">
                                          <textarea class="form-control" id="answer" name="answer">{{$question_answer->answer}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <input type="hidden" name="ques_id" value="{{$question_answer->question_id}}" >
                                       <input type="hidden" name="_token" value="{{Session::token()}}">                                   
                                       <div class="button_f"><button type="submit" name="submit" class="btn">Reply</button></div>
                                    </div>
                                 </form>
                              </div>
                           @endif
                     @endif  
                  @endif  
               @endforeach
               <!-- Checking if there are any Questions -->
               @if(!$quesFlag)
                  <p>No Questions to Display</p>
               @endif
               <h3 class="f_content">
                  COMMENTS
               </h3>
               <hr>
               <div class="row f_row">
                  <div class="comment-wrap">
                     <div class="photo col-md-1">
                        <div class="circle_f"><img class="img_f" src="{{asset('public/storage/profile-pictures/'. Auth::user()->profile->profile_pic)}}"></div>
                     </div>
                     <div class="comment-block">
                        <form action="{{route('post_comment',['class_id'=>$value->class_id])}}" method="post">
                           {{csrf_field()}}
                           <textarea name="comment" id="comment" cols="30" rows="3"></textarea>
                           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                           <input type="hidden" name="video_id" value="{{$value->id}}">
                           <button type="submit" class="btn btn_submit col-md-offset-1">POST</button>
                        </form>
                     </div>
                  </div>
                  @foreach($comments[$value->id] as $comment)
                     <div class="comment-wrap">
                        <div class="photo col-md-1">
                           <div class="circle_f"><img class="img_f" src="{{asset('public/storage/profile-pictures/'. $comment->profile_pic)}}"></div>
                        </div>
                        <div class="text_f">{{$comment->comment}}
                        </div>
                     </div>
                  @endforeach  
               </div>
            </div>
            <div class="col-md-4">
               <div class="f_top">
               <div class="col-md-11 col-md-offset-1 bg_f">
                     <h3 class="content_f_heading">Description: </h3>
                     <p class="f_sed">{{$value->description}}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>       
</section>
@endsection