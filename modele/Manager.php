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
		require_once 'bdd/gestion_bdd.php';
		
		if(is_null($db))
			$this->_db = connectDb();
		else
			$this->_db = $db;
	}
}
?>