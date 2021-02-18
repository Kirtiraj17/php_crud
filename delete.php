<?php

	include 'init.php';

	$id = $_REQUEST['id'];

	// delete query
	$functions->query("DELETE FROM users WHERE id = ?", [$id]);

?>