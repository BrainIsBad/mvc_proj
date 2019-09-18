<?php

 class Model_Main extends Model
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
 			if ($stmt > 0) {
 				return null;
 			}
 			else {
 				return array('Error: invalid name or surname');
 			}
 		}
 		else{
 			return $errors;
 		}
 	}
 }
