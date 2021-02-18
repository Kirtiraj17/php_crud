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
	public $email;
	public $fname_error='';
	public $lname_error='';
	public $email_error='';

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

	// validate email
	public function validateEmail($email) {

		$this->email = $this->test_input($email);

		if(empty($this->email)) {
			$this->email_error = "Email is required!";
		} else {
			//check for valid email
			if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				$this->email_error = "Invalid Email!"; 
			}

			$functions = new Functions();

			//check if email already exists
		    if($functions->query("SELECT * FROM users WHERE email = ?", [$this->email])) {
		    	if($functions->countRows() > 0) {
		    		$this->email_error = "Sorry Email already exist!";
		      	}
		    }
		}
	}


}