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
		  $ip=$_SERVER['REMOTE_ADDR'];
		  $account=$_SESSION['account_number'];
		  $dlog=date('l jS \of F Y h:i:s A');
		  $flog=@fopen('f_errors.log','a');
		  if($flog)
                                     
			{
			  @fwrite($flog,' '.$account.' - '.$ip.' - '.$dlog."\n");
			  @fclose($flog);
			};
                                              echo "File is not available, Please Contact admin@nicheclips.com. A email has also been sent to the site admin for review";
		  mail('admin@nicheclips.com','***FILE ACCESS ERROR***',' '.$account.' - '.$ip.' - '.$dlog."\n");
		  
		};
	}
	else
	{
		
	}
	
	
?>

