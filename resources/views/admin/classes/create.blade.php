@extends('admin.masterlayout')
@section('content')
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Class Information</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" action="{{route('store_class')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Class Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" Placeholder="Give Title To Class">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus" class="col-sm-2 control-label">Assign Teacher</label>
                                    <div class="col-sm-10">
                                        <select name="teacher_id" class="form-control">
                                            <option selected disabled>Select a Teacher</option>                                          
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->fullname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="location" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Cost</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="cost" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCountry" class="col-sm-2 control-label">Age</label>
                                     <div class="col-sm-10">
                                        <input type="number" class="form-control" name="age" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="link" >
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="date" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Time</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" name="time">
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <label for="inputPhone" class="col-sm-2 control-label">Description</label>    
                                    <div class="col-sm-10">                          
                                        <textarea id="editor1" name="description" rows="10" cols="80"></textarea>        
                                    </div>                          
                                </div>                                                                                             
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Create</button>
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
            <!-- /.col -->
        </div>
@endsection