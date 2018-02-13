<?php include('header.php'); ?>
<?php include('left_side.php'); ?>
<?php include('dashboard_nav.php'); ?>
<div class="wrapper">
    <div class="heading_one">
        <h1>About Listing</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">Feel free to ask anything</h4>
                </div>
                <!-- Form -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                    <div class="Form_main form_submit_listing">
                        <form>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Product Category</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <span class="badge blue_check">A</span>
                                </label>
                                <label>
                                    <input type="checkbox"> <span class="badge green_check">F</span>
                                </label>
                                <label>
                                    <input type="checkbox"> <span class="badge red_check">P</span>
                                </label>
                                <label>
                                    <input type="checkbox"> <span class="badge orange_check">S</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Product Service</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <img src="../assets/images/r_img.png"
                                                                 class="img-responsive sheld_img"/>
                                </label>
                                <label>
                                    <input type="checkbox"> <img src="../assets/images/image-e.png"
                                                                 class="img-responsive sheld_img"/>
                                </label>
                                <label>
                                    <input type="checkbox"> <img src="../assets/images/image-a.png"
                                                                 class="img-responsive sheld_img"/>
                                </label>
                                <label>
                                    <input type="checkbox"> <img src="../assets/images/image-d.png"
                                                                 class="img-responsive sheld_img"/>
                                </label>
                                <label>
                                    <input type="checkbox"> <img src="../assets/images/image-y.png"
                                                                 class="img-responsive sheld_img"/>
                                </label>
                                <label class="form_error">
                                    <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zero attempts to
                                        Strategies</p>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Funding Needs</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="fileEdit" class="form-control file_input_bar">
                                    <i class="fa-2x fa fa-paperclip" aria-hidden="true"></i>
                                    <span class="file_text">
                                    choose File
                                    </span>
                                    <input id="fileEdit" class="hidden" type="file" name="addImg"
                                           ng-file-change="onImageChange( $files )" ng-multiple="false"
                                           accept="{{ contentType }}"/>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" id="msg_btn">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
