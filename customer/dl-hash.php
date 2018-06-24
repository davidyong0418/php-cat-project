<?php

function shash_file($string,$decrypt = false) {
	// this key can be changed if you want, just make it something big
	$hashkey = "34etasdfGF$gasdfgASDTGerawtsVARsdhyaCVEesatAEWSDGAverARYHAGbafdsVFAsegASEtgasdgvaDREfvDSEAGFASDGAsdgAYYAH";
	if ($decrypt) {
		$dec64 = base64_decode($string);
		list($filename,$newhash) = explode('||||',$dec64);
	} else {
		$filename = $string;
	}
	$newhash = md5($filename . $hashkey . $_SERVER['REMOTE_ADDR'] . $_SESSION['account_number']);
	if ($decrypt) {
		if ($newhash==$newhash) return $filename;
		return false;
	} else {
		return base64_encode($filename . '||||' . $newhash);
	}
}


?>