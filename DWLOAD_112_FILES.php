<?php session_start();
if(empty($_SESSION['account_number']))
{
  header("location:index.php");
}

include 'customer/dl-hash.php';
$real_video = shash_file($_REQUEST['vedio'],true);
if (empty($real_video)) {
	header('403 Forbidden');
	die();
}
	
	$date=$_REQUEST['date'];
	$todaydate=date('Y-m-d');
	//$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
	$yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
	//$to2marodate=date('Y-m-d',$tomorrow);
	$yesterdaydate=date('Y-m-d',$yesterday);
	if($yesterdaydate==$date || $todaydate==$date)
	{
		$path=getcwd();
		$f_location=$path."/".$_REQUEST['storeowner']."/clips/files/dwnload_files/".$real_video;
		$f_name=$_REQUEST['vedio'];
		if(file_exists($f_location))
		{
			header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Length: ' . filesize($f_location));
			header('Content-Disposition: attachment; filename=' . $real_video);
			@readfile($f_location);
		}
		else
		{
	$to="admin@sc-media-group.com";
	$from ="admin@sc-media-group.com";
	$subject="sc-media-group FILE ACCESS ERROR";
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $account=$_SESSION['account_number'];
                    $message="sc-media-group FILE ACCESS ERROR 
-------------------------------------------------------- 
Account: $account
IP: $ip
-------------------------------------------------------- 

sc-media-group.com";

                    $headers = 'From: admin@sc-media-group.com' . "\r\n".
                   'Reply-To: admin@sc-media-group.com'. "\r\n".
                   'Return-Path:admin@sc-media-group.com' . "\r\n".
                    'X-Mailer: PHP/' . phpversion();
                   echo '<p align="center"><br>
  This file is not available for Download at the moment. <br>
  Please contact us so we may help to correct this issue
</p>
<p align="center">Please Contact admin@sc-media-group.com</p>
<p align="center">An email has also been sent to the site admin for review.</p>';
                   mail($to, $subject, $message, $headers, "-f $from");

		  
		};
	}
	else
	{
		
	}
	
	
?>

