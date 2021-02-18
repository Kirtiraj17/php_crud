<?php

	include 'init.php';

// print_r($_POST);

	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];

	// update query
	$functions->query("UPDATE users SET fname = ?, lname = ?, email = ? WHERE id = ?", [$fname, $lname, $email, $id]);
	header("Location: home.php");

?>