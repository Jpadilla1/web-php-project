<?php 

class Menu extends Controller {

	public function index() {
		$user = new User();
		$data = [];
		if ($user->isLoggedIn()) {
			$this->view('menu/index');
		} else {
			Redirect::to('home/index');
		}
	}

}

?>