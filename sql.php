<?php
class SQL {
  public static function main() {
    $con=mysqli_connect("127.0.0.1","shippable","","test");
    $q="DROP TABLE IF EXISTS things";
    mysqli_query($con, $q);
    $q="CREATE TABLE things (name varchar(20))";
    mysqli_query($con, $q);
    $q="INSERT INTO things(name) VALUES('Dre')";
    mysqli_query($con, $q);
    $q="SELECT * FROM things";
    return mysqli_query($con, $q);
  }
}
?>
