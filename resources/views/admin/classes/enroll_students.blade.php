@extends('admin.masterlayout')
@section('content')
<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        @include('partials.error_section')
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Enroll Students</a></li>
            </ul>
            <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" action="{{route('enroll_students_store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Class Title</label>
                            <div class="col-sm-10">
                                <input type="hidden" value="{{$class->id}}" name="class_id">
                                <input type="text" class="form-control" name="title" value="{{$class->title}}" Placeholder="Give Title To Class" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus" class="col-sm-2 control-label">Enroll Teacher</label>
                            <div class="col-sm-10">
                                <select name="student_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">                                        
                                @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->fullname}}</option>
                                @endforeach
                            </select>
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