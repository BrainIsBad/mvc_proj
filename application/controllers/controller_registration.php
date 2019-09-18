<?php

	class Controller_Registration extends Controller
	{
		public function __construct()
		{
			$this->view = new View();
			$this->model = new Model_Registration();
		}
		public function action_index()
		{
			$data = array();
			if (isset($_GET['registration'])) {
				$data = $this->model->check_data($_GET);
			}
			$this->view->generate('registration_view.php', 'template_view.php', 'Registration', null, $data);
		}
	}
