<?php 

if (Input::exists()) {
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		'usu_username' => array(
			'required' => true,
			'min' => 2,
			'max' => 20,
			'unique' => 'usuario'
		),
		'password' => array(
			'required' => true,
			'min' => 6
		)
	));

if ($validation->passed()) {
	echo 'Passed';
} else {
	foreach ($validation->errors() as $error) {
		echo $error , '<br>';
	}
}

}

?>

<form action="" method="post">
	<input type="text" name="usu_username" value="<?php echo escape(Input::get('username')); ?>">
	<input type="password" name="password">
	<input type="submit" value="submit">
</form>