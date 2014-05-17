<?php 

class User extends Controller {
	
	public function index($name = '') {

		$user = $this->model('User');
		$user->name = $name;
		
		$this->view('users/index', ['name' => $user->name]);
	}

}

?>