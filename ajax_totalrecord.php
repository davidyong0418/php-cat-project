<?php 
include("includes/connect.php");

if($_REQUEST['store_id'])
{
$query="select * from vedio_clip where store_id='$_REQUEST[store_id]'";
$result=mysql_query($query) or die(mysql_error());
echo "Total Clips: ".$count=mysql_num_rows($result);
}		
?>
