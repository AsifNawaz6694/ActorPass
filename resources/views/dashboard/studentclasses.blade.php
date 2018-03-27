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
                                <th>Location</th>
                                <th>Age</th>                                                        
                                <th>Cost</th>
                                <th>Details</th>
                                <th>Wall</th>                                  

                            @elseif(Auth::user()->role_id == 2)
                               <!-- Teacher -->
                                <th>Class</th> 
                                <th>No of Students</th>
                                <th>Date</th>                                                        
                                <th>Status</th>                                             
                                <th>Details</th>
                                <th>Class wall</th>
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
                                <td>{{$class->location}}</td>
                                <td>{{$class->age}}</td>
                                <td>{{$class->cost}}</td>
                                <td><a target="_blank" href="{{$class->link}}">View Detail</a></td>
                                <td><a target="_blank" href="{{route('upload_video', ['id' =>$class->id])}}">View Class wall</a></td>
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
