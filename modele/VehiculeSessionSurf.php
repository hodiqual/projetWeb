<?php
class VehiculeSessionSurf {	
	
	private $_vehicule;
	private $_nbrPlacesDispo;
	private $_nbrPlanchesDispo;
	
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
	
	public function vehicule() { return $this->_vehicule; }
	public function nbrPlacesDispo() { return $this->_nbrPlacesDispo; }
	public function nbrPlanchesDispo() { return $this->_nbrPlanchesDispo; }
	
	public function setVehicule( Vehicule $vehicule )
	{
		$this->_vehicule = $vehicule;
	}
	
	public function setNbrPlacesDispo( $nbrPlacesDispo )
	{
		$nbrPlacesDispo = (int) $nbrPlacesDispo;
		
		if (is_int($nbrPlacesDispo) && $nbrPlacesDispo>= 0)
		{
			$this->_nbrPlacesDispo = $nbrPlacesDispo;
		}
	}
	
	public function setNbrPlanchesDispo( $nbrPlanchesDispo )
	{
		$nbrPlanchesDispo = (int) $nbrPlanchesDispo;
		
		if (is_int($nbrPlanchesDispo) && $nbrPlanchesDispo>= 0)
		{
			$this->_nbrPlanchesDispo = $nbrPlanchesDispo;
		}
	}
}
?>