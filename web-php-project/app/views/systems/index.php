<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Systems<?php endblock() ?>
<?php startblock('content') ?>
<div class="container clearfix">
    <h1 class="text-center">University of Puerto Rico at Bayamon</h1>
    <h3 class="text-center">System Management</h3>
    <br>
    <a href="<?php echo Config::get('SITE_URL') ?>systems/create" class="btn btn-default">Add System</a>
    <br><br>
    <?php 
      if (Session::exists('systems')) {
        echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong>" . Session::flash('systems') ."</strong>
          </div>";
      }
    ?>
    <table id="systems_table" class="table table-responsive table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($data['systems'] as $category => $value) {
            echo  "<tr>".
                     "<td>{$value->sis_id_PK}</td>".
                     "<td><a href='" . Config::get('SITE_URL') . "systems/update/" . 
                     $value->sis_id_PK . "'>{$value->sis_titulo}</a></td>".
                     "<td>{$value->sis_descripcion}</td>".
                  "</tr>";
          }
        ?>
      </tbody>
    </table>
</div>
<?php endblock() ?>