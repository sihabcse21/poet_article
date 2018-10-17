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
                            <p><?php /*echo ucwords($view) */?></p>
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
                                <i class="fa fa-reorder"></i> <?php /*echo ucwords(str_replace('_', ' ', $table_title))*/?>
                                <?php /*echo ucwords($view) */?>
                            </div>-->
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Pay By<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="<?php echo $user['name'] ?>" disabled>
                                            <input type="hidden" class="form-control" id="user_id" name="user_id"
                                                   value="<?php echo $result->user_id ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content">Amount <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="amount" name="amount"
                                                   value="<?php echo $result->amount ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content">Month <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="payment_month" name="payment_month"
                                                   value="<?php echo $result->payment_month ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content">Year <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="payment_year" name="payment_year"
                                                   value="<?php echo $result->payment_year ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="parent_category_id">Status<span style="color: red;">*</span></label>
                                            <select class="form-control select2me"
                                                    data-placeholder="Select Status" id="status_id" name="status_id" disabled>
                                                <?php
                                                $selected    = '';
                                                $selected_in = '';
                                                ($result->status_id == 1) ? $selected = 'selected' : $selected_in ='selected' ?>
                                                <option value=""></option>
                                                <option value="1" <?php echo $selected ?>>Active</option>
                                                <option value="2" <?php echo $selected_in ?>>In Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-actions">
                                    <button type="button" class="btn default"
                                            onclick="document.location.href='<?php echo site_url($ctrl); ?>'">
                                        Back
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$this->load->view('common/footer');
?>
<script>

    $(document).ready(function (){
        var text_max = 1000;
        $('#count_area').html(text_max + ' characters remaining');

        $('#content').keyup(function (){
            var text_length    = $('#content').val().length;
            var text_remaining = text_max - text_length;

            $('#count_area').html(text_remaining + ' characters remaining');
        });
    });

</script>