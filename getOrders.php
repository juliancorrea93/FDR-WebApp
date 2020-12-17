<?php

$dbhost = 'fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com';  // Most likely will not need to be changed
$dbname = 'jcorrea2016';   // Needs to be changed to your designated table database name
$dbuser = 'jcorrea2016';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'Path%med'; //to be changed to reflect your LAMP server credentials

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);

if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT * FROM orders WHERE status = 1";
//UPDATE orders SET status = 2 WHERE orders.id = 2;

if ($result = $mysqli->query($sql))
{
	// We have results, create an array to hold the results
    // and an array to hold the data
	$x = 0;
	while ($obj = $result->fetch_object()) {
		echo "<tr id = 'row".$x."'>";
		echo "<td id = 'contents".$x."'>" . $obj->contents . "&nbsp;</td>";
		echo "<td id = 'total".$x."'>" . $obj->total . "</td>";
		echo "<td id = 'id".$x."'>" . $obj->id . "</td>";
		echo "<td id = 'status".$x."'>" . $obj->status . "</td>";
		echo "<td id = 'button".$x."'><button class='btn' onclick=\"signalOrderReady(".$obj->id.")\" style='width: 300px;'>Change</button></td>";
		echo "</tr>";
		$x = $x + 1;
	}
}
else {
	echo "query failed";
}



?>