<?php 
	session_start();
	session_destroy();

	setcookie('email', '', time()-86400);
	setcookie('pass', '', time()-86400);
	
	header("Location: login.php");

?>