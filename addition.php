<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
include("includes/connect.php");

$query = "SELECT Prefund_amount, SUM(Prefund_amount) FROM clients "; 
	 
$result = mysql_query($query) or die(mysql_error());

// Print out result
while($row = mysql_fetch_array($result)){
	echo "Total ". $row['Prefund_amount']. " = $". $row['SUM(Prefund_amount)'];
	echo "<br />";
}
?>
</body>
</html>
