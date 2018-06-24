<?php
$URI=$_SERVER['REQUEST_URI'];

$ar=explode("/",$URI);
//print_r($ar);
array_reverse($ar);
$storeid=array_pop($ar);
print $storeid;

?>