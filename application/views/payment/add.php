<?php
    $this->load->view('common/header');
?>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        <?php echo ucwords(str_replace('_', ' ', $header)) ?>
                    </h3>
                    <!--<ul class="page-breadcrumb breadcrumb">

                        <li>
                            <i class="fa fa-home"></i>
                            <a href="<?php /*echo site_url('home/home_page'); */?>">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php /*echo site_url($ctrl); */?>"><?php /*echo ucwords(str_replace('_', ' ', $nav_bar)) */?></a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <p><?php /*echo ucwords($add) */?></p>
                        </li>
                    </ul>-->
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <!--<div class="caption">
                                <i class="fa fa-reorder"></i> <?php /*echo ucwords(str_replace('_', ' ', $table_title))*/?> <?php /*echo ucwords($add) */?>
                            </div>-->
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form id="theform" role="form" action="<?php echo site_url($ctrl . '/' . $func . $save); ?>" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Pay By<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="<?php echo $user['name'] ?>" disabled>
                                                <input type="hidden" class="form-control" id="user_id" name="user_id"
                                                       value="<?php echo $user['id'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content">Amount <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                       placeholder="Amount" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content">Month <span style="color: red;">*</span></label>
                                                <select class="form-control select2me"
                                                        data-placeholder="Select Month" id="payment_month" name="payment_month"
                                                        required>
                                                    <option value=""></option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <!--<option value="November">November</option>
                                                    <option value="December">December</option>-->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content">Year <span style="color: red;">*</span></label>
                                                <select class="form-control select2me"
                                                        data-placeholder="Select Year" id="payment_year" name="payment_year"
                                                        required>
                                                    <option value=""></option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status<span style="color: red;">*</span></label>
                                                <select class="form-control select2me"
                                                        data-placeholder="Select Status" id="status_id" name="status_id"
                                                        required>
                                                    <option value=""></option>
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" class="btn blue" id="btnsubmit" value="Save">
                                    <button type="button" class="btn default"
                                            onclick="document.location.href='<?php echo site_url($ctrl); ?>'">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$this->load->view('common/footer');
?>
