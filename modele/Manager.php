<?php
/**
 * Super-Classe  pour gerer les acces a la base
 *
 */
class ManagerDB
{
	// Instance de PDO
	protected $_db;
	
	public function __construct($db) {
		setDb($db);
	}
	
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
?>