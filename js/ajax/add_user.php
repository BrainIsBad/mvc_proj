<?php

	if (isset($_GET['name']) && isset($_GET['surname'])) {
	include 'ajax_config.php';

	try {
		$db = new Data_base();
	}
	catch(Exception $e) {
		echo 'Failed';
		die;
	}

	try {
		$stmt = $db->query('INSERT INTO users (name, surname) VALUES (?, ?)', array($_GET['name'], $_GET['surname']));
		echo 'User added';
	}
	catch(PDOException $e) {
		echo 'User already exists';
		die;
	}
}
