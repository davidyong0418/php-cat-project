<?php
$ban_ip = ("68.209.111.201,xxx.xxx.xxx.xxx"); 

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$ip_list = explode(",", $ban_ip);
foreach($ip_list as $ip)
{
if($visitor_ip == $ip)
{
die("<br><br><center><h2>You are banned from sc-media-group.com site!</h2></center>");
}
}

?>
