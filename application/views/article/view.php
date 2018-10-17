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
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                   value="<?php echo $result->title ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="content">Content</label> ( <span
                                                    id="count_area"></span> )
                                            <?php
                                            if($user['is_monthly_paid'] == 1) { ?>
                                                <textarea disabled class="form-control" rows="4" id="content"
                                                          name="content"
                                                          placeholder="Type Content (1000 Characters)"
                                                          maxlength="1000"><?php echo $result->content;?></textarea>
                                            <?php
                                            }else if($user['role_id'] == 2){
                                                $total = ( str_word_count($result->content) );
                                                $string = word_limiter($result->content, $total*70/100);
                                                //echo $string;
                                                ?>
                                                <textarea disabled class="form-control" rows="4" id="content"
                                                          name="content"
                                                          placeholder="Type Content (1000 Characters)"
                                                          maxlength="1000"><?php echo $string;?></textarea>
                                            <?php
                                            }else if($user['role_id'] == 3){
                                                $total = ( str_word_count($result->content) );
                                                $string = word_limiter($result->content, $total*50/100);
                                                //echo $string;
                                            ?>
                                                <textarea disabled class="form-control" rows="4" id="content"
                                                          name="content"
                                                          placeholder="Type Content (1000 Characters)"
                                                          maxlength="1000"><?php echo $string;?></textarea>
                                            <?php
                                            }
                                            ?>

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