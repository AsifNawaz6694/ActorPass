@extends('admin.masterlayout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/storage/profile-pictures/'.$user->profile->profile_pic) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->fullname }}</h3>

              <p class="text-muted text-center">{{ $user->roles[0]->display_name }}</p>

              
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             
             
              <li class="active"><a href="#settings"  data-toggle="tab" aria-expanded="true">User Information</a></li>
            </ul>
            <div class="tab-content">
              
             
              <!-- /.tab-pane -->

              

              <div class="tab-pane active" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name:</label>

                    <div class="col-sm-10">
                     <p>{{ $user->fullname }}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>

                    <div class="col-sm-10">
                     <p>{{ $user->email }}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone:</label>

                    <div class="col-sm-10">
                     <p>{{ $user->profile->phone }}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCountry" class="col-sm-2 control-label">Gender</label>

                    <div class="col-sm-10">
                      <p>{{ $user->profile->gender }}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCountry" class="col-sm-2 control-label">Date of Birth</label>

                    <div class="col-sm-10">
                      <p>{{ $user->profile->d_o_b }}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-10">
                      @if( $user->verified == 1)
                        <p>Active</p>
                      @else
                        <p>Pending</p>
                      @endif
                    </div>
                  </div>
                </form>
              </div>
                <!--<form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name:</label>

                    
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>

                   
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone:</label>

                   
                  </div>
                  <div class="form-group">
                    <label for="inputCountry" class="col-sm-2 control-label">Country</label>

                    
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Status</label>

                  
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>-->
        
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection






