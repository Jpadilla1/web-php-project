<?php 

class Reports extends Controller {

	public function index() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/index');
		} else {
			Redirect::to('home/index');
		}
	}

	public function users($orderby = null) {
		$user = new User();
		if ($user->isLoggedIn()) {
			$data = [];
			$type = 'usu_id_PK';
			if ($orderby) {
				switch ($orderby) {
					case 'created date':
						$type = 'usu_fecha_creacion';
						break;
					case 'username':
						$type = 'usu_username';
						break;
					case 'name':
						$type = 'usu_nombre';
						break;				
				}

			}
			$data['orderby'] = $type;
			$this->view('reports/reports/users-PDF', $data);
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function users_excel() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/users-Excel');
		} else {
			Redirect::to('reports/index');
		}	
	}	

	public function user_systems() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/users-by-system-PDF');
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function user_systems_excel() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/users-by-system-Excel');
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function categories() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/categories-PDF');
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function categories_excel() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/categories-Excel');
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function systems() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/systems-PDF');
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function systems_excel() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/systems-Excel');
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function logs() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/logs-PDF');
		} else {
			Redirect::to('reports/index');
		}	
	}

	public function logs_excel() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('reports/reports/logs-Excel');
		} else {
			Redirect::to('reports/index');
		}	
	}

}

?>