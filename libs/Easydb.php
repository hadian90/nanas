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
		$this -> db = $database;
	}

	function stmt($sql, $params = null) {

		if ($params == null) {
			$params = array(':id' => '');
		}

		$stmt = $this -> db -> prepare($sql);

		$stmt -> execute($params);

		return $stmt -> fetchAll(PDO::FETCH_ASSOC);
	}

	function lastinsertedid() {
		return $this -> db -> lastInsertId();
	}

	//future function -------------------------------------------------------

	function delete($tableName, $rules = NULL, $params = NULL) {

		$sql = 'DELETE FROM ' . $tableName;
		if ($rules != NULL) {
			$sql .= ' WHERE ' . $rules;
		}

		return $this -> stmt($sql, $params);
	}

	function select($tableName, $columns = NULL, $rules = NULL, $params = NULL) {

		if ($columns == NULL) {
			$sql = 'SELECT *';
		} else {
			$sql = 'SELECT ';
			$i = 0;
			foreach ($columns as $column) {
				if ($i > 0) {
					$sql .= ', ';
				}
				$sql .= $column;
				$i++;
			}
		}

		$sql .= ' FROM ' . $tableName;

		if ($rules != NULL) {
			$sql .= ' WHERE ' . $rules;
		}
		
		// echo $sql;

		return $this -> stmt($sql, $params);
	}

	//future function -------------------------------------------------------
}

/******************************************************************************
 * End of Easydb.php
 ******************************************************************************/
?>