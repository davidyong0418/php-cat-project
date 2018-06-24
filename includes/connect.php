<?php
ini_set("display_errors","on");
error_reporting(0);
@session_start();
ob_start();
$hostName="localhost";
$userName="scmediagroup";
$password="S0si0.5150!group";
$dbName="scmediag_scmediagroup";


$domain_name ="http://sc-media-group.com";
$site_name="sc-media-group.com";

##########################################  DO NOT EDIT BLOW THIS LINE #################################################################

//$db=mysql_connect("localhost","stompproductions","xyz9858") or die(mysql_error());
$db=mysql_connect($hostName,$userName,$password) or die(mysql_error());
//$db=mysql_connect("localhost","onlineartwork","xyz9849") or die(mysql_error());
 $database=mysql_select_db($dbName,$db);
//$database=mysql_select_db("stompproductions",$db);
 //$database=mysql_select_db("onlineartwork",$db);
$sitename="http://sc-media-group.com";
//$sitename="http://onlineartwork.vsworx.co.in";
		
					  
?>
