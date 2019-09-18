<?php

	class Controller_Main extends Controller
	{
		public function __construct()
		{
			$this->model = new Model_Main();
			$this->view = new View();
		}

		public function action_index()
		{
			if (isset($_GET['reg'])) {
				header('Location: /registration');
				exit;
			}
			$view = 'auth_';
			$data = array();
			if (isset($_GET['enter'])) {
				$data = $this->model->check_data($_GET);
			}
			if ($data === null) {
				session_start();
				$_SESSION['user'] = array(
					'name' => $_GET['name'],
					'surname' => $_GET['surname']
				);
				header('Location: /user');
				exit;
			}
			$this->view->generate('main_view.php', 'template_view.php', 'Main', null, $data);
		}
	}
