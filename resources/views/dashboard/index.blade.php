@extends('dashboard.dashboardmasterlayout')
@section('content')
    <div class="wrapper">
        <div class="heading_one">
            <h1>Dashboard</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="dashboard_box">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-body">
                        <h4 class="float-left text-left">About me</h4>
                        <h4 class="float-right text-right"><a href="{{route('profile_index')}}">Edit Profile</a></h4>
                    </div>
                    <!-- Table -->
                    <table class="table">
                        <tr>
                            <td>
                                <label>Full Name <span>*</span></label>
                                
                                <p>{{isset(Auth::user()->fullname) ? Auth::user()->fullname : '-'}}</p>

                            </td>
                            <td>
                                <label>Phone <span>*</span></label>
                                <p>{{isset($profile->phone) ? $profile->phone : '-'}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email Address <span>*</span></label>
                                <p>{{isset(Auth::user()->email) ? Auth::user()->email : '-'}}</p>
                            </td>
                            <td>
                                <label>DOB <span>*</span></label>
                                <p>{{isset($profile->d_o_b) ? $profile->d_o_b : '-'}}</p>
                            </td>
                        </tr>
                        <!--<tr>
                            <td>
                                <label>Password <span>*</span></label>
                                <p>123456</p>
                            </td>
                            <td>
                                <label>I am a <span>*</span></label>
                                <p>Innovator</p>
                            </td>
                        </tr> -->
                    </table>
                </div>
        </div>
    </div>
   </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="dashboard_box">
            <div class="panel panel-default panel-min">
                <!-- Default panel contents -->
                <div class="panel-body">
                    <h4 class="float-left text-left">Recent Classes</h4>
                    <h4 class="float-right text-right"><a href="{{route('dash_classes')}}">View All</a></h4>
                </div>
                <!-- List group -->
                <ul class="list-group">
                @if(Auth::user()->role_id == 3)
                    <!-- Student -->
                    @foreach($recent_classes as $recent_class)
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{route('public_wall',['id'=>$recent_class->class_id])}}">{{$recent_class->title}} - Tought by {{$recent_class->teacher_name}}</a>
                                    </h4>
                                    <p>
                                        
                                    </p>
                                    @if($recent_class->class_status==1)
                                     <span class="label label-warning">under Review</span>
                                    @elseif($recent_class->class_status==0)
                                     <span class="label label-success">Availiable</span>
                                    @endif
                                </div>
                                <div class="media-right media-middle">
                                    <span class="media-object">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> {{$recent_class->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </li>                    
                    @endforeach
                @elseif(Auth::user()->role_id == 2)
                    <!-- Teacher -->
                    @foreach($recent_classes as $recent_class)
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{{route('public_wall',['id'=>$recent_class->class_id])}}">{{$recent_class->title}} (Students: {{$recent_class->student_total}} )</a>
                                    </h4>
<!--                                     <p>
                                        
                                    </p> -->
                                    @if($recent_class->class_status==1)
                                     <span class="label label-warning">under Review</span>
                                    @elseif($recent_class->class_status==0)
                                     <span class="label label-success">Availiable</span>
                                    @endif
                                </div>
                                <div class="media-right media-middle">
                                    <span class="media-object">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> {{$recent_class->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </li>                    
                    @endforeach                    
                @endif

                </ul>
                </div>
            </div>
          </div><!--end notification-->

        @if(Auth::user()->role_id == 2)
            <!-- Teacher -->
        <div class="wrapper">
            <div class="heading_one">
                <h1>My Students</h1>                
            </div>
          <table id="studentTable">
            <thead>
             <tr>
                 <th>Student Name</th>
                 <th>Email</th>
                 <th>Phone</th>                 
                 <th>Username</th>
                 <th>Wall</th>
             </tr>
           </thead>
            <tbody>
               @foreach($teacher_students as $teacher_student)
                 <tr>
                     <td>{{$teacher_student->fullname}}</td>
                     <td>{{$teacher_student->email}}</td>
                     <td>
                     @if(!is_null($teacher_student->phone))
                      {{$teacher_student->phone}}
                     @else
                        - 
                     @endif
                     </td>                     
                     <td>{{$teacher_student->username}}</td>
                     <td><a target="_blank" href="{{route('student_wall', ['id'=> $teacher_student->id])}}">View Wall</a></td>
                 </tr>
               @endforeach
                <tr>
                    
                </tr>

            </tbody>
          </table>
        </div>    

        @elseif(Auth::user()->role_id == 3)
            <!-- Student -->

        <!-- User Image Section -->
        <div class="wrapper">
            <div class="heading_one">
                <h1>My Images</h1>                
            </div>
            {{ $flag = false}}
            @foreach($user_medias as $user_media)
               @if($user_media->media_type == 1) 
                <div class="img_dashboard"><img src="{{asset('public/storage/user-images/'. $user_media->media)}}" height="200" width="200">
                @php $flag= true @endphp                
               @endif        
            @endforeach

           @if(!$flag)
             $flag = false;
             <h1> No Images Saved</h1>
           @endif            
        </div>

                <!-- User Video Section -->
               
                    <div class="heading_one">
                        <h1>My Videos</h1>                
                    </div>
                    @foreach($user_medias as $user_media)
                       @if($user_media->media_type == 2)
                        <video width="30%" controls>
                          <source src="{{asset('public/storage/user-videos/'.$user_media->media) }}" type="video/mp4">
                          <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
                          Your browser does not support HTML5 video.
                        </video>
                        @php $flag= true @endphp 
                       @endif
                    @endforeach
                  
                   @if(!$flag)
                     $flag = false;
                     <h1> No Videos Saved</h1>
                   @endif            
                

                <!-- User Resumes -->
               
                    <div class="heading_one">
                        <h1>My Resume</h1>                
                    </div>

                    @foreach($user_medias as $user_media)
                        
                       @if($user_media->media_type == 3)
                         <!-- <a href="{{route('download_resume',['id'=>$user_media->id])}}">Resume</a>-->
                         <div class="pdf_logo"> <a href="{{route('download_resume',['id'=>$user_media->id])}}"><img src="{{asset('public/assets/images/pdf.png') }}"></a></div>
                        @php $flag= true @endphp              
                       @endif    
                    @endforeach

                   @if(!$flag)
                     $flag = false;
                     <h1> No Resume Saved</h1>
                   @endif           
                

        @endif                    
        @endsection    
