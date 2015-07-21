<?php
require_once("sql.php");
require_once("modele/SessionSurf.php");
require_once("modele/Membre.php");


class CreationBddTest extends PHPUnit_Framework_TestCase {
	public function testCreationBdd() {
		$creationBdd = new CreationBdd();
		$doc = $creationBdd->main();
		//$this->assertNotEquals(false, $doc);
	}
	
	/**
     * @depends testCreationBdd
     */
	/*public function testSessionSurfsManager() {
		$sessionSurfsManager = new SessionSurfsManager(null);
		$doc = $sessionSurfsManager->getAll();
		$this->assertEquals(3, count($doc));
	}*/
	
	/**
     * @depends testCreationBdd
     */
	public function testMembresManager() {
		$membresManager = new MembresManager(null);
		$membre = $membresManager->authentifier("thomasr@gmail.com", "iessa");
		$this->assertEquals("THOMAS", $membre->nom());
		$this->assertEquals("Raimana", $membre->prenom());
	}

	
	private $donneeNouvelleInscription  = array ( 'nom' => 'Wayne',
												  'prenom' => 'Bruce',
												  'email' => 'batman@wayne.enac',
												  'mdp' => 'toto') ;
	/**
	 * @depends testCreationBdd
	 */
	public function testNouvelleInscription() {
		$membre = new Membre($this->donneeNouvelleInscription);
		$membresManager = new MembresManager(null);
		$membresManager->sauvegarder($membre);
		$this->assertNotEquals(0, $membre->noMem());
		
		$membreReload = $membresManager->authentifier($donneeNouvelleInscription['email'], $donneeNouvelleInscription['toto']);
		$this->assertEquals($membreReload->noMem(), $membre->noMem());
		$this->assertEquals($membreReload->nom(), $membre->nom());
	
	}
	
	/**
	 * @depends testCreationBdd
	*/
	public function testMailDejaDansLaBase() {
		$membresManager = new MembresManager(null);
		$this->assertFalse($membresManager->checkEmailDispo("hodiqueta@gmail.com"));
	}
	
	/**
	 * @depends testCreationBdd
	 */
	public function testMembreChargerVehicule() {
		$membresManager = new MembresManager(null);
		$membre = $membresManager->authentifier("thomasr@gmail.com", "iessa");
		$membresManager->chargerVehicule($membre);
		$this->assertCount(1, $listeVehicules);
		$veh = $membre->listeVehicules()[0];
		$this->assertEquals("mercedes",$veh->marqueVeh());
	}
	
}

?>
