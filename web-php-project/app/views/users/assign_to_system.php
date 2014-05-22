<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Assign user to a system<?php endblock() ?>
<?php startblock('page_id') ?>USE005<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h1>Assign a user to a system</h1>
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
            <label for="selected_user">Select a user:</label>
            <select class="form-control" name="selected_user" id="selected_user">
                <?php foreach ($data['users'] as $key => $value) {
                    echo "<option value='{$value->usu_id_PK}'>{$value->usu_username}</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="selected_system">Select a system:</label>
            <select class="form-control" name="selected_system" id="selected_system">
                <?php foreach ($data['systems'] as $key => $value) {
                    echo "<option value='{$value->sis_id_PK}'>{$value->sis_titulo}</option>";
                } ?>
            </select>
        </div>
        </br>
        <center>
            <div class="form-group" id="button">
                <button type="submit" class="btn btn-lg btn-success">Assign</button>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>