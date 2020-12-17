<?php
$contents  = $_GET['contents'];
$total = $_GET['total'];
$email = $_GET['email'];

$dbhost = 'fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com';  // Most likely will not need to be changed
$dbname = 'jcorrea2016';   // Needs to be changed to your designated table database name
$dbuser = 'jcorrea2016';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'Path%med'; //to be changed to reflect your LAMP server credentials

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);

if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "INSERT INTO orders (contents, total, status, email) VALUES (\"".$contents."\",".$total.",1,\"".$email."\")";

if ($result = $mysqli->query($sql))
{
	echo "200";
}
else {
	echo "400";
}



$mysqli->close();
?>