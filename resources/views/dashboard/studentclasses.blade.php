@extends('dashboard.dashboardmasterlayout')
@section('content')
<div class="wrapper">
    <div class="heading_one">
        <h1>My Classes</h1>
      @include('partials.error_section')          
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
                <table id="classesTable">
                    <thead>
                            <tr>
                            @if(Auth::user()->role_id == 3)
                               <!-- Student -->
                                <th>Title</th>                       
                                <th>Teacher</th>
                                <th>Date of Class</th>
                                <th>Details</th>
                                <th>Classroom</th>                                  

                            @elseif(Auth::user()->role_id == 2)
                               <!-- Teacher -->
                                <th>Class</th> 
                                <th>No of Students</th>
                                <th>Date</th>                                                        
                                <th>Status</th>                                             
                                <th>Details</th>
                                <th>Classroom</th>
                            @endif               
                        </tr>
                    </thead>
                    <tbody> 
                        @if(Auth::user()->role_id == 3)
                           <!-- Student -->
                           @foreach($classes as $class)
                            <tr>
                                <td><a href="{{route('public_wall',['id'=>$class->id])}}">{{$class->title}}</a></td> 
                                <td>{{$class->fullname}}</td>
                                <td>@php echo date("F jS, Y", strtotime($class->date)); @endphp</td>
                                <td><a target="_blank" href="{{$class->link}}">View Detail</a></td>
                                <td><a target="_blank" href="{{route('upload_video', ['id' =>$class->id])}}">View Classroom</a></td>
                            </tr>
                           @endforeach
                        @elseif(Auth::user()->role_id == 2)
                           <!-- Teacher -->
                           @foreach($classes as $class)
                            <tr>
                                <td><a target="_blank" href="{{route('public_wall',['id'=>$class->class_id])}}">{{$class->title}}</a></td>
                                <td>{{$class->student_total}}</td>                                 
                                <td>{{$class->date}}</td>
                                <td>@if($class->class_status==1)
                                     <span class="label label-warning">under Review</span>
                                    @elseif($class->class_status==0)
                                     <span class="label label-success">Availiable</span>
                                    @endif</td> 
                                    <td><a target="_blank" href="{{$class->link}}">View Detail</a></td>
                                    <td><a target="_blank" href="{{route('public_wall', ['id'=>$class->class_id])}}">View Class</a></td>
                            </tr>
                           @endforeach                                      
                        @endif
                    </tbody>
                </table>            
        </div>
    </div>
</div>
@endsection   
