<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Update category<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h1>Updating category: <?= $data['category']->cat_titulo; ?></h1>
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
        	<p class="lead">Category ID: <?= $data['category']->cat_id_PK; ?></p>
        </div>
        <div class="form-group">
        	<p class="lead">Title: <?= $data['category']->cat_titulo; ?></p>
        </div>
        <div class="form-group">
            <label for="name">Description </label>
            <input type="text" class="form-control" value="<?= $data['category']->cat_descripcion; ?>" name="description" id="description" placeholder="Description">
        </div>
        </br>
        <center>
            <div class="form-group" id="button">
                <button type="submit" class="btn btn-lg btn-success">Update</button>
                <a href="<?php echo Config::get('SITE_URL') ?>categories/delete/<?= $data['category']->cat_id_PK; ?>" 
                    class="btn btn-lg btn-danger">Delete</a>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>