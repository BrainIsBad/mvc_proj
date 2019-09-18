<?php

	class Model_User extends Model
	{
		public function get_data()
		{
			if (isset($_SESSION['user'])) {
				return $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'];
			}
			else {
				header('Location: /');
			}
		}
	}
