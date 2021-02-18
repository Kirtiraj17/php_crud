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

	// count no. of fetched rows
	public function countRows() {
		return $this->query->rowCount();
	}

	// fetch all data from tables
	public function fetchAll() {
		return $this->query->fetchAll(PDO::FETCH_ASSOC);
	}

    // fetch single row from specific table
    public function single(){
        return $this->query->fetch(PDO::FETCH_OBJ);
    }

}