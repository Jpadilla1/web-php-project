<?php 

class System {

	private $_db,
			$_data;

	public function __construct($system = null) {
		$this->_db = DB::getInstance();
		if ($system) {
			$this->find($system);
		}
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('sistema', $fields)) {
			throw new Exception ('There was a problem creating a system.');
		}
	}

	public function update($fields = array(), $id) {
		if (!$this->_db->update('sistema', $id, 'sis_id_PK', $fields)) {
			throw new Exception ('There was a problem updating the system.');
		}
	}

	public function delete($id) {
		if (!$this->_db->delete('sistema', array('sis_id_PK', '=', $id))) {
			throw new Exception ('There was a problem deleting the system.');
		}
	}

	public function find($id = null) {
		if ($id) {
			$data = $this->_db->get('sistema', array('sis_id_PK', '=', $id));
			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function data() {
		return $this->_data;
	}

}

?>