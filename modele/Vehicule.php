<?php
class Vehicule {
	
	private $_noVeh;
	private $_nbrPlaces;
	private $_nbrPlanches;
	private $_marqueVeh;
	private $_modeleVeh;
	private $_couleurVeh;
	private $_photoVeh;
	
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
	  foreach ($donnees as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);
	        
	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
	  }
	}
	
	public function noVeh() { return $this->_noVeh; }
	public function nbrPlaces() { return $this->_nbrPlaces; }
	public function nbrPlanches() { return $this->_nbrPlanches; }
	public function marqueVeh() { return $this->_marqueVeh; }
	public function modeleVeh() { return $this->_modeleVeh; }
	public function couleurVeh() { return $this->_couleurVeh; }
	public function photoVeh() { return $this->_photoVeh; }
	
	public function setNoVeh( $noVeh )
	{
		$noVeh = (int) $noVeh;
		
		if (is_int($noVeh) && $noVeh>= 0)
		{
			$this->_noVeh = $noVeh;
		}
	}
	
	public function setNbrPlaces( $nbrPlaces )
	{
		$nbrPlaces = (int) $nbrPlaces;
		
		if (is_int($nbrPlaces) && $nbrPlaces>= 0)
		{
			$this->_nbrPlaces = $nbrPlaces;
		}
	}
	
	public function setNbrPlanches( $nbrPlanches )
	{
		$nbrPlanches = (int) $nbrPlanches;
		
		if (is_int($nbrPlanches) && $nbrPlanches>= 0)
		{
			$this->_nbrPlanches = $nbrPlanches;
		}
	}
	
	public function setMarqueVeh($marqueVeh)
	{
		if (is_string($marqueVeh))
		{
			$this->_marqueVeh = $marqueVeh;
		}
	}
	
	public function setModeleVeh($modeleVeh)
	{
		if (is_string($modeleVeh))
		{
			$this->_modeleVeh = $modeleVeh;
		}
	}
	
	public function setCouleurVeh($couleurVeh)
	{
		if (is_string($couleurVeh))
		{
			$this->_couleurVeh = $couleurVeh;
		}
	}
	
	public function setPhotoVeh($photoVeh)
	{
		if (is_string($photoVeh))
		{
			$this->_photoVeh = $photoVeh;
		}
	}
	
}

class VehiculesManager extends ManagerDB {
	function sauvegarder(Vehicule $vehicule, $noMem) {
		$dbh = $this->_db;

		$sql = "INSERT INTO Vehicule (marqueVeh, modeleVeh, couleurVeh, nbrPlaces, nbrPlanches) VALUES  (:marqueVeh, :modeleVeh, :couleurVeh, :nbrPlaces, :nbrPlanches);";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(":marqueVeh", $vehicule->marqueVeh(), PDO::PARAM_STR);
		$sth->bindParam(":modeleVeh",$vehicule->modeleVeh(), PDO::PARAM_STR);
		$sth->bindParam(":couleurVeh", $vehicule->couleurVeh(), PDO::PARAM_STR);
		$sth->bindParam(":nbrPlaces",$vehicule->nbrPlaces(), PDO::PARAM_INT);
		$sth->bindParam(":nbrPlanches",$vehicule->nbrPlanches(), PDO::PARAM_INT);
		if ($sth->execute() == 0) {
			print($dbh->errorInfo()); 	// affiche message d'érreur de la bdd
		}
		else {
			$noVeh = $dbh->lastInsertId();
			$vehicule->setNoVeh($noVeh);
			
			$sql = "INSERT INTO Possede (noVeh, noMem) VALUES  (:noVeh, :noMem);";
			$sth = $dbh->prepare($sql);
			$sth->bindParam(":noVeh", $noVeh, PDO::PARAM_INT);
			$sth->bindParam(":noMem", $noMem, PDO::PARAM_INT);
			if ($sth->execute() == 0) {
				print($dbh->errorInfo()); 	// affiche message d'érreur de la bdd
			}
		}
		
	}
}
?>