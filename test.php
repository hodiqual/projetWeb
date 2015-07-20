<?php
require_once("sql.php");

class SQLTest extends PHPUnit_Framework_TestCase {
  public function testSQL() {
    $sql = new SQL();
    $doc = $sql->main();
    $this->assertNotEquals($doc, false);
  }
}

/*class SpotTest extends PHPUnit_Framework_TestCase {
	public function testGetAllSpots() {
		$spotsManager = new SpotsManager(NULL);
		
		$spotsList = $spotsManager->getAll();
		$this->assertEquals(8, count($spotsList));
	}
}*/

class TestGestionBdd extends PHPUnit_Framework_TestCase {
	public function testGestionBdd() {
		$sqlGestionBdd = new SqlGestionBdd();
		$doc = $sqlGestionBdd->main();
		$this->assertNotEquals($gestionBdd, false);
	}
}

?>
