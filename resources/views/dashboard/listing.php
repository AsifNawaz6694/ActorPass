<?php include('header.php'); ?>
<?php include('left_side.php'); ?>
<?php include('dashboard_nav.php'); ?>
<div class="wrapper">
    <div class="heading_one">
        <h1>Viewed Listings</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-body ">
                    <h4 class="float-left text-left">my Listing</h4>
                    <h4 class="float-right text-right"><a href="#">View All</a></h4>
                    <div class="list_border clearfix"></div>
                    <div class="row">
                        <?php
                        $color = array('green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box');
                        for ($a = 1; $a <= 6; $a++) {
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
</div>
<?php include('footer.php'); ?>
