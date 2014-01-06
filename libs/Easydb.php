<?php

/******************************************************************************
* Filename    : Easydb.php
* Author      : Abdul Hadi - Wired In Studio
* Date        : 12-sep-2013
* Description : simplified PDO
******************************************************************************/

class Easydb {
	private $db;
	
	function __construct($database) {
		$this->db = $database;
	}
	
	function stmt($sql,$params = null){

		if ($params == null){
			$params = array(':id' => '');
		}

		$stmt = $this -> db ->prepare($sql);
    
		$stmt->execute($params);
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function lastinsertedid(){
		return $this -> db -> lastInsertId();
	}
	
	//future function -------------------------------------------------------
	
	function insert($tableName,$params){
		
		// $sql = 'SELECT item_name,item_id FROM '.$this->tableName.' WHERE item_gallery = :id';
		// $stmt = $this -> db ->prepare($sql);
		// $stmt->execute($params);

	}
	
	function update($tableName,$params){
		
		// $sql = 'SELECT item_name,item_id FROM '.$this->tableName.' WHERE item_gallery = :id';
		// $stmt = $this -> db ->prepare($sql);
		// $stmt->execute($params);

	}
	
	function delete($tableName,$params){
		
		// $sql = 'SELECT item_name,item_id FROM '.$this->tableName.' WHERE item_gallery = :id';
		// $stmt = $this -> db ->prepare($sql);
		// $stmt->execute($params);

	}
	
	function select($tableName,$data,$condition){
		
		// $sql = 'SELECT item_name,item_id FROM '.$this->tableName.' WHERE item_gallery = :id';
		// $stmt = $this -> db ->prepare($sql);
		// $stmt->execute($params);
		
		return $stmt->fetchAll();
	}
	
	//future function -------------------------------------------------------
}

/******************************************************************************
* End of Easydb.php
******************************************************************************/

?>