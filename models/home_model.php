<?php

class home_model extends Model {

	//ni fared cube lg ni, tau?

	public $tableName = 'artifak';

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
	
	public function test(){
		
		$sql = 'SELECT item_name,item_id FROM '.$this->tableName.' WHERE item_gallery = :id';
		$params = array(':id' => 'A');
		
		return $this->easydb->stmt($sql,$params);
	}

}

?>