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

class CreationBdd {
	public static function main() {
		$con = mysqli_connect("127.0.0.1","shippable","","test");
		$sql = "CREATE USER 'iessa'@'localhost' IDENTIFIED BY 'iessa';GRANT ALL PRIVILEGES ON *.* TO 'iessa'@'localhost'
		IDENTIFIED BY 'iessa' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0
		MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `iessa\_%`.* TO 'iessa'@'localhost';";
    		mysqli_query($con, $sql);
    		$sql = file_get_contents("bdd/creation_bdd_clasNsurf.sql");
    		$array = explode(";\n", $sql);
    		$b = true;
    		for ($i=0 ; $i < count($array) ; $i++) {
        	$str = $array[$i];
        	if ($str != '') {
             	$str .= ';';
             	$b &= mysqli_query($con, $str);  
	 	}  
    	}
    return $b;
   }
}

?>
