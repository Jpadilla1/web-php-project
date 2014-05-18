<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Users<?php endblock() ?>
<?php startblock('content') ?>
<div class="container clearfix">
    <h1 class="text-center">University of Puerto Rico at Bayamon</h1>
    <h3 class="text-center">User Management</h3>
    <br>
    <a href="<?php echo Config::get('SITE_URL') ?>users/create" class="btn btn-default">Add User</a>
    <br><br>
    <?php 
      if (Session::exists('user_created')) {
        echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong>" . Session::flash('user_created') ."</strong>
          </div>";
      }
    ?>
    <table class="table table-responsive table-striped table-bordered">
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
        <tr>
          <td>1</td>
          <td><a href="#">@mdo</a></td>
          <td>Mark</td>
          <td>today</td>
          <td>today</td>
        </tr>
        <tr>
         <td>1</td>
          <td><a href="#">@mdo</a></td>
          <td>Mark</td>
          <td>today</td>
          <td>today</td>
        </tr>
        <tr>
         <td>1</td>
          <td><a href="#">@mdo</a></td>
          <td>Mark</td>
          <td>today</td>
          <td>today</td>
        </tr>
        <tr>
         <td>1</td>
          <td><a href="#">@mdo</a></td>
          <td>Mark</td>
          <td>today</td>
          <td>today</td>
        </tr>
      </tbody>
    </table>
    <ul class="pagination">
      <li class="disabled"><a href="#">«</a></li>
      <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">»</a></li>
   </ul>
</div>
<?php endblock() ?>