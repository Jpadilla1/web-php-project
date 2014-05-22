<?php include '../app/views/base.php'; ?>
<?php startblock('title') ?>Categories<?php endblock() ?>
<?php startblock('page_id') ?>CAT001<?php endblock() ?>
<?php startblock('content') ?>
<div class="container clearfix">
    <h1 class="text-center">University of Puerto Rico at Bayamon</h1>
    <h3 class="text-center">Category Management</h3>
    <br>
    <a href="<?php echo Config::get('SITE_URL') ?>categories/create" class="btn btn-default">Add Category</a>
    <br><br>
    <?php 
      if (Session::exists('categories')) {
        echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong>" . Session::flash('categories') ."</strong>
          </div>";
      }
    ?>
    <table id="categories_table" class="table table-responsive table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($data['categories'] as $category => $value) {
            echo  "<tr>".
                     "<td>{$value->cat_id_PK}</td>".
                     "<td><a href='" . Config::get('SITE_URL') . "categories/update/" . 
                     $value->cat_id_PK . "'>{$value->cat_titulo}</a></td>".
                     "<td>{$value->cat_descripcion}</td>".
                  "</tr>";
          }
        ?>
      </tbody>
    </table>
</div>
<?php endblock() ?>