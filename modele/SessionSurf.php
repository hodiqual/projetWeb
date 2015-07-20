<?php
require_once 'spot.php';

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
	private $_nbrPlanchesBooked;
	
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
	public function nbrPlanchesBooked() { return $this->_nbrPlanchesBooked; }
	
	public function setNoSes( $noSes )
	{
		$noSes = (int) $noSes;
		
		if (is_int($noSes) && $noSes>= 0)
		{
			$this->_noSes = $noSes;
		}
	}
	
	public function setNbrPlanchesBooked( $nbrPlanchesBooked )
	{
		$nbrPlanchesBooked = (int) $nbrPlanchesBooked;
	
		if (is_int($nbrPlanchesBooked) && $nbrPlanchesBooked>= 0)
		{
			$this->_nbrPlanchesBooked = $nbrPlanchesBooked;
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
	
	function loadComplet($noSes) {
		$sessionSurf = $this->load($noSes);
		if ($sessionSurf) {
			$this->chargerParticipants($sessionSurf);
			$this->chargerListeVehSessionSurf($sessionSurf);
		}
		
		return $sessionSurf;
	}
	
	function load($noSes) {
		$dbh = $this->_db;
		$sql = "SELECT SS.*, S.*, M.* FROM SessionSurf AS SS, Spot AS S, Propose AS P, Membre AS M WHERE SS.noSes = :noSes AND SS.nomSpot = S.nomSpot AND SS.noSes = P.noSes AND P.noMem = M.noMem;";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(":noSes", $noSes, PDO::PARAM_STR);
		$bool = $sth->execute();

		if ($result = $sth->fetch(PDO::FETCH_ASSOC)) 
		{
			$sessionSurf = new SessionSurf($result);
			$spot = new Spot($result);
			$sessionSurf->setSpot($spot);
			$membre = new Membre($result);
			$sessionSurf->setOrganisateur($membre);
			return $sessionSurf;
		}else 
			echo "DEBUG SessionSurf.php result NOK";
	}
	
	function chargerParticipants(SessionSurf $sessionSurf) {
		require_once 'Membre.php';
		$dbh = $this->_db;
		$sql = "SELECT M.* FROM Participe AS P, Membre AS M  WHERE P.noSes = :noSes AND P.noMem = M.noMem;";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(":noSes", $sessionSurf->noSes(), PDO::PARAM_STR);
		$bool = $sth->execute();
		$listeMembre = array();
		if ($result = $sth->fetch(PDO::FETCH_ASSOC)) // on charge les paramètres de l'utilisateur
		{
			$listeMembre[] = new Membre($result);
		}
		
		$sessionSurf->setListeParticipants($listeMembre);
	}
	
	function chargerListeVehSessionSurf(SessionSurf $sessionSurf) {
		require_once 'VehiculeSessionSurf.php';
		$dbh = $this->_db;
		$sql = "SELECT V.*, VSS.* FROM VehiculeSessionSurf AS VSS, Vehicule AS V  WHERE VSS.noSes = :noSes AND VSS.noVeh = V.noVeh;";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(":noSes", $sessionSurf->noSes(), PDO::PARAM_STR);
		$bool = $sth->execute();
		$listeVehSessionSurf = array();
		if ($result = $sth->fetch(PDO::FETCH_ASSOC)) // on charge les paramètres de l'utilisateur
		{
			
			$veh = new Vehicule($result);
			$listeVehSessionSurf[] = new VehiculeSessionSurf($result);
		}
		
		$sessionSurf->setListeVehiculeSessionSurfs($listeVehSessionSurf);
	}
	
}
?>