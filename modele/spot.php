<?php
/**
 * Classe qui gere les spots
 */
class Spot
{
	private $_nomSpot;
	private $_photoSpot;
	private $_urlGoogleMap;
	private $_idFSI;
	
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
	
	public function nomSpot() { return $this->$_nomSpot; }
	public function photoSpot() { return $this->$_photoSpot; }
	public function urlGoogleMap() { return $this->$_urlGoogleMap; }
	public function idFSI() { return $this->$_idFSI; }
	
	public function setNomSpot($nomSpot)
	{
		if (is_string($nomSpot))
		{
			$this->_nomSpot = $nomSpot;
		}
	}
	
	public function setPhotoSpot($photoSpot)
	{
		if (is_string($photoSpot))
		{
			$this->_photoSpot = $photoSpot;
		}
	}
	
	public function setUrlGoogleMap($urlGoogleMap)
	{
		if (is_string($urlGoogleMap))
		{
			$this->_urlGoogleMap = $urlGoogleMap;
		}
	}
	
	public function setIdFSI($idFSI)
	{
		$idFSI = (int) $idFSI;
		
		if (is_int($idFSI) && $idFSI>= 0)
		{
			$this->_idFSI = $idFSI;
		}
	}

}

include_once 'Manager.php';

/**
 * Instantie les classes Spot
 */
class SpotsManager extends ManagerDB
{
	private $lacanauDataMock = ['nomSpot' => 'Lacanau',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11284.48954965727!2d-1.1947349999999974!3d45.00213650000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4801ffc558a23645%3A0xc02b43d4e1f03569!2sLacanau+Oc%C3%A9an%2C+33680+Lacanau!5e0!3m2!1sfr!2sfr!4v1436976508811" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 5
								] ;
	
	private $dieppeDataMock = ['nomSpot' => 'Lacanau',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20550.94480663189!2d1.0834894999999998!3d49.92005045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e0a207670619f9%3A0xaea20a3d78418545!2sDieppe!5e0!3m2!1sfr!2sfr!4v1436979569652" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 1
								] ;
	
	public function getAll()
	{
		$spots = [];
		$spots[] = new Spot($lacanauDataMock);
		
		return $spots;
	}
}
?>