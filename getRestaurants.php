<?php


$dbhost = 'fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com';  // Most likely will not need to be changed
$dbname = 'jcorrea2016';   // Needs to be changed to your designated table database name
$dbuser = 'jcorrea2016';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'Path%med'; //to be changed to reflect your LAMP server credentials

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);

if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT r.rname FROM restaurants r";

if ($result = $mysqli->query($sql))
{
	// We have results, create an array to hold the results
    // and an array to hold the data

	$resultArray = array();
	$tempArray = array();
	 // Loop through each result
	while($row = $result->fetch_object())
	{
	 // Add each result into the results array
	$tempArray = $row;
		array_push($resultArray, $tempArray);
	}
	 
	// Encode the array to JSON and output the results
	echo json_encode($resultArray);
}
else {
	echo "query failed";
}



$mysqli->close();
?>