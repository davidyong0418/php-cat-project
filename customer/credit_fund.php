<?php session_start();
include("../includes/connect.php");
	$query="select * from package";
	$result=mysql_query($query) or die(mysql_error());
if(empty($_SESSION['account_number']))
{
  header("location:prepaid_login_form.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}
//$payment=$_REQUEST['paymentgatway'];
//$_SESSION['payment']=$payment;
//$paymentgetway=$_SESSION['paymentgetway'];
$_SESSION['client_id'];
$query4getgatewayid="select approved from clients where id='$_SESSION[client_id]'";
$result4gatewayid=mysql_query($query4getgatewayid) or die(mysql_error());
$row4gatewayid=mysql_fetch_array($result4gatewayid);
$paymentgetway=$row4gatewayid['approved'];	
?>
<html>
<head>
<title>credit fund</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
<script language="JavaScript">
function sendForm(packname,gateway)
{
//alert(packname);
//alert(gateway);
/*
for (i=0; i < 4; i++)
{
  if(document.package_form.paymentgatway[i].checked==true){
	var re=document.package_form.paymentgatway[i].value;
	if(re==1)
	{
	document.package_form.action="/customer/billing_information_usaepay.php?id=" + packname + "&paymentgatway=" + re;
	document.package_form.submit();
	}
	else if(re==2)
	{
	document.package_form.action="/customer/billing_information_plugnpay.php?id=" + packname + "&paymentgatway=" + re;
	document.package_form.submit();
	}
	else if(re==3)
	{
	document.package_form.action="/customer/billing_information_linkpoint.php?id=" + packname + "&paymentgatway=" + re;
	document.package_form.submit();
	}
	else if(re==0)
	{
	document.package_form.action="/customer/billing_information.php?id=" + packname + "&paymentgatway="+ re;
	document.package_form.submit();
	}
	else{}
    break;
   }
	}*/
   if(gateway==1)
	{
	document.package_form.action="/customer/billing_information_usaepay.php?id=" + packname + "&paymentgatway=" + gateway;
	document.package_form.submit();
	}
	else if(gateway==2)
	{
	document.package_form.action="/customer/billing_information_plugnpay.php?id=" + packname + "&paymentgatway=" + gateway;
	document.package_form.submit();
	}
	else if(gateway==3)
	{
	document.package_form.action="/customer/billing_information_linkpoint.php?id=" + packname + "&paymentgatway=" + gateway;
	document.package_form.submit();
	}
	else if(gateway==0)
	{
	document.package_form.action="/customer/billing_information.php?id=" + packname + "&paymentgatway="+ gateway;
	document.package_form.submit();
	}
	else{}

}
</script>
</head>

<body bgcolor="#565656" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table cellpadding="0" cellspacing="0" style="border:6px solid #000000" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../includes/header.php"); ?></td>
  </tr>
<tr><td>

<table width="70%" border="0" align="center" cellpadding="6" cellspacing="0">
	<tr>
	  <td align="center" valign="middle">&nbsp;</td>
	  </tr>
	<tr>
		<td align="center" valign="middle">			<h3>Fund By Credit Card								</h3></td>
	</tr>
	<tr>
		<td align="center" valign="middle">
				Note: All Funds are Manually Added to your account during our office hours<br>
				This could take up to 12 hours for funds to be added<br> 
				Our Office Hours are 10am to 10pm Eastern Standard Time<br>		</td>
	</tr>
	<tr>
		<td align="center" valign="middle">
			<b>The Address Submitted Must Match your Credit Card Billing Address<br>
				or the Transaction will be Declined			</b>		</td>
	</tr>
	<form name="package_form" method="post" action="" style="margin:0px;">
	<!--<tr>
	  
		<td align="center">Chose a payment getway
		<input type="radio" name="paymentgatway" value="1"> USAEPAY <input type="radio" name="paymentgatway" value="2"> PLUGNPAY <input type="radio" name="paymentgatway" value="3"> LINKPOINT <input type="radio" name="paymentgatway" value="0" checked> DEFAULT
		</td>
	</tr>-->
	<tr>
		<td align="center" valign="middle">
			<table width="100%" border="1" cellpadding="4" cellspacing="0" class="border1">
		<? 
				while($row=mysql_fetch_array($result))
				{ ?>
				
				
				<tr>
					<td align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"><? echo $row['package_name']." $".$row['package_fund']."Fund";?></font></td>
					<td align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"><? echo "Price $".$row['package_price'];?></font></td>
					<td align="right"><input type="button" class="input_btn" value="<? echo 'Order '.$row['package_name'];?>" onClick="return sendForm('<? echo $row[package_id];?>','<?php echo $paymentgetway; ?>')"></td>
					
				</tr>
				
				
			<? }?>		</td>
			</table>
	</tr>
	</form>
	<tr>
		<td align="center" valign="middle">
			<b>Note: </b>Discreet purchase will be billed as <b>"Tangible Items For You"</b>				</td>
	</tr>
	<tr>
		<td align="center" valign="middle">
			<a href="option.php" class="txt1">Return to Previous Page</a>		</td>
	</tr>
	</table>
</td>
</tr>
<tr>
    <td align="left" valign="top"><?php include("../includes/footer.php"); ?></td>
  </tr>
</table>
</td></tr>
</table>
</body>
</html>
