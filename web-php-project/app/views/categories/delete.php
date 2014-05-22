<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Delete category<?php endblock() ?>
<?php startblock('page_id') ?>CAT004<?php endblock() ?>
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
            if ($data['users_with_category']) {
                echo '<h3>This will delete the following users:</h3>';
                foreach ($data['users_with_category'] as $key => $value) {
                    echo "<a href='". Config::get('SITE_URL') ."users/update/". $value->usu_username ."'><li class='text-b'>". $value->usu_nombre ."</li></a>";
                }
            }
        ?>
    </ul>
    <form role="form" action="" method="post">
        <input type="hidden" name="id" value="<?= $data['category']->cat_id_PK ?>">
        </br>
        <center>
            <div class="form-group" id="button">
                <button type="submit" class="btn btn-lg btn-danger">Delete</a>
            </div>
        </center>
    </form>
</div>
<?php endblock() ?>