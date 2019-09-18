<?php

	ini_set('display_errors', 1);

	require_once 'application/core/config.php';
	require_once 'application/core/router.php';
	require_once 'application/core/controller.php';
	require_once 'application/core/model.php';
	require_once 'application/core/view.php';
	require_once 'application/core/db.php';

	Router::start();
