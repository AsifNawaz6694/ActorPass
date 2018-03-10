@extends('admin.masterlayout')
@section('content')
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">User Information</a></li>
                        <li><a href="#tab2default" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" action="{{route('update_user',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" value="{{ $user->profile->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCountry" class="col-sm-2 control-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="gender" class="form-control">
                                            <option selected disabled>Select a gender</option>
                                            <option value="male" {{ $user->profile->gender == 'male' ? 'selected' : ''  }}>Male</option>
                                            <option value="female" {{ $user->profile->gender == 'female' ? 'selected' : ''  }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="d_o_b" value="{{ $user->profile->d_o_b }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="verified" class="form-control">
                                            <option selected disabled>Select a status</option>
                                            <option value="1" {{ $user->verified == '1' ? 'selected' : ''  }}>Active</option>
                                            <option value="0" {{ $user->verified == '0' ? 'selected' : ''  }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCountry" class="col-sm-2 control-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="file" name="profile_pic" class="filePath " data-class="img1">
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="" class="img1" download>
                                                <img src="" class="img1" width="50px" />
                                                <span class="img1" style="display:none; color:#FF0000;">
                                                File Download
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                         <div class="tab-pane fade" id="tab2default">
                             <form class="form-horizontal" action="{{route('update_password',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}                                
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="old_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="confirmation_password">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Update</button>
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