<?php
include 'base.php'; ?>

<?php
startblock('title') ?>Home<?php
endblock() ?>

<?php
startblock('content') ?>

<?php 
$con=mysql_connect("localhost","root","");
$db_found = mysql_select_db("sistema_seguridad_administracion");
$query = mysql_query("INSERT INTO usuario ". 
  "VALUES('1', 'admin','admin','jose','". date('Y-m-d') ."', 10, '". date('Y-m-d') ."', '". date('Y-m-d') ."', '". date('Y-m-d') ."', 0, 100, 1);");
echo "INSERT INTO usuario ". 
  "VALUES('1', 'admin','admin','jose','". date('Y-m-d') ."', 10, '". date('Y-m-d') ."', '". date('Y-m-d') ."', '". date('Y-m-d') ."', 0, 100, 1);";
?>

  <div class="container">
<div class="page-header">
  <center><h1>University of Puerto Rico at Bayamón</h1>
  <h4>Security Administration Management System</h4></center>
</div>
</div>



    </nav>
<div class="container">
<div class="jumbotron">
    
  <h1>Welcome Back!</h1>
  <p><h3>Welcome to Security Administration Management System!</h3>
    Security Administration Manegemnt System serve as an aly to your company to protect, manage and service
    all the data in a secure and easy way. Do not worry about reports and any kind of problems managing data, we have the solution 
    for you. 
<h5>Sign in if you have an account!</h5>
</p>
</br>
</br>
  
 <form class="form-horizontal" "col-sm-4" role="form">
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Username"/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Sign in</button>
    </div>
  </div>
</form>


</div>
</div>
   
<?php
endblock() ?>