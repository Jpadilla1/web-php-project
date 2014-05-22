<?php 

class Log {

	private $_db,
			$_data;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('vitacora', $fields)) {
			throw new Exception ('There was a problem logging the action.');
		}
	}

	public function delete($id) {
		if (!$this->_db->delete('vitacora', array('usu_id_PK_FK', '=', $id))) {
			throw new Exception ('There was a problem deleting the Log for the user with id '. $id .'.');
		}
	}

	public function find($id = null) {
		if ($id) {
			$data = $this->_db->get('vitacora', array('usu_id_PK_FK', '=', $id));
			if ($data->count()) {
				$this->_data = $data;
				return true;
			}
		}
		return false;
	}

	public function data() {
		return $this->_data->results();
	}

}

?>