<?php

$dbhost = 'fdr-ed2.cngbtgbz9a2v.us-east-2.rds.amazonaws.com';  // Most likely will not need to be changed
$dbname = 'jcorrea2016';   // Needs to be changed to your designated table database name
$dbuser = 'jcorrea2016';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'Path%med'; //to be changed to reflect your LAMP server credentials

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);

if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT mi.menuitemid, mi.menuitemname, mi.price FROM menuitems mi INNER JOIN menus m ON mi.menuid = m.menuid WHERE m.rid = 1";

$stmt = $mysqli->prepare($sql);
//$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($menuitemid, $menuitemname, $price);
$stmt->fetch();
$stmt->close();

include 'FDR_Admin.css';

//for (var i = 0; numberOfTables; i++) peak 4 (entree, sides, drinks)
//  for (var j = 0; numberOfRespectiveTableRows; j++)
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th><u>Item</u></th>";
echo "<th><u>Price</u></th>";
echo "<th><u>ID</u></th>";
echo "<th>&nbsp;&nbsp;&nbsp;<u>Edit</u></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody";
echo "<tr id='app_4'>";
echo "<td contenteditable='true' id='app_4a'>" . $menuitemname . "&nbsp;</td>";
echo "<td contenteditable='true' id='app_4b'>" . $price . "</td>";
echo "<td contenteditable='false' id='app_4c'>" . $menuitemid . "</td>";
echo "<td><button class='btn' onclick=\"saveChanges()\" style='width: 300px;'>Change</button></td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";

?>