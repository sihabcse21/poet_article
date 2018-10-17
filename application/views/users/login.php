
<?php
$this->load->view('common/header');
?>
    <h2>User Login</h2>
    <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
    <form action="" method="post">
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username" required="" value="">
            <?php echo form_error('username','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="">
            <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="submit" name="loginSubmit" class="btn-primary" value="Submit"/>
        </div>
    </form>
    <p class="footInfo">Don't have an account? <a href="<?php echo base_url(); ?>users/registration">Register here</a></p>

<?php $this->load->view('common/footer');?>