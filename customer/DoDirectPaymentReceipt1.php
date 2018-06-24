<?php session_start();
include("../includes/connect.php");
$amount="";
$sql="select Prefund_amount,Life_total from clients where account_number='$_SESSION[account_number]'";
$res=mysql_query($sql)or die(mysql_error());
$rec=mysql_fetch_array($res);
if($rec['Life_total']=="")
{
	$amount=$rec['Prefund_amount'];
}
else{
	$amount=$rec['Life_total'];
}

$amount+=$_REQUEST['amount'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>StompProductions.com</title>
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" rowspan="5" align="left" valign="top" bgcolor="#000000">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#000000" height="5"></td>
    <td rowspan="5" align="left" valign="top" bgcolor="#000000" width="5"></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php include("../includes/header.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3%" align="left"></td>
            <td width="91%" align="center" valign="top" style="padding:10px;">
			
			<?php
// USA ePay PHP Library.
//      v1.5
//
//      Copyright (c) 2002-2007 USA ePay
//      Written by Tim McEwen (tim@usaepay.com)
//
//  The following is an example of running a transaction using the php library.
//  Please see the README file for more information on usage.
//

include "usaepay.php";

$tran=new umTransaction;

$tran->key="FbKH88fbccwp0J53caR18n64Ul7UyZXr";
$tran->testmode=0;
$tran->card=urlencode($_POST['creditCardNumber']);		// card number, no dashes, no spaces
$tran->exp=str_pad(urlencode($_POST['expdate_month']), 2, '0', STR_PAD_LEFT).urlencode($_POST['expdate_year']);			// expiration date 4 digits no /
$tran->amount=urlencode($_POST['amount']);			// charge amount in dollars (no international support yet)
$tran->invoice="1234";   		// invoice number.  must be unique.
$tran->cardholder=urlencode($_POST['card_holder_name']); 	// name of card holder
$tran->street=urlencode($_POST['address1']);	// street address
$tran->zip=urlencode($_POST['zip']);			// zip code
$tran->description="Online Order";	// description of charge
$tran->cvv2=urlencode($_POST['cvv2Number']);			// cvv2 code	

echo "Please Wait One Moment While We process your card.<br>\n";
flush();

if($tran->Process())
{
	echo "<b>Card approved</b><br>";
	echo "<b>Authcode:</b> " . $tran->authcode . "<br>";
	echo "<b>AVS Result:</b> " . $tran->avs_result . "<br>";
	echo "<b>Cvv2 Result:</b> " . $tran->cvv2_result . "<br>";
	
	if($rec['Life_total']=="")
		{
			$query="update clients set
					Prefund_amount='$amount'
					where account_number='$_SESSION[account_number]'";
		}
		else{
			$query="update clients set
					Life_total='$amount'
					where account_number='$_SESSION[account_number]'";
		}
} else {
	echo "<b>Card Declined</b> (" . $tran->result . ")<br>";
	echo "<b>Reason:</b> " . $tran->error . "<br>";	
	if($tran->curlerror) echo "<b>Curl Error:</b> " . $tran->curlerror . "<br>";	
}		

?>

			
			</td>
            <td width="3%"></td>
          </tr>
        </table></td>
        
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php include("../includes/footer.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#000000" height="5"></td>
  </tr>
</table>
</body>
</html>
