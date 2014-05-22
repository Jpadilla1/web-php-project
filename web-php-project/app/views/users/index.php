<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Users<?php endblock() ?>
<?php startblock('page_id') ?>USE001<?php endblock() ?>
<?php startblock('content') ?>
<div class="container clearfix">
    <h1 class="text-center">University of Puerto Rico at Bayamon</h1>
    <h3 class="text-center">User Management</h3>
    <br>
    <a href="<?php echo Config::get('SITE_URL') ?>users/create" class="btn btn-default">Add User</a>
    <a href="<?php echo Config::get('SITE_URL') ?>users/assign_to_system" class="btn btn-default">Add User to System</a>
    <br><br>
    <?php 
      if (Session::exists('users')) {
        echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong>" . Session::flash('users') ."</strong>
          </div>";
      }
      if (Session::exists('users_warning')) {
        echo "<div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong>" . Session::flash('users_warning') ."</strong>
          </div>";
      }
    ?>
    <table id="users_table" class="table table-responsive table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Name</th>
          <th>Last Login</th>
          <th>Created Date</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($data['users'] as $user => $value) {
            echo  "<tr>".
                     "<td>{$value->usu_id_PK}</td>".
                     "<td><a href='" . Config::get('SITE_URL') . "users/update/" . 
                     $value->usu_username . "'>{$value->usu_username}</a></td>".
                     "<td>{$value->usu_nombre}</td>".
                     "<td>{$value->usu_last_login}</td>".
                     "<td>{$value->usu_fecha_creacion}</td>".
                  "</tr>";
          }
        ?>
      </tbody>
    </table>
</div>
<?php endblock() ?>