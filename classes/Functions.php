<?php

// inherits Db class
class Functions extends Db
{

	public $query;

	// executes all query for database
	public function query($sql, $param = []) {
		if(empty($param)) {
			// if we don't have parameters
			$this->query = $this->db->prepare($sql);
			return $this->query->execute();
		} else {
			// if we have parameters
			$this->query = $this->db->prepare($sql);
			return $this->query->execute($param);
		}
	}

}