<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
 die('Could not connect: ' . mysql_error());
}

mysql_select_db("budget", $con) or die("Pewf");
if(isset($_GET['dateidsent']))
{
 $dateid=$_GET['dateidsent'];
$result = mysql_query("SELECT category.category,familybudget.moneybudget FROM category,familybudget
 WHERE category.categoryid=familybudget.categoryid AND familybudget.dateid='$dateid' AND familybudget.familyid=".$_SESSION['familyid']."");
$rows = array();
while($r = mysql_fetch_array($result)) {
	$row[0] = $r[0];
	$row[1] = $r[1];
	array_push($rows,$row);
}
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
