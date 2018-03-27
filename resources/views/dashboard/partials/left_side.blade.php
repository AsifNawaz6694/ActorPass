<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 r-m-p left_dash">
    <div class="dashboard_left_side clearfix">
        <a href="{{route('public_index')}}" class="navbar-brand">
            <img src="{{ asset('public/assets/images/logo_actor.png') }}" class="img-responsive center-block"/>
        </a>
        <div class="user_deatils">
            <a href="#">
                <a href="{{route('remove_picture')}}">
                        <i class="fa fa-lg fa-remove delete_image_profile"> </i>
                    </a>
                <div class="avatar_box">
                    <!--<img src="{{ asset('dashboard_assets/images/funder_user_img.png') }}" class="img-responsive center-block img-circle"/> -->
                    @if(isset(Auth::user()->profile->profile_pic))
                        <img src="{{asset('public/storage/profile-pictures/'.Auth::user()->profile->profile_pic)}}" class="img-responsive center-block img-circle s_image_circle"/>
                    @else
                        <img src="{{ asset('public/dashboard_assets/images/default1.png') }}" class="img-responsive center-block img-circle s_image_circle"/>
                    @endif

                  <form action="{{route('user_image_upload')}}" method="post" enctype="multipart/form-data" id="Singleimage_upload_form">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                    <span class="camera_image">
                    <i class="fa fa-camera fa-2x" aria-hidden="true"></i>
                        <input type="file" id="image_upload" name="image_upload" value="" style="display: none"/>
                    </span>
                  </form>              
                </div>
            </a>
            <h3>
                @if(isset(Auth::user()->username))
                   <a href="#">{{Auth::user()->username}}</a>
                @endif
            </h3>
            
            <p>
                @if(isset(Auth::user()->roles()->first()->display_name))
                 {{ Auth::user()->roles()->first()->display_name }}
                @endif
            </p>

        </div><!--./End user details-->
        <div class="dashboard_navigation">
            <ul class="nav">
                <li><a href="{{route('dash_index')}}" {{{ (Request::is('dashboard') ? 'class=actives' : '') }}}><i class="fa fa-tachometer"
                                                              aria-hidden="true"></i>Dashboard</a></li>
                <li><a href="{{route('profile_index')}}" {{{ (Request::is('dashboard/profile') ? 'class=actives' : '') }}}><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
                <li><a href="{{route('dash_classes')}}" {{{ (Request::is('dashboard/myclasses') ? 'class=actives' : '') }}}><i class="fa fa-user" aria-hidden="true"></i>My Classes</a></li>
                <li><a href="{{route('logout_user')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
            </ul>
        </div>
    </div>
</div><!---./End Left Side-->
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 r-m-p right_dash">
    @include('dashboard.partials.dashboard_nav')