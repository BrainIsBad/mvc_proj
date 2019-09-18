<?php

class Model_Registration extends Model
{
	private $db;
	public function __construct()
	{
		$this->db = new Data_base();
	}
	public function check_data($data)
	{
		$errors = array();
		if (trim($data['name']) == '') {
			$errors[] = 'Error: enter name!';
		}
		if (trim($data['surname']) == '') {
			$errors[] = 'Error: enter surname!';
		}
		if (empty($errors)) {
			$stmt = $this->db->query('SELECT * FROM users WHERE name = ? AND surname = ?', array($data['name'], $data['surname']), 'rowCount');
			if ($stmt == 0) {
				$this->db->query('INSERT INTO users (name, surname) VALUES (?, ?)', array($data['name'], $data['surname']));
				session_start();
				$_SESSION['user'] = array(
					'name' => $data['name'],
					'surname' => $data['surname']
				);
				header('Location: /user');
			}
			else {
				return array('Error: user already exists');
			}
		}
		else{
			return $errors;
		}
	}
}