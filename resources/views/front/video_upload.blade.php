@extends('masterlayout')
@section('content')
<section class="upload_section">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            @include('partials.error_section')
            @if($class->class_status == 1)
            <h1 style="text-align: center; color: red;">"You Can't Upload Further Videos, This Class Had Been Closed By The Admin"</h1>
            @endif
            <hr>
            <h2 class="heading-primary">UPLOAD</h2>
            <p class="upload_content">Click Here to Upload Your Class Assignment</p>
            <!-- <div class="upload_icon">   <i class="fa fa-cloud-upload"></i></div> -->
            <form enctype="multipart/form-data" method="POST" action="{{route('ajax_submit_video')}}">
               {{csrf_field()}}
               <div class="icon_cloud">
                  <span id="fileselector">
                  <label class="" for="imageUpload">
                  <input type="hidden" name="class_id" value="{{$class_id}}">
                  <input type="file" name="video" id="imageUpload" class="hide"  onchange="javascript: document.getElementById ('fileName').innerHTML = this.value"/>
                  <i class="fa fa-cloud-upload"></i>
                  <img src="" id="imagePreview" alt="" width="100px";/>
                  </label>
                  </span>
               </div>
               <p id="fileName" class="text-center"></p><br>
               <div class="row">
                  <div class="col-md-4  col-md-offset-4 form-group">  
                     <div class="form-group form_bottom">
                        <label for="question">Type a Question For Your Teacher Here</label>
                        <input type="hidden" name="quesID[]" value="
                        
                        {{isset($variable[0]->quesID) ? $variable[0]->quesID: ''}}

                        ">
                        <input type="text" class="form-control" id="ques1" placeholder="eg: What is your favorite thing an actor does?" name="question[]" value="{{isset($variable[0]->question) ? $variable[0]->question : ''}}">
                     </div>
                     @if(Auth::user()->featured == 1)
                     <div class="form-group">
                        <label for="pwd">Type a second Question For Your Teacher Here</label>
                        <input type="hidden" name="quesID[]" value="{{
                     
                        isset($variable[1]->quesID) ? $variable[1]->quesID : ''

                     }}">
                        <input type="text" class="form-control" id="ques2" placeholder="" value="

                        
                        {{isset($variable[1]->question) ? $variable[1]->question : ''}}" name="question[]">
                     </div>

                     @endif
                     @if(isset($variable[0]) && !empty($variable[0]->description) )
                     <br>
                     <p style="color: red;"> You Have Already Uploaded Video In This Class, Want To Update !</p>
                     <br>
                        @if($class->class_status == 0)
                        <strong>Continue To Update Video</strong>
                        @endif
                     <input type="hidden" name="video_id" value="{{$variable[0]->id}}">
                     @endif
                  </div>
                  @if($class->class_status == 1)
                  @else
                  <div class="col-md-4  col-md-offset-4">
                     <button type="submit" class="btn btn-login s-btn-width">Upload</button>
                  </div>
                  @endif	
               </div>
               <br>
            </form>
            <p class="text-center s_disclaimer">
              <span>Disclaimer :</span> Please remember your video assignment and your question will be visible to the entire classroom
            </p>

         </div>
      </div>
   </div>
</section>
@endsection