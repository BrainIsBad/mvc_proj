<?php

	if (isset($_GET['user'])) {
		foreach ($_GET as $val) {
			if(trim($val) == '') {
				$val = 0;
			}
		}
		session_start();
		$user = $_SESSION['user']['name'] . '_' . $_SESSION['user']['surname'];
		$data = array($_GET['user'] => array($_GET['marks']));
		if (!file_exists('../../json/' . $user . '.json')) {
			file_put_contents('../../json/' . $user . '.json', json_encode($data));
		}
		else {
			$json = json_decode(file_get_contents('../../json/' . $user . '.json'), true);
			$json[$_GET['user']][] = $_GET['marks'];
			file_put_contents('../../json/' . $user . '.json', json_encode($json));
			//echo 'Rated!';
			print_r($json);
		}

	}
