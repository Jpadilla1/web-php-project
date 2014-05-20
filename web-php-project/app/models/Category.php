<?php 

class Category {

	private $_db,
			$_data;

	public function __construct($category = null) {
		$this->_db = DB::getInstance();
		if ($category) {
			$this->find($category);
		}
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('categoria', $fields)) {
			throw new Exception ('There was a problem creating a category.');
		}
	}

	public function update($fields = array(), $id) {
		if (!$this->_db->update('categoria', $id, 'cat_id_PK', $fields)) {
			throw new Exception ('There was a problem updating the category.');
		}
	}

	public function delete($id) {
		if (!$this->_db->delete('categoria', array('cat_id_PK', '=', $id))) {
			throw new Exception ('There was a problem deleting the category.');
		}
	}

	public function find($id = null) {
		if ($id) {
			$data = $this->_db->get('categoria', array('cat_id_PK', '=', $id));
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