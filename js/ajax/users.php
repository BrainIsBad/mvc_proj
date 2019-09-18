<?php

include 'ajax_config.php';

	try {
		$db = new Data_base();
	}
	catch(Exception $e) {
		echo 'Failed';
		die;
	}
	session_start();
	$name = $_SESSION['user']['name'];
	$surname = $_SESSION['user']['surname'];
	$stmt = $db->query('SELECT * FROM users WHERE name <> ? AND surname <> ?', array($name, $surname));
	echo json_encode($stmt);
