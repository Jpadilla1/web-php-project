<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Change password<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h1>Change password for user: <?=$data['user']?></h1>
        </center>
    </div>
</div>
<div class="col-sm-6 col-sm-offset-3">
    <?php 
        if (isset($data['form_errors'])) {
            foreach ($data['form_errors'] as $error) {
                echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>{$error}</strong>
                </div>";
            }
        }
    ?>
    <form role="form" action="" method="post">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password_new" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="verify-password">Password (again)</label>                    
            <input type="password" class="form-control" name="password_new_again" id="verify-password" placeholder="Password(again)">
        </div>
        </br>
        <center>
            <div class="form-group" id="button">
                <button type="submit" class="btn btn-lg btn-success">Change</button>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>