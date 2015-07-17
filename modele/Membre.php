<?php
class Membre {
	
	private $_noMem;
	private $_nom;
	private $_prenom;
	private $_avatar;
	private $_email;
	private $_mdp;
	private $_listeVehicules;
	
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
	
	public function noMem() { return $this->_noMem; }	
	public function nom() { return $this->_nom; }	
	public function prenom() { return $this->_prenom ; }
	public function avatar() { return $this->_avatar ; }
	public function email() { return $this->_email ; }
	public function mdp() { return $this->_mdp ; }
	public function listeVehicules() { return $this->_listeVehicules ; }
	
	public function setNoMem( $noMem )
	{
		$noMem = (int) $noMem;
		
		if (is_int($noMem) && $noMem>= 0)
		{
			$this->_noMem = $noMem;
		}
	}
	
	public function setNom($nom)
	{
		if (is_string($nom))
		{
			$this->_nom = $nom;
		}
	}
	
	public function setPrenom($prenom)
	{
		if (is_string($prenom))
		{
			$this->_prenom = $prenom;
		}
	}
	
	public function setAvatar($avatar)
	{
		if (is_string($avatar))
		{
			$this->_avatar = $avatar;
		}
	}
	
	public function setEmail($email)
	{
		if (is_string($email))
		{
			$this->_email = $email;
		}
	}
	
	public function setMdp($mdp)
	{
		if (is_string($mdp))
		{
			$this->_mdp = $mdp;
		}
	}

	public function setListeVehicules( $listeVehicules )
	{
		if (is_array($listeVehicules)) {
			$this->_listeVehicules = $listeVehicules;
		}
	}
}

require_once 'Manager.php';
require_once 'Vehicule.php';

class MembresManager extends ManagerDB {
	
	function authentifier($email,$mdp) {
		$dbh = $this->_db;
		$sql = "SELECT * FROM Membre WHERE email = :email AND mdp = :mdp;";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(":email", $email, PDO::PARAM_STR);
		$sth->bindParam(":mdp", $mdp, PDO::PARAM_STR);
		$bool = $sth->execute();
		if ($result = $sth->fetch(PDO::FETCH_ASSOC)) // on charge les paramètres de l'utilisateur
		{	
			return new Membre($result);
		}
	}
	
	function chargerVehicule(Membre $membre) {
		$dbh = $this->_db;
		$sql = "SELECT V.* FROM Possede AS P, Vehicule AS V  WHERE noMem = :noMem AND P.noVeh = V.noVeh;";
		$sth = $dbh->prepare($sql);
		$sth->bindParam(":noMem", $membre->noMem(), PDO::PARAM_STR);
		$bool = $sth->execute();
		$listeVeh = array();
		if ($result = $sth->fetch(PDO::FETCH_ASSOC)) // on charge les paramètres de l'utilisateur
		{	
			$listeVeh[] = new Vehicule($result);
		}
		$membre->setListeVehicules($listeVeh);
	}
}

?>