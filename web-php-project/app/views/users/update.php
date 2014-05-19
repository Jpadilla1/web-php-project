<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Create user<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h1>Updating user: <?= $data['user']->usu_username; ?></h1>
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
        	<p class="lead">User ID: <?= $data['user']->usu_id_PK; ?></p>
        </div>
        <div class="form-group">
        	<p class="lead">Username: <?= $data['user']->usu_username; ?></p>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="<?= $data['user']->usu_nombre; ?>" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="account-type">Account Type</label>
            <select name="cat_id_FK" id="cat_id_FK" class="form-control">
                <?php 
                    foreach ($data['categorias'] as $key => $value) {
                        if ($data['user']->cat_id_FK === $value->cat_id_PK) {
                            echo "<option value='{$value->cat_id_PK}' selected='selected'>{$value->cat_titulo}</option>";
                        } else {
                            echo "<option value='{$value->cat_id_PK}'>{$value->cat_titulo}</option>";
                        }
                    }
                ?>
            </select>
        </div>
        </br>
        <center>
            <div class="form-group" id="button">
                <button type="submit" class="btn btn-lg btn-success">Update</button>
                <a href="<?php echo Config::get('SITE_URL') ?>users/delete/ <?= $data['user']->usu_username; ?>" 
                    class="btn btn-lg btn-danger">Delete</a>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>