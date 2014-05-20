<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Create system<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h1>Create a New System</h1>
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
            <label for="system-id">System ID</label>
            <input type="text" class="form-control" value="<?php echo escape(Input::get('sis_id_PK')); ?>" name="sis_id_PK" id="system-id" placeholder="System ID">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" value="<?php echo escape(Input::get('title')); ?>" name="title" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" value="<?php echo escape(Input::get('description')); ?>" name="description" id="description" placeholder="Description">
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