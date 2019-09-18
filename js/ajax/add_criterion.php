<?php

	if (isset($_GET['criterion'])) {
	include 'ajax_config.php';

	try {
		$db = new Data_base();
	}
	catch(Exception $e) {
		echo 'Failed';
		die;
	}

	try {
		$stmt = $db->query('INSERT INTO criterias (criterion) VALUES (?)', array($_GET['criterion']));
		echo 'Criterion added';
	}
	catch(PDOException $e) {
		echo 'Criterion already exists';
		die;
	}
}
