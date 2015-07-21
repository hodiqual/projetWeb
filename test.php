<?php
require_once("sql.php");

class CreationBddTest extends PHPUnit_Framework_TestCase {
	public function testCreationBdd() {
		$creationBdd = new CreationBdd();
		$doc = $creationBdd->main();
		$this->assertNotEquals($doc, false);
	}
	
	/**
     * @depends testCreationBdd
     */
	public function testSessionSurfsManager() {
		$sessionSurfsManager = new SessionSurfsManager(null);
		$doc = $sessionSurfsManager->getAll();
		$this->assertEquals(3, count($doc));
	}
	
}

?>
