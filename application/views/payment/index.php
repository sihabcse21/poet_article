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
                    <li>
                        <?php echo anchor('/articles/index/', 'Articles'); ?>
                    </li>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <div class="form-body">
            <div class="portlet box blue">
                <div class="portlet-title">
                   <!-- <div class="caption">
                        <i class="fa fa-cogs"></i><?php /*echo ucwords(str_replace('_', ' ', $table_title)) */?>
                    </div>-->
                    <div class="actions">
                        <a href="<?php echo site_url($ctrl . '/' . $func . $add); ?>"
                           class="btn green"
                           style="display:block;;">
                            <i class="fa fa-plus"></i>
                            Add <?php echo ucwords(str_replace('_', ' ', $header)) ?></a>
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
                                    Paid By
                                </th>
                                <th class="bold">
                                    Paid Month
                                </th>
                                <th class="bold">
                                    Paid Year
                                </th>
                                <th class="bold">
                                    Amount
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
                                            <?php echo $results['u_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $results['payment_month']; ?>
                                        </td>
                                        <td>
                                            <?php echo $results['payment_year']; ?>
                                        </td>
                                        <td>
                                            <?php echo $results['amount']; ?>
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
