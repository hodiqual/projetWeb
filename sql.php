<?php
class SQL {
  public static function main() {
    $con = mysqli_connect("127.0.0.1","shippable","","test");
    $q = "DROP TABLE IF EXISTS things";
    mysqli_query($con, $q);
    $q = "CREATE TABLE things (name VARCHAR(20))";
    mysqli_query($con, $q);
    $q = "INSERT INTO things (name) VALUES ('Dre')";
    mysqli_query($con, $q);
    $q = "SELECT * FROM things";
    return mysqli_query($con, $q);
  }
}

class SqlGestionBdd {
	public static function main() {
		$con = mysqli_connect("127.0.0.1","shippable","","test");
    	$sql = file_get_contents("creation_bdd_clasNsurf.sql");
    	$array = explode(";\n", $sql);
    	$b = true;
    	for ($i=0 ; $i < count($array) ; $i++) {
        $str = $array[$i];
        if ($str != '') {
             $str .= ';';
             $b &= mysql_query($con, $str);  
        }  
    	}
    return $b;
   }
}

?>
