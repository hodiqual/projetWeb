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
	
}

?>
