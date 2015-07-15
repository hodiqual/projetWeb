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
	
	
	private $dieppeDataMock = array ('nomSpot' => 'Dieppe',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20550.94480663189!2d1.0834894999999998!3d49.92005045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e0a207670619f9%3A0xaea20a3d78418545!2sDieppe!5e0!3m2!1sfr!2sfr!4v1436979569652" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 1
								) ;
	
	/*private $siouvilleDataMock = array ('nomSpot' => 'Siouville',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10351.957742046245!2d-1.8303565500000003!3d49.560222499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480cec4db3fab077%3A0x72b1686bcb8dd123!2s50340+Siouville-Hague!5e0!3m2!1sfr!2sfr!4v1436980143468" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 2
								) ;
	
	private $laTorcheDataMock  = array ('nomSpot' => 'La Torche',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10712.521514064989!2d-4.353274000000001!3d47.837067499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48173acc8773429b%3A0x64ed67bf332b3077!2sPointe+de+la+Torche%2C+29120+Plomeur!5e0!3m2!1sfr!2sfr!4v1436980210903" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 3
								) ;
	
	private $laSauzaieDataMock  = array ('nomSpot' => 'La Sauzaie',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5478.4199847461805!2d-1.89084!3d46.642367449999966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480459cf0dbe5925%3A0xecb89b13d8daee73!2sLa+Sauzaie%2C+85470+Bretignolles-sur-Mer!5e0!3m2!1sfr!2sfr!4v1436984575333" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 4
								) ;
	
	private $seignosseDataMock  = array ('nomSpot' => 'Seignosse',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46147.89133021739!2d-1.3938345!3d43.70549455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd515a0dba9b1cf3%3A0x8f2b273d8e559e6b!2sSeignosse!5e0!3m2!1sfr!2sfr!4v1436984927701" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 6
								) ;
	
	private $angletDataMock  = array ('nomSpot' => 'Anglet',
 								'photoSpot' => 'TODO',
 								'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46314.005604354155!2d-1.519271!3d43.489288450000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51401cdc979735%3A0xbdbc5ff838b9ab48!2sAnglet!5e0!3m2!1sfr!2sfr!4v1436985004003" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
 								'idFSI' => 7
								) ;  */
	
	private $lacanauDataMock = array ('nomSpot' => 'Lacanau',
			'photoSpot' => 'TODO',
			'urlGoogleMap' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11284.48954965727!2d-1.1947349999999974!3d45.00213650000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4801ffc558a23645%3A0xc02b43d4e1f03569!2sLacanau+Oc%C3%A9an%2C+33680+Lacanau!5e0!3m2!1sfr!2sfr!4v1436976508811" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>',
			'idFSI' => 5 );
	
	public function getAll()
	{
		$spots[] = new Spot($lacanauDataMock);
		$spots[] = new Spot($dieppeDataMock);
		$spots[] = new Spot($dieppeDataMock);
		
		return $spots;
	}
}
?>