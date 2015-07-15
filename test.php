<?php
require_once("sql.php");
require_once("modele/spot.php");
class SQLTest extends PHPUnit_Framework_TestCase {
  public function testSQL() {
    $sql = new SQL();
    $doc = $sql->main();
    $this->assertNotEquals($doc, false);
  }
}


class SpotTest extends PHPUnit_Framework_TestCase {
	public function testGetAll() {
		$spotsManager = new SpotsManager(NULL);
		
		$spotsList = $spotsManager->getAll();
		$this->assertEquals(9, count($spotsList));
	}
}
?>
