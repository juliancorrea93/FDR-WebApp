<?php

$id = $_GET['id'];

$dbhost = 'fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com';  // Most likely will not need to be changed
$dbname = 'jcorrea2016';   // Needs to be changed to your designated table database name
$dbuser = 'jcorrea2016';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'Path%med'; //to be changed to reflect your LAMP server credentials

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);

if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "UPDATE orders SET status = 2 WHERE id = ".$id;
//UPDATE orders SET status = 2 WHERE orders.id = 2;

if ($result = $mysqli->query($sql))
{
	echo "2";
}
else {
	echo "1";
}



?>