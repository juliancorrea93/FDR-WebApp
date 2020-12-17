<?php

$dbhost = 'fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com';  // Most likely will not need to be changed
$dbname = 'jcorrea2016';   // Needs to be changed to your designated table database name
$dbuser = 'jcorrea2016';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'Path%med'; //to be changed to reflect your LAMP server credentials

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);

//find way to save values entered by user as PHP variables
$name = $_POST['app_4a']; 
$price = $_POST['app_4b'];
$id = 1;

$sql = "UPDATE menuitems SET menuitemname = 'Steak',price= 40.00 WHERE menuitemid = " . $id;
//sql statement for changing db row with values entered by user
$stmt = $mysqli->prepare($sql); 
$stmt->execute();
$stmt->store_result();

?>