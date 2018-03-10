@extends('admin.masterlayout')
@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Users List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date Of Birth</th>
                                    <th>User Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->profile->phone }}</td>
                                        <td>{{ $user->profile->gender }}</td>
                                        <td>{{ $user->profile->d_o_b }}</td>
                                        <td>{{ $user->roles[0]->display_name }}</td>
                                        <td>
                                            @if($user->verified == 1)
                                            <a class="btn btn-primary" href="{{route('deactivate-user',['id'=>$user->id])}}" title="Click To Deactivate">Activated</a>
                                            @else
                                            <a class="btn btn-danger" href="{{route('activate-user',['id'=>$user->id])}}" title="Click To Activate">Deactivate</a>
                                            @endif                                        
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                  <span class="caret"></span></button>
                                                  <ul class="dropdown-menu">
                                                    <li><a href="{{route('user_edit',['id'=>$user->id])}}">Edit</a></li>
                                                    <li><a href="{{route('user',['id' => $user->id]) }}">View</a></li>
                                                    <li><a href="{{route('delete_user',['id' => $user->id]) }}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    <div class="s_button">
                            <a class="btn btn-primary" href="{{route('create_user')}}">Create</a>
                        </div>  
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
@endsection