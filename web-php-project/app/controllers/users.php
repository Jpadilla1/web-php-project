<?php 

class Users extends Controller {
	
	public function index($name = '') {
		
		$this->view('users/index');
	}

	public function create() {
		
		$data = ['categorias' => DB::getInstance()->get('categoria')->results()];

		if (Input::exists()) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'usu_id_PK' => array(
					'required' => true,
					'max' => 6,
					'unique' => 'usuario'
				),
				'usu_username' => array(
					'required' => true,
					'max' => 15,
					'min' => 3,
					'unique' => 'usuario'
				),
				'name' => array(
					'required' => true,
					'min' => 3,
					'max' => 40
				),
				'password' => array(
					'required' => true,
				),
				'password_again' => array(
					'required' => true,
					'matches' => 'password'
				)
			));

			if ($validation->passed()) {
				$user = $this->model('User');
				try {
					$user->create(array(
						'usu_id_PK' => Input::get('usu_id_PK'),
						'usu_username' => Input::get('usu_username'),
						'usu_password' => Input::get('password'),
						'usu_nombre' => Input::get('name'),
						'usu_last_login' => date('Y-m-d'),
						'usu_intentos_fallidos' => 0,
						'usu_fecha_creacion' => '',
						'usu_fecha_expiracion' => '',
						'usu_fecha_cambio_password' => '',
						'usu_flag_cambio_password' => 'F',
						'usu_cantidad_dias_password' => '',
						'cat_id_FK' => Input::get('cat_id_FK')
						));
				} catch (Exception $e) {
					die($e->getMessage());
				}
				Session::flash('user_created', "User was created successfully!");
				Redirect::to('users/index');
			} else {
				$data['form_errors'] = $validation->errors(); 
			}
		}

		$this->view('users/create', $data);
	}

}

?>