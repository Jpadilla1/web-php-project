<?php
include '../app/views/base.php'; ?>

<?php
startblock('title') ?>Menu<?php
endblock() ?>

<?php startblock('page_id') ?>MEN001<?php endblock() ?>
    
<?php startblock('content') ?>
<div class="container">
    <?php 
        $user = new User();
        $permission = $user->hasPermission('normal');
     ?>
    <h1 class="text-center">University of Puerto Rico at Bayamon</h1>
    <br>
    <?php if (!$permission) { ?>
    <div class="col-sm-6">
        <center>   
            <a href="<?php echo Config::get('SITE_URL') ?>users/index">
                <img src="<?php echo Config::get('SITE_URL') ?>static/img/users.jpg" class="img-responsive" alt="">
            </a>
        </center>
        <h3 class="text-center">Manage Users</h3>
    </div>
    <div class="col-sm-6">
        <center>    
            <a href="<?php echo Config::get('SITE_URL') ?>systems/index">
                <img src="<?php echo Config::get('SITE_URL') ?>static/img/systems.jpg" class="img-responsive" alt="">
            </a>
        </center>
        <h3 class="text-center">Manage Systems</h3>
    </div>
    <div class="col-sm-6">
        <center>  
            <a href="<?php echo Config::get('SITE_URL') ?>categories/index">  
                <img src="<?php echo Config::get('SITE_URL') ?>static/img/list.jpg" class="img-responsive" alt="">
            </a>
        </center>
        <h3 class="text-center">Manage Categories</h3>
    </div>
    <?php } ?>
    <div class="col-sm-6">
        <center>    
            <a href="#">
                <img src="<?php echo Config::get('SITE_URL') ?>static/img/reports.jpg" class="img-responsive" alt="">
            </a>
        </center>
        <h3 class="text-center">Reports</h3>
    </div>
</div>
<?php endblock() ?>
