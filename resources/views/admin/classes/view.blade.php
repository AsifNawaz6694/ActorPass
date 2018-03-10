@extends('admin.masterlayout')
@section('content')
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings"  data-toggle="tab" aria-expanded="true">Detailed View Of Class</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Class Name:</label>
                    <div class="col-sm-10">
                     <p>{{$class->title}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Teacher Name:</label>
                    <div class="col-sm-10">
                     <p>{{$class->users->fullname}}</p>                               
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Location:</label>
                    <div class="col-sm-10">
                     <p>{{$class->location}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCountry" class="col-sm-2 control-label">Cost</label>
                    <div class="col-sm-10">
                     <p>{{$class->cost}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCountry" class="col-sm-2 control-label">Class Date</label>
                    <div class="col-sm-10">
                     <p>{{$class->date}}</p>                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCountry" class="col-sm-2 control-label">Class Time</label>
                    <div class="col-sm-10">                     
                     <p>{{$class->time}}</p>                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Age</label>
                    <div class="col-sm-10">
                     <p>{{$class->age}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Link</label>
                    <div class="col-sm-10">
                     <p>{{$class->link}}</p>                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">                     
                    {!!html_entity_decode($class->description)!!}
                    </div>
                  </div>
                </form>
              </div>                
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
         <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Students Enrolled In This Class</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Gender</th>
                                    <th>Date Of Birth</th>
                                    <th>Status</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($students as $value)
                                <tr>                                 
                                  <td>{{$value->fullname}}</td>
                                  <td>{{$value->email}}</td>                                  
                                  <td>{{$value->phone}}</td>                                  
                                  <td>{{$value->gender}}</td>                                  
                                  <td>{{$value->d_o_b}}</td>                                  
                                  <td>
                                    @if($value->verified == 1)
                                    <a href="" class="btn btn-primary">Activated</a>
                                    @else
                                    <a href="" class="btn btn-primary">DeActivated</a>
                                    @endif
                                  </td>                                                                    
                                </tr>
                              @endforeach          
                            </tbody>
                        </table>
                        <div class="s_button">
                            <a class="btn btn-primary" href="{{route('enroll_students',['id'=>$class->id])}}">Add More Students</a>
                        </div>  
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        <!-- /.col -->
      </div> 
@endsection