<?php 

class Assigned {

	private $_db,
			$_data;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	public function exists($usu_id, $sis_id) {
		if ($this->_db->get('asignado', array('sis_id_PK', '=', $sis_id, 'usu_id_PK', '=', $usu_id))->count() > 0) {
			return true;
		}
		return false;
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('asignado', $fields)) {
			throw new Exception ('There was a problem assigning a system.');
		}
	}

	public function delete($usu_id, $sis_id) {
		if (!$this->_db->delete('asignado', array('sis_id_PK', '=', $sis_id, 'usu_id_PK', '=', $usu_id))) {
			throw new Exception ('There was a problem deleting the assigned user of the system.');
		}
	}

	public function delete_all_with_user($id) {
		if (!$this->_db->delete('asignado', array('usu_id_PK', '=', $id))) {
			throw new Exception ('There was a problem deleting the assigned user.');
		}	
	}

	public function delete_all_with_system($id) {
		if (!$this->_db->delete('asignado', array('sis_id_PK', '=', $id))) {
			throw new Exception ('There was a problem deleting the assigned user of the system.');
		}	
	}

	public function find($usu_id = null, $sis_id = null) {
		if ($usu_id && $sis_id) {
			$data = $this->_db->get('asignado', array('sis_id_PK', '=', $sis_id, 'usu_id_PK', '=', $usu_id));
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