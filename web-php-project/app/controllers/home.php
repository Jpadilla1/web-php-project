<?php 

class Home extends Controller {
	
	public function index($name = '') {
		$data = [];
		if (Input::exists()) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'usu_username' => array(
					'required' => true,
					'max' => 20,
				),
				'password' => array(
					'required' => true,
				)
			));

			if ($validation->passed()) {
				$user = DB::getInstance()->get('usuario', array('usu_username', '=', $_POST['usu_username']));
				if ($user->results() && $user->results()[0]->usu_password === $_POST['password']) {
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

	public function form($fields = array()) {
		
		$this->view('home/login');
	}

}

?>