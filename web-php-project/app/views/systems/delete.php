<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Delete system<?php endblock() ?>
<?php startblock('page_id') ?>SIS004<?php endblock() ?>
<?php startblock('content') ?>
<div class="container">
   <div class="page-header">
        <center>
            <h2>Are you sure?</h2>
        </center>
    </div>
</div>
<div class="col-sm-6 col-sm-offset-3">
    <ul>
        <?php
            if ($data['assigned_users']) {
                echo '<h3>This will unassign the following users from this system:</h3>';
                foreach ($data['assigned_users'] as $key => $value) {
                    $assigned_user = DB::getInstance()->get('usuario', array('usu_id_PK', '=', $value->usu_id_PK))->first();
                    echo "<a href='". Config::get('SITE_URL') ."users/update/". $assigned_user->usu_username .
                    "'><li class='text-b'>". $assigned_user->usu_username ." - ". $assigned_user->usu_nombre ."</li></a>";
                }
            }
        ?>
    </ul>
    <form role="form" action="" method="post">
        <input type="hidden" name="id" value="<?= $data['system']->sis_id_PK ?>">
        </br>
        <center>
            <div class="form-group" id="button">
                <button type="submit" class="btn btn-lg btn-danger">Delete</a>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>