<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Create user<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h1>Create a New User</h1>
            <h4>Please fill out the form</h4>
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
            <label for="user-id">User ID</label>
            <input type="text" class="form-control" value="<?php echo escape(Input::get('usu_id_PK')); ?>" name="usu_id_PK" id="user-id" placeholder="User ID">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" value="<?php echo escape(Input::get('usu_username')); ?>" name="usu_username" id="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="<?php echo escape(Input::get('name')); ?>" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Passsword">
        </div>
        <div class="form-group">
            <label for="verify-password">Password (again)</label>                    
            <input type="password" class="form-control" name="password_again" id="verify-password" placeholder="Password(again)">
        </div>
        <div class="form-group">
            <label for="account-type">Account Type</label>
            <select name="cat_id_FK" id="cat_id_FK" class="form-control">
                <?php 
                    foreach ($data['categorias'] as $key => $value) {
                        if (Input::get('cat_id_FK') === $value->cat_id_PK) {
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
                <button type="submit" class="btn btn-lg btn-success">Create</button>
                <button type="reset" class="btn btn-lg btn-danger">Reset</button>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>