<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Update system<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h1>Updating system: <?= $data['system']->sis_titulo; ?></h1>
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
        	<p class="lead">System ID: <?= $data['system']->sis_id_PK; ?></p>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="<?= $data['system']->sis_titulo; ?>" name="title" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="description">Description </label>
            <input type="text" class="form-control" value="<?= $data['system']->sis_descripcion; ?>" name="description" id="description" placeholder="Description">
        </div>
        </br>
        <center>
            <div class="form-group" id="button">
                <button type="submit" class="btn btn-lg btn-success">Update</button>
                <a href="<?php echo Config::get('SITE_URL') ?>systems/delete/<?= $data['system']->sis_id_PK; ?>" 
                    class="btn btn-lg btn-danger">Delete</a>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>