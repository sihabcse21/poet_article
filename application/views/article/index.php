<?php
$this->load->view('common/header');

?>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 class="page-title">
                        <?php echo ucwords(str_replace('_', ' ', $header)) ?>
                    </h3>
                    <li>
                        <?php echo anchor('/users/logout/', 'Logout'); ?>
                    </li>
                    <li>
                        <?php echo anchor('/users/account/', 'Accounts'); ?>
                    </li>
                    <?php if($user['role_id'] != 3) { ?>
                    <li>
                        <?php echo anchor('/payments/index/', 'Payments'); ?>
                    </li>
                    <?php } ?>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="form-body">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="actions">
                        <?php if($user['role_id'] == 1) { ?>
                        <a href="<?php echo site_url($ctrl . '/' . $func . $add); ?>"
                           class="btn green"
                           style="display:block;;">
                            <i class="fa fa-plus"></i>
                            Add <?php echo ucwords(str_replace('_', ' ', $header)) ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                            <thead>
                            <tr>
                                <th class="bold">
                                    SL
                                </th>
                                <th class="bold">
                                    Title
                                </th>
                                <th class="bold">
                                    Content
                                </th>
                                <th class="bold">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                                foreach($result as $results){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $results['title']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($user['is_monthly_paid'] == 1) {
                                                echo $results['content'];
                                            }else if($user['role_id'] == 2){
                                                $total = ( str_word_count($results['content']) );
                                                $string = word_limiter($results['content'], $total*70/100);
                                                echo $string;
                                            }else if($user['role_id'] == 3){
                                                $total = ( str_word_count($results['content']) );
                                                $string = word_limiter($results['content'], $total*50/100);
                                                echo $string;
                                            }
                                            ?>
                                        </td>
                                        <td class="">
                                            <?php if($user['role_id'] == 1) {?>
                                            <a href="<?php echo $ctrl . '/' . $func . $edit . '/' . $results['id'] ?>" target="_blank" class="btn btn-xs blue" role="button"><i class="fa fa-pencil"></i> Edit</a>
                                            <?php } ?>
                                            <a href="<?php echo $ctrl . '/' . $func . $view . '/' . $results['id'] ?>" target="_blank" class="btn btn-xs blue" role="button"><i class="fa fa-eye"></i> View</a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>

<?php
$this->load->view('common/footer');
?>
