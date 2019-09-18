<?php

	include 'ajax_config.php';

	try {
		$db = new Data_base();
	}
	catch(Exception $e) {
		echo 'Failed';
		die;
	}
	$stmt = $db->query('SELECT * FROM criterias', array());
	echo json_encode($stmt);
