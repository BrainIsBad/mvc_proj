<?php

	class Controller_Exit extends Controller
	{
		public function action_index()
		{
			session_start();
			unset($_SESSION['user']);
			header('Location: /');
		}
	}
