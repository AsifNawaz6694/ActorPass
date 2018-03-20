@extends('dashboard.dashboardmasterlayout')
@section('content')
<div class="wrapper">
    <div class="heading_one">
        <h1>My Classes</h1>
      @include('partials.error_section')          
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            
                <!-- Default panel contents -->
                <!-- <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">About me</h4>
                </div> -->
                <table id="classesTable">
                    <thead>
                        <tr>
                            <th>Title</th>                            
                            @if(Auth::user()->role_id == 3)
                              <th>Teacher</th>                            
                            @elseif(Auth::user()->role_id == 2)
                              <th>Student</th>                            
                            @endif
                            <th>Location</th>
                            <th>Age</th>                                                        
                            <th>Cost</th>                  
                            
                        </tr>
                    </thead>
                    <tbody>                        
                       @foreach($classes as $class)
                        <tr>
                            <td><a href="{{route('public_wall',['id'=>$class->id])}}">{{$class->title}}</a></td> 
                            <td>{{$class->fullname}}</td>
                            <td>{{$class->location}}</td>
                            <td>{{$class->age}}</td>
                            <td>{{$class->cost}}</td>
                        </tr>
                       @endforeach 
                    </tbody>

                </table>

            
        </div>
    </div>
</div>
@endsection   
