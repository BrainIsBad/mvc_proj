<?php

	class Router
	{
		static function start()
		{
			$controller_name = 'Main';
			$action_name = 'index';

			$URI = explode('?', $_SERVER['REQUEST_URI']);

			$routes = explode('/', trim($URI[0], '/'));

			if (!empty($routes[0])) {
				$controller_name = $routes[0];
			}
			if (!empty($routes[1])) {
				$action_name = $routes[1];
			}

			$model_name = 'Model_' . $controller_name;
			$controller_name = 'Controller_' . $controller_name;

			$model_file = strtolower($model_name) . '.php';
			$model_path = 'application/models/' . $model_file;
			
			$controller_file = strtolower($controller_name) . '.php';
			$controller_path = 'application/controllers/' . $controller_file;

			if (file_exists($controller_path)) {
				include $controller_path;
			}
			else {
				Router::error_404();
			}
			if (file_exists($model_path)) {
				include $model_path;
			}
			$controller = new $controller_name();
			$action = 'action_' . $action_name;

			if (method_exists($controller, $action)) {
				$controller->$action();
			}
			else {
				Router::error_404();
			}

		}

		static function error_404()
		{
			header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			die('<h1>Error 404</h1>');
		}
	}
