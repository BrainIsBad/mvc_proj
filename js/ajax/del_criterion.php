<?php

if (isset($_GET['id'])) {
	include 'ajax_config.php';

	try {
		$db = new Data_base();
	}
	catch(Exception $e) {
		echo 'Failed';
		die;
	}

	try {
		$stmt = $db->query('DELETE FROM criterias WHERE id = ?', array($_GET['id']));
		echo 'deleted';
	}
	catch(Exception $e) {
		echo 'failed';
		die;
	}
}
