<?php include('header.php'); ?>
<?php include('left_side.php'); ?>
<?php include('dashboard_nav.php'); ?>
<div class="wrapper">
    <div class="heading_one">
        <h1>our services</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">Get ready</h4>
                </div>
                <!-- Get Ready Table-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                    <table class="table table-bordered table-responsive" id="get_ready_table">
                       
                            <tr>
                                <td>
                                    <span class="heading_bold">Refine Innovation Strategy Session and Build</span>
                                </td>
                                <td>
                                    <span class="text_time">20 minutes </span>
                                </td>
                                <td>
                                    <span class="price_dolar">$29</span>
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="../assets/images/paypal_btn.png" class="img-responsive center-block"/>
                                    </a>
                                </td>
                            </tr>

                             <tr>
                            <td> 
                                <span class="heading_bold">ENHANCE PROFILE STRATEGY SESSION AND BUILD</span></td>
                          <td> 
                               <span class="text_time">20 minutes</span>
                         </td>
                         <td>
                               <span class="price_dolar">$39</span></td>
                         <td>
                                    <a href="#">
                                        <img src="../assets/images/paypal_btn.png" class="img-responsive center-block"/>
                                    </a>
                                </td>
                
                        </tr>


                        <tr>
                <td><span class="heading_bold">ASSESS MARKET STRATEGY SESSION AND BUILD</span></td>
                <td><span class="text_time">20 minutes</span></td>
                <td><span class="price_dolar">$49</span></td>
                
                 <td>
                                    <a href="#">
                                        <img src="../assets/images/paypal_btn.png" class="img-responsive center-block"/>
                                    </a>
                                </td>
            </tr>


            <tr>
                <td><span class="heading_bold">DEFINE GOALS STRATEGY SESSION AND BUILD</span></td>
                <td><span class="text_time">30 minutes</span></td>
                <td><span class="price_dolar">$69</span></td>
                 <td>
                                    <a href="#">
                                        <img src="../assets/images/paypal_btn.png" class="img-responsive center-block"/>
                                    </a>
                                </td>
                
            </tr>

            <tr>
                    <td><span class="heading_bold">MISCELLANEOUS STRATEGY SESSION</span></td>
                    <td><span class="text_time">15 minutes</span></td>
                    <td><span class="price_dolar">$29</span></td>
                    <td>
                                    <a href="#">
                                        <img src="../assets/images/paypal_btn.png" class="img-responsive center-block"/>
                                    </a>
                                </td>
                                      
                </tr>

                <tr>
                    <td><span class="heading_bold">MISCELLANEOUS STRATEGY SESSION</span></td>
                    <td><span class="text_time">30 minutes</span></td>
                    <td><span class="price_dolar">$49</span></td>
                      <td>
                                    <a href="#">
                                        <img src="../assets/images/paypal_btn.png" class="img-responsive center-block"/>
                                    </a>
                                </td>
                                      
                </tr>



                       
                    </table>
                </div><!--./End Get Ready Table-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                    <div class="dashboard_box service_you_ask">
                        <div class="panel panel-default panel-min">
                            <!-- Default panel contents -->
                            <div class="panel-body">
                                <h4 class="float-left text-left">Services you asked</h4>
                            </div>
                            <!-- List group -->
                            <ul class="list-group">
                                <?php for ($a = 1; $a <= 4; $a++) { ?>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#">Neque porro quisquam est qui dolorem
                                                        ipsum...</a>
                                                </h4>
                                                <p>
                                                    3 Days ago
                                                </p>
                                            </div>
                                            <div class="media-right media-middle">
                                                <span class="media-object">
                                                    <a href="#"> Edit Now</a>
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
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
