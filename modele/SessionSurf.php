<?php
class SessionSurf
{
	private $_noSes;
	private $_dateAller;
	private $_dateRetour;
	private $_heureDep;
	private $_lieuDep;
	private $_spot;
	private $_organisateur;
	private $_listeParticipants;
	private $_listeVehiculeSessionSurfs;
	
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
	
	public function noSes() { return $this->_noSes; }
	public function dateAller() { return $this->_dateAller; }
	public function dateRetour() { return $this->_dateRetour; }
	public function heureDep() { return $this->_heureDep; }
	public function lieuDep() { return $this->_lieuDep; }
	public function spot() { return $this->_spot; }
	public function organisateur()  { return $this->_organisateur; }
	public function listeParticipants()  { return $this->_listeParticipants; }
	public function listeVehiculeSessionSurfs()  { return $this->listeVehiculeSessionSurfs; }
	
	public function setNoSes( $noSes )
	{
		$noSes = (int) $noSes;
		
		if (is_int($noSes) && $noSes>= 0)
		{
			$this->_noSes = $noSes;
		}
	}
	
	public function setDateAller( $dateAller )
	{
		$this->_dateAller = $dateAller;
	}
	
	public function setDateRetour( $dateRetour )
	{
		$this->_dateRetour = $dateRetour;
	}
	
	public function setHeureDep( $heureDepart )
	{
		$this->_heureDep = $heureDepart;
	}
	
	public function setSpot( Spot $spot )
	{
		$this->_spot = $spot;
	}
	
	public function setOrganisateur( Membre $membre )
	{
		$this->_organisateur = $membre;
	}
	
	public function setListeParticipants( $listeParticipants )
	{
		if (is_array($listeParticipants)) {
			$this->_listeParticipants = $listeParticipants;
		}
	}
	
	public function setListeVehiculeSessionSurfs( $listeVehiculeSessionSurfs )
	{
		if (is_array($listeVehiculeSessionSurfs)) {
			$this->_listeVehiculeSessionSurfs = $listeVehiculeSessionSurfs;
		}
	}
}

class SessionSurfsManager extends ManagerDB {
	function getAll() {
		;
	}
}
?>