<?php include('header.php'); ?>
<?php include('left_side.php'); ?>
<?php include('dashboard_nav.php'); ?>
<div class="wrapper">
    <div class="heading_one">
        <h1>Request Listing Review</h1>
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
                    <div class="Form_main">
                        <form>
                            <div class="form-group">
                                <label>Subject</label>
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
                                <label>Your Message</label>
                                <textarea class="form-control" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" id="msg_btn">Save changes
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
