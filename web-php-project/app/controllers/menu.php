<?php 

class Menu extends Controller {

	public function index() {
		$user = new User();
		if ($user->isLoggedIn()) {
			$this->view('menu/index');
		} else {
			Redirect::to('home/index');
		}
	}

}

?>