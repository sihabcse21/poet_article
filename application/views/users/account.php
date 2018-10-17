<?php
$this->load->view('common/header');
?>
<li>
    <?php echo anchor('/users/logout/', 'Logout'); ?>
</li>
<li>
    <?php echo anchor('/articles/index/', 'Articles'); ?>
</li>
<?php if($user['role_id'] != 3) { ?>
<li>
    <?php echo anchor('/payments/index/', 'Payments'); ?>
</li>
<?php } ?>
    <h2>User Account</h2>
    <h3>Welcome <?php echo $user['name']; ?>!</h3>
    <div class="account-info">
        <p><b>Name: </b><?php echo $user['name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
        <p><b>Phone: </b><?php echo $user['mobile_no']; ?></p>
    </div>

<?php $this->load->view('common/footer');?>