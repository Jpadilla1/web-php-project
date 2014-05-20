<?php 

class Categories extends Controller {
	
	public function index() {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal')) {
			$data = ['categories' => DB::getInstance()->get('categoria')->results()];
			$this->view('categories/index', $data);
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
					'cat_id_PK' => array(
						'required' => true,
						'max' => 4,
						'unique' => 'categoria'
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
					$category = $this->model('Category');
					try {
						$category->create(array(
							'cat_id_PK' => Input::get('cat_id_PK'),
							'cat_titulo' => Input::get('title'),
							'cat_descripcion' => Input::get('description')
							));
						Session::flash('categories', "Category was created successfully!");
					} catch (Exception $e) {
						die($e->getMessage());
					}
					Redirect::to('categories/index');
				} else {
					$data['form_errors'] = $validation->errors(); 
				}
			}

			$this->view('categories/create', $data);
		} else {
			Redirect::to('home/index');			
		}
	}

	public function update($id) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal') && $id) {
			$data = ['category' => DB::getInstance()->get('categoria', array('cat_id_PK', '=', $id))->first()];
			if (Input::exists()) {
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					'description' => array(
						'required' => true,
						'min' => 3,
						'max' => 60
					),
				));
				if ($validation->passed()) {
					$category = $this->model('Category');
					try {
						$category->update(array(
							'cat_descripcion' => Input::get('description'),
							), $id);
					} catch (Exception $e) {
						die($e->getMessage());
					}
					Session::flash('categories', "Category was updated successfully!");
					Redirect::to('categories/index');
				} else {
					$data['form_errors'] = $validation->errors(); 
				}
			}
			$this->view('categories/update', $data);
		} else {
			Redirect::to('home/index');			
		}
	}

	public function delete($id) {
		$user = new User();
		if ($user->isLoggedIn() && !$user->hasPermission('normal') && $id) {
			$category = $this->model('Category');
			try {
				$category->delete($id);
			} catch (Exception $e) {
				die($e->getMessage());
			}
			Session::flash('categories', "Category was deleted successfully!");
			Redirect::to('categories/index');
		}
		Redirect::to('home/index');
	}
}
?>