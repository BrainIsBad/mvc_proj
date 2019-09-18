<?php

	class Controller_User extends Controller
	{
		public function __construct()
		{
			$this->model = new Model_User();
			$this->view = new View();
		}
		public function action_index()
		{
			session_start();
			$data = $this->model->get_data();
			$this->view->generate('user_view.php', 'template_view.php','User' , $data);
		}
	}
