<?php
include '../app/views/base.php'; ?>

<?php
startblock('title') ?>Reports<?php
endblock() ?>

<?php startblock('page_id') ?>REP001<?php endblock() ?>
    
<?php startblock('content') ?>
<div class="container">
    <h1 class="text-center">University of Puerto Rico at Bayamon</h1>
    <br>
    <h3 class="text-center">Reports</h3>
    <div class="col-sm-6">
		<div class="row">
			<h4 class="text-center">Users</h4>
			<hr>
			<div class="col-sm-12">
				<h4 class="text-center">PDF</h4>
				<a href="<?php echo Config::get('SITE_URL') ?>reports/users/created date" target="_blank" class="btn btn-lg btn-danger">by Creation date</a>
				<a href="<?php echo Config::get('SITE_URL') ?>reports/users/username" target="_blank" class="btn btn-lg btn-danger">by Username</a>
				<a href="<?php echo Config::get('SITE_URL') ?>reports/users/name" target="_blank" class="btn btn-lg btn-danger">by Name</a>
				<a href="<?php echo Config::get('SITE_URL') ?>reports/user_systems" target="_blank" class="btn btn-lg btn-danger">by System</a>
			</div>
			<div class="col-sm-12">
				<br>
				<br>
				<h4 class="text-center">CSV</h4>
				<center>
					<a href="<?php echo Config::get('SITE_URL') ?>reports/users_excel" target="_blank" class="btn btn-lg btn-success">Users</a>
					<a href="<?php echo Config::get('SITE_URL') ?>reports/user_systems_excel" target="_blank" class="btn btn-lg btn-success">Users by System</a>
				</center>
			</div>
		</div>
    </div>
    <div class="col-sm-6">
		<h4 class="text-center">Categories</h4>
		<hr>
		<center>	
			<a href="<?php echo Config::get('SITE_URL') ?>reports/categories" target="_blank" class="btn btn-lg btn-danger">PDF</a>
			<a href="<?php echo Config::get('SITE_URL') ?>reports/categories_excel" target="_blank" class="btn btn-lg btn-success">CSV</a>
		</center>
		<br>
		<h4 class="text-center">Systems</h4>
		<hr>
		<center>
			<a href="<?php echo Config::get('SITE_URL') ?>reports/systems" target="_blank" class="btn btn-lg btn-danger">PDF</a>
			<a href="<?php echo Config::get('SITE_URL') ?>reports/systems_excel" target="_blank" class="btn btn-lg btn-success">CSV</a>
		</center>
		<br>
		<h4 class="text-center">Logs</h4>
		<hr>
		<center>
			<a href="<?php echo Config::get('SITE_URL') ?>reports/logs" target="_blank" class="btn btn-lg btn-danger">PDF</a>
			<a href="<?php echo Config::get('SITE_URL') ?>reports/logs_excel" target="_blank" class="btn btn-lg btn-success">CSV</a>
    	</center>
    </div>
</div>
<?php endblock() ?>