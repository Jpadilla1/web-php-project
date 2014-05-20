<?php 

class Systems extends Controller {
	
	public function index() {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal')) {
			$data = ['systems' => DB::getInstance()->get('sistema')->results()];
			$this->view('systems/index', $data);
		} else {
			Redirect::to('home/index');
		}
	}

	public function create() {
		$user = new User();
		$data = [];
		if ($user->isLoggedIn() && !$user->hasPermission('normal')) {
			if (Input::exists()) {
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					'sis_id_PK' => array(
						'required' => true,
						'max' => 4,
						'unique' => 'sistema'
					),
					'title' => array(
						'required' => true,
						'max' => 20,
						'min' => 3,
					),
					'description' => array(
						'required' => true,
						'min' => 3,
						'max' => 60
					)
				));

				if ($validation->passed()) {
					$system = $this->model('System');
					try {
						$system->create(array(
							'sis_id_PK' => Input::get('sis_id_PK'),
							'sis_titulo' => Input::get('title'),
							'sis_descripcion' => Input::get('description')
							));
						Session::flash('systems', "System was created successfully!");
					} catch (Exception $e) {
						die($e->getMessage());
					}
					Redirect::to('systems/index');
				} else {
					$data['form_errors'] = $validation->errors(); 
				}
			}

			$this->view('systems/create', $data);
		} else {
			Redirect::to('home/index');			
		}
	}

	public function update($id) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal') && $id) {
			$data = ['system' => DB::getInstance()->get('sistema', array('sis_id_PK', '=', $id))->first()];
			if (Input::exists()) {
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					'title' => array(
						'required' => true,
						'min' => 3,
						'max' => 20
					),
					'description' => array(
						'required' => true,
						'min' => 3,
						'max' => 30
					),
				));
				if ($validation->passed()) {
					$system = $this->model('System');
					try {
						$system->update(array(
							'sis_titulo' => Input::get('title'),
							'sis_descripcion' => Input::get('description'),
							), $id);
					} catch (Exception $e) {
						die($e->getMessage());
					}
					Session::flash('systems', "System was updated successfully!");
					Redirect::to('systems/index');
				} else {
					$data['form_errors'] = $validation->errors(); 
				}
			}
			$this->view('systems/update', $data);
		} else {
			Redirect::to('home/index');			
		}
	}

	public function delete($id) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal') && $id) {
			$system = $this->model('System');
			if ($system->find($id)) {
				if (Input::exists()) {
					try {
						$assigned = $this->model('Assigned');
						$assigned->delete_all_with_system($id);
						$system->delete($id);
					} catch (Exception $e) {
						die($e->getMessage());
					}
					Session::flash('systems', "System was deleted successfully!");
					Redirect::to('systems/index');
				} else {
					$assigned_users = DB::getInstance()->get('asignado', array('sis_id_PK', '=', $id));
					$this->view('systems/delete', ['assigned_users' => $assigned_users->results(), 'system' => $system->data()]);
				}
			}
		} else {
			Redirect::to('home/index');
		}
	}
}
?>