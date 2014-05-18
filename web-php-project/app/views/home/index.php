<?php include '../app/views/base.php'; ?>

<?php
startblock('title') ?>Home<?php
endblock() ?>

<?php
startblock('content') ?>
<div class="container">
	<div class="page-header">
  		<center><h1>University of Puerto Rico at Bayamón</h1>
  		<h4>Security Administration Management System</h4></center>
	</div>
</div>
<div class="container">
	<div class="jumbotron">
    
		<h1>Welcome Back!</h1>
		<p><h3>Welcome to Security Administration Management System!</h3>
		Security Administration Manegemnt System serve as an aly to your company to protect, manage and service
		all the data in a secure and easy way. Do not worry about reports and any kind of problems managing data, we have the solution 
		for you. 
		<h5>Sign in if you have an account!</h5></p>
		</br>
		</br>
  
		<?php 
			if (isset($data['form_errors'])) {
				foreach ($data['form_errors'] as $error) {
					echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>{$error}</strong>
					</div>";
				}
			}

			if (Session::exists('incorrect')) {
				echo "<div class='alert alert-danger alert-dismissable'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>" . Session::flash('incorrect') ."</strong>
					</div>";
			}
		?> 
 		<form action="" method="post" class="form-horizontal" role="form">
			<div class="form-group">
			    <label for="username" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-4">
			      <input type="text" value="<?php echo escape(Input::get('usu_username')); ?>" class="form-control" name="usu_username" id="username" placeholder="Username"/>
			    </div>
			</div>
			<div class="form-group">
			    <label for="password" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-4">
			      <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
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