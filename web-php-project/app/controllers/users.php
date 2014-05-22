<?php 

class Users extends Controller {
	
	public function index() {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal')) {
			$data = ['users' => DB::getInstance()->get('usuario')->results()];
			$this->view('users/index', $data);
		} else {
			Redirect::to('home/index');
		}
	}

	public function create() {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal')) {
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
							'usu_fecha_creacion' => date('Y-m-d'),
							'usu_fecha_expiracion' => '',
							'usu_fecha_cambio_password' => '',
							'usu_flag_cambio_password' => 'F',
							'usu_cantidad_dias_password' => '',
							'cat_id_FK' => Input::get('cat_id_FK')
							));
						Session::flash('users', "User was created successfully!");
					} catch (Exception $e) {
						die($e->getMessage());
					}
					Redirect::to('users/index');
				} else {
					$data['form_errors'] = $validation->errors(); 
				}
			}

			$this->view('users/create', $data);
		} else {
			Redirect::to('home/index');			
		}
	}

	public function update($username) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal') && $username) {
			$data = ['categorias' => DB::getInstance()->get('categoria')->results(),
					 'user' => DB::getInstance()->get('usuario', array('usu_username', '=', $username))->first()];
			if (Input::exists()) {
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					'name' => array(
						'required' => true,
						'min' => 3,
						'max' => 40
					),
				));
				if ($validation->passed()) {
					try {
						$user->update(array(
							'usu_nombre' => Input::get('name'),
							'cat_id_FK' => Input::get('cat_id_FK')
							), $username);
					} catch (Exception $e) {
						die($e->getMessage());
					}
					Session::flash('users', "User was updated successfully!");
					Redirect::to('users/index');
				} else {
					$data['form_errors'] = $validation->errors(); 
				}
			}
			$this->view('users/update', $data);
		} else {
			Redirect::to('home/index');			
		}
	}

	public function delete($username) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal') && $username) {
			try {
				$user->delete($username);
			} catch (Exception $e) {
				die($e->getMessage());
			}
			Session::flash('users', "User was deleted successfully!");
			Redirect::to('users/index');
		}
		Redirect::to('home/index');
	}

	public function change_password($username) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal') && $username) {
			if (Input::exists()) {
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					'password_new' => array(
						'required' => true,
					),
					'password_new_again' => array(
						'required' => true,
						'matches' => 'password_new'
					),
				));
				if ($validation->passed()) {
					try {
						$user->update(array(
							'usu_password' => Input::get('password_new'),
							), $username);
					} catch (Exception $e) {
						die($e->getMessage());
				}
				Session::flash('users', "Password for user ". $username ." was updated successfully!");
				Redirect::to('users/index');
			} else {
				$data['form_errors'] = $validation->errors(); 
			}
		}
		$data['user'] = $username;
		$this->view('users/change_password', $data); 
	} else {
			Redirect::to('home/index');
		}
	}

	public function assign_to_system() {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal')) {
				if (Input::exists()) {
					$assigned = $this->model('Assigned');
					if (!$assigned->exists(Input::get('selected_user'), Input::get('selected_system'))) {

						try {
							$assigned->create(array(
								'usu_id_PK' => Input::get('selected_user'),
								'sis_id_PK' => Input::get('selected_system'),
								));
						} catch (Exception $e) {
							die($e->getMessage());
						}
						Session::flash('users', "User was assigned to the system successfully!");
						Redirect::to('users/index');
					} else {
						Session::flash('users_warning', "User has already been assigned to the system!");
						Redirect::to('users/index');
					}
				}
			$data = ['users' => DB::getInstance()->get('usuario')->results(),
					 'systems' => DB::getInstance()->get('sistema')->results()];
			$this->view('users/assign_to_system', $data); 
		} else {
				Redirect::to('home/index');
		}
	}

	public function remove_from_system($username) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal')) {
				$selected_user = new User($username);
				if (Input::exists()) {
					$assigned = $this->model('Assigned');
					if ($assigned->exists($selected_user->data()->usu_id_PK, Input::get('selected_system'))) {
						try {
							$assigned->delete($selected_user->data()->usu_id_PK, Input::get('selected_system'));
						} catch (Exception $e) {
							die($e->getMessage());
						}
						Session::flash('users', "Unassigned the user from the system successfully!");
						Redirect::to('users/index');
					} else {
						Session::flash('users_warning', "User has not been assigned to this system.");
						Redirect::to('users/index');
					}
				}
			$data = ['user' => $selected_user->data()];
			$assigned_systems_ids = DB::getInstance()->get('asignado', array('usu_id_PK', '=', $data['user']->usu_id_PK));
			$assigned_systems = [];
			foreach ($assigned_systems_ids->results() as $key => $value) {
				$assigned_systems[] = DB::getInstance()->get('sistema', array('sis_id_PK', '=', $value->sis_id_PK))->first();
			}
			$data['systems'] = $assigned_systems;
			$this->view('users/remove_from_system', $data); 
		} else {
				Redirect::to('home/index');
		}
	}
}
?>