<?php
/**
 * Super-Classe  pour gerer les acces a la base
 *
 */
class ManagerDB
{
	// Instance de PDO
	protected $_db;
	
	public function setDb($db)
	{
		$this->_db = $db;
	}
	
	public function __construct($db) {
		$this->_db = $db;
	}
}
?>