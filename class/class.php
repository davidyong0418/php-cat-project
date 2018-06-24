<?php 
class clsgetid
{
var $URI;
var $storeid;
	function getid($id)
	{
		$ar=explode("/",$id);
		array_reverse($ar);
		$storeid =array_pop($ar);
		return $storeid;

	} 
}
?>