
<form action="" method="post">
	<input type="text" name="usu_username" value="<?php echo escape(Input::get('username')); ?>">
	<input type="password" name="password">
	<input type="submit" value="submit">
</form>