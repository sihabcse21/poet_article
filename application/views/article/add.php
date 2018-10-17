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
                                                <label for="title">Title<span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                       placeholder="Title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content">Content</label> ( <span
                                                        id="count_area"></span> )
                                                <textarea class="form-control" rows="4" id="content"
                                                          name="content"
                                                          placeholder="Type Content (1000 Characters)"
                                                          maxlength="1000"></textarea>
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

<script>

    /*$('#creation_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });*/

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
