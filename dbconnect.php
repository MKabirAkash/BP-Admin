<?php
$dbhost = "localhost";
$dbname	= "bpadmin"; //change to be your own db name
$dbuser	= "root"; // change to use your own db user
$dbpass	= ""; // change to use your own database password

try{
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $err){
  echo "Database connection problem. ". $err->getMessage();
  exit();
}
?>
