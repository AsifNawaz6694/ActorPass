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
                        <h3 class="box-title">Students Submitted Videos In This Class</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Email</th>                                                                   
                                    <th>Video Description</th> 
                                    <th>Status</th> 
                                    <th>Video</th> 
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($videos as $value)
                                <tr>                                 
                                  <td>{{$value->fullname}}</td>
                                  <td>{{$value->email}}</td>    
                                  <td>{{$value->description}}</td>  
                                  <td>
                                    @if($value->status == 1)
                                    <a href="{{route('disapprove-video',['id'=>$value->studen_video_id])}}" class="btn btn-primary" title="Click To DisApproved">Approved</a>
                                    @else
                                    <a href="{{route('approve-video',['id'=>$value->studen_video_id])}}" class="btn btn-danger" title="Click To Approved">DisApproved</a>
                                    @endif
                                  </td>                                  
                                  <td> <a href="" class="btn btn-primary video_lecture" data-toggle="modal" data-target="#modal-video-view" data-message="{{$value->video}}" data-description="{{$value->description}}">View</a></td>
                                                                                                 
                                </tr>
                              @endforeach          
                            </tbody>
                        </table>
                        <div class="s_button">                            
                            <a class="btn btn-primary" href="{{route('send_emails_teachers',['id'=>$class->id])}}">Send Email</a>
                        </div>  
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        <!-- /.col -->
      </div>

      <div class="modal fade in" id="modal-video-view">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Lecture Video</h4>
              </div>
              <div class="modal-body">                
                 <video width="100%" height="100%" id="video_link_model" controls>
                  <source src="" type="video/mp4">
                </video>
                <hr> 
                <div id="video_description">
                  <label>Description</label>
                  <p></p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div> 
@endsection