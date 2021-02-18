<?php

include_once "Functions.php";

class Validator
{

	public function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public $first_name;
	public $last_name;

	// validate first name
	public function validateFirstName($first_name) {

		$this->first_name = $this->test_input($first_name);

		if(empty($this->first_name)) {
			$this->fname_error = "First name is required!";
		} else {
			//check for letters and spaces
			if(!preg_match("/^[a-zA-Z-' ]*$/", $this->first_name)) {
				$this->fname_error = "Invalid First name!";
			}
		}
	}

	// validate last name
	public function validateLastName($last_name) {

		$this->last_name = $this->test_input($last_name);

		if(empty($this->last_name)) {
			$this->lname_error = "Last name is required!";
		} else {
			//check for letters and spaces
			if(!preg_match("/^[a-zA-Z-' ]*$/", $this->last_name)) {
				$this->lname_error = "Invalid Last name!";
			}
		}
	}


}