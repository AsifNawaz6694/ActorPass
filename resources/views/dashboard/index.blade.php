@extends('dashboard.dashboardmasterlayout')
@section('content')
<div class="wrapper">
    <div class="heading_one">
        <h1>Dashboard</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="dashboard_box">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-body">
                    <h4 class="float-left text-left">About me</h4>
                    <h4 class="float-right text-right"><a href="#">Edit Profile</a></h4>
                </div>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <td>
                            <label>Full Name <span>*</span></label>
                            <p>Andrew Noueman</p>
                        </td>
                        <td>
                            <label>Phone <span>*</span></label>
                            <p>021 345 6789 0</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email Address <span>*</span></label>
                            <p>andrew123@gmail.com</p>
                        </td>
                        <td>
                            <label>DOB <span>*</span></label>
                            <p>030-11-1985</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password <span>*</span></label>
                            <p>123456</p>
                        </td>
                        <td>
                            <label>I am a <span>*</span></label>
                            <p>Innovator</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <div class="dashboard_box">
            <div class="panel panel-default panel-min">
                <!-- Default panel contents -->
                <div class="panel-body">
                    <h4 class="float-left text-left">Recent Notifications</h4>
                    <h4 class="float-right text-right"><a href="#">View All</a></h4>
                </div>
                <!-- List group -->
                <ul class="list-group">
                    <?php for ($a = 1; $a <= 3; $a++) { ?>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="#">Neque porro quisquam est qui dolorem ipsum...</a>
                                </h4>
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus...
                                </p>
                            </div>
                            <div class="media-right media-middle">
                                <span class="media-object">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 min ago</span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div><!--end notification-->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-body ">
                        <h4 class="float-left text-left">Viewed Listings</h4>
                        <h4 class="float-right text-right"><a href="#">View All</a></h4>
                        <div class="list_border clearfix"></div>
                        <div class="row">
                            <?php
                            $color = array('green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box');
                            for ($a = 1; $a <= 3; $a++) {
                                ?>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                    <div class="Funding_box Funding_box_small <?php echo $color[$a]; ?>">
                                        <h5><a href="#">perspiciatis unde omnis</a></h5>
                                        <h6>exercitationem ullam</h6>
                                        <div class="button_groups">
                                            <a class="btn btn-default Badge_tag">p</a>
                                            <a class="btn btn-default fund_Price">Funding needs: $21,000</a>
                                        </div>
                                        <div class="funding_description">
                                            <h2>Problem it solves:</h2>
                                            <p>
                                                Dignissimos ducimus qui blandit pruiis praesentium
                                                voluptatum
                                                deleniti atque
                                                corrupti
                                                quos
                                                dolores et quastert
                                            </p>
                                        </div>
                                        <div class="Funding_box_footer clearfix">
                                            <span class="ready_img">
                                                <img src="{{ asset('dashboard_assets/images/ready_img.png') }}" class="img-responsive"/>
                                            </span>
                                            <span class="Fund_contact">
                                                <a href="#" class="btn btn-default">Contact</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--./End My Listing Here -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="dashboard_box">
                    <div class="panel panel-default panel-min">
                        <!-- Default panel contents -->
                        <div class="panel-body">
                            <h4 class="float-left text-left">Funded Details</h4>
                            <h4 class="float-right text-right"><a href="#">View All</a></h4>
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
                            <?php for ($a = 1; $a <= 3; $a++) { ?>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#">Neque porro quisqauam estlium</a>
                                        </h4>
                                    </div>
                                    <div class="media-right media-middle paid_unpaid">
                                        <span class="media-object">
                                            <i class="fa fa-check" aria-hidden="true"></i> PAID
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div><!---./End Transaction -->
        </div>
        @endsection    
