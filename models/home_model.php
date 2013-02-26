<?php

class home_model extends Model {

	//ni fared buat

	public $tableName = 'users';

	function __construct() {
		parent::__construct();
	}

	public function login($username,$password) {

		// Put parameters into local variables
		$result = FALSE;
		$counter = 0;
		
		// sql statement with binding paramenter
		$sql = 'SELECT id FROM '.$this->tableName.' WHERE username = ? AND password = ?';
		$stmt = $this -> db -> prepare($sql);
		$stmt -> bind_param('ss',$username,$password);
		$stmt -> execute();

		// fetch the sql result
		while ($stmt -> fetch()) {
			$counter++;
		}
		
		if ($counter != 0){
			$result = TRUE;
		}

		// close connection
		$stmt -> close();

		//resturn result
		return $result;
	}

}

?>