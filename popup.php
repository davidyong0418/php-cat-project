<?php session_start();

$storename=$_REQUEST['storename']; 
$imagename=$_REQUEST['imagename'];
?>
<div>

<img src="http://stompproductions.com/storeowner/<?php echo $storename; ?>/preview/<?php echo $imagename; ?>">
</div>

