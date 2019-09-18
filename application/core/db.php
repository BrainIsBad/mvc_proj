<?php

	class Data_base
	{
		private $connection;

		function __construct()
		{
			$this->connection = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, DB_OPT);
		}
		public function query($query, $args = null, $func = 'fetchAll')
		{
			if ($args === null) {
				return $this->connection->query($query)->fetchAll();
			}
			elseif (!is_array($args)) {
				die('$args must be an array!');
			}
			else {
				$stmt = $this->connection->prepare($query);
				$stmt->execute($args);
				return $stmt->$func();
			}
		}
	}
