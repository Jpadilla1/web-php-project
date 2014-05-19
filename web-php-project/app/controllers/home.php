<?php 

class Home extends Controller {
	
	public function index($name = '') {
		$data = [];
		$user = new User();
		if ($user->isLoggedIn()) {
			Redirect::to('menu/index');
		}

		if (Input::exists()) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'usu_username' => array(
					'required' => true,
				),
				'password' => array(
					'required' => true,
				)
			));

			if ($validation->passed()) {
				$user = new User();
				$login = $user->login(Input::get('usu_username'), Input::get('password'));
				if ($login) {
					Redirect::to('menu/index');
					Session::flash('success', "You've logged in successfully!");					
				} else {
					Session::flash('incorrect', "Username and/or password is incorrect.");										
				}
			} else {
				$data['form_errors'] = $validation->errors(); 
			}
		}

		$this->view('home/index', $data);
	}

	public function logout() {
		$user = new User();
		$user->logout();
		Redirect::to('home/index');
	}
}

?>