<?php

	define('HOST', 'localhost');
	define('DB_NAME', 'test_db');
	define('DB_USER', 'root');
	define('DB_PASS', '123');
	define('DB_OPT', array(
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false
	));
