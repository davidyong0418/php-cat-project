<?php include("includes/connect.php");
class sitepermission{
var $query;
var $result;
var $row;

function sitepermission()
{
	$query="select * from admin";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	if($row['admin_permission']=='1')
	{
		return 1;
	}
	else
	{
		return 0;
	}
}
}
?>