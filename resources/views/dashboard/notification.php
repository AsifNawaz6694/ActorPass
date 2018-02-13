<?php include('header.php'); ?>
<?php include('left_side.php'); ?>
<?php include('dashboard_nav.php'); ?>
    <div class="wrapper">
        <div class="heading_one">
            <h1>notification</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default panel-min">
                    <!-- Default panel contents -->
                    <div class="panel-body">
                        <h4 class="float-left text-left">Transaction details</h4>
                        <h4 class="float-right text-right"><a href="#">Mark all as read</a></h4>
                    </div>
                    <!-- List group -->
                    <ul class="list-group">
                        <?php for ($a = 1; $a <= 12; $a++) { ?>
                            <li class="list-group-item notification_list">
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
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 min ago
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>