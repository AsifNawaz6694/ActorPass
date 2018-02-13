<?php include('header.php'); ?>
<?php include('left_side.php'); ?>
<?php include('dashboard_nav.php'); ?>
    <div class="wrapper">
        <div class="heading_one">
            <h1>Funded Details</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-body ">
                        <h4 class="float-left text-left">Informations</h4>
                        <div class="list_border clearfix"></div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <table id="transaction_table" class="table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="Date">12 09 2017</td>
                                        <td data-label="Details">Neque porro quisquam estlium</td>
                                        <td data-label="Amount">$89.60</td>
                                        <td data-label="Status"><span><i class="fa fa-check" aria-hidden="true"></i> PAID</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Date">12 09 2017</td>
                                        <td data-label="Details">Neque porro quisquam estlium</td>
                                        <td data-label="Amount">$89.60</td>
                                        <td data-label="Status"><span><i class="fa fa-check" aria-hidden="true"></i> PAID</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Date">12 09 2017</td>
                                        <td data-label="Details">Neque porro quisquam estlium</td>
                                        <td data-label="Amount">$89.60</td>
                                        <td data-label="Status"><span><i class="fa fa-check" aria-hidden="true"></i> PAID</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--./End Transaction Here -->
    </div>
<?php include('footer.php'); ?>