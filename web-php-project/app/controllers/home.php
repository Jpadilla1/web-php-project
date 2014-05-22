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
					$user_id = new User(Input::get('usu_username'));
					$log = $this->model('Log');
					$log->create(array(
						'usu_id_PK_FK' => $user_id->data()->usu_id_PK,
						'vit_codigo' => 'LOI',
						'vit_nemonic' => 'Login In',
						'vit_accion' => 'El usuario entro al sistema.',
						'vit_fecha' => date('Y-m-d')));
					Redirect::to('menu/index');
					Session::flash('success', "You've logged in successfully!");					
				} else {
					$user_id = new User(Input::get('usu_username'));
					if ($user_id->data()->usu_id_PK) {
						$log = $this->model('Log');
						$log->create(array(
							'usu_id_PK_FK' => $user_id->data()->usu_id_PK,
							'vit_codigo' => 'FAI',
							'vit_nemonic' => 'Failed Access',
							'vit_accion' => 'Se inteno entrar a una cuenta.',
							'vit_fecha' => date('Y-m-d')));
					}
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
		$log = $this->model('Log');
		$log->create(array(
			'usu_id_PK_FK' => $user->data()->usu_id_PK,
			'vit_codigo' => 'LOO',
			'vit_nemonic' => 'Login Out',
			'vit_accion' => 'El usuario salio del sistema.',
			'vit_fecha' => date('Y-m-d')));
		$user->logout();
		Redirect::to('home/index');
	}
}

?>