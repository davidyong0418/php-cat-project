<?php session_start();
 if(empty($_SESSION['account_number']))
{
  header("location:prepaid_login_form.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}

$arr=$_SESSION['pack_info'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Credit card information</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
<script language="JavaScript">
function check(form){
var cEMonth=form.expdate_month.value;
var cEyear=form.expdate_year.value;
var expiry_date = new Date("20"+cEyear,cEMonth);
var CCType=form._cc_type.value;
if(CCType==-1 || expiry_date=="Invalid Date"){
	alert("Please select the card type and date of expiration");
	return false;
}
var letter = /^[a-zA-Z\s]+$/;
var today = new Date();
var CCNum = form.txtcardnumber.value; //Card number
var CCNum = CCNum.replace(/ /g, "");
var CCName=form.txtcardholder.value
var msg = 'The credit card number you entered could not be\n validated. Please check the number and try again.';
	//alert(expiry_date+"\n"+ today);
		if(expiry_date <today){
			alert('Your credit card has expired!');
	return false;
	}
		if (!letter.test(CCName)){
			window.alert("The name as it appears on the credit card is required.");
	return false;
	}
//########## Check Visa ##########
	if(CCType=="VISA"){
		if ((CCNum.length == 13 || CCNum.length == 16) && (CCNum.substring(0,1) == 4)){
	return true
	}
		else{
			alert(msg);  
			//form.CCNum.focus();
	return false;
	}
}
//########## Check Mastercard ##########
	if(CCType=="MasterCard"){
		var firstdig=CCNum.substring(0,1);
		var seconddig=CCNum.substring(1,2);
		if ((CCNum.length == 16 || CCNum.length == 19) && (firstdig == 5) && ((seconddig >= 1) && (seconddig <= 5))){
		return true
		}
		else{
			alert(msg);  
		return false;
	}
	}
//########## Check Amex ##########
	if(CCType=="American Express"){
		firstdig = CCNum.substring(0,1);
		seconddig = CCNum.substring(1,2);
		if (((CCNum.length == 15)  || (CCNum.length == 18)) && (firstdig == 3) && ((seconddig == 4) || (seconddig == 7))){   
	return true
	}
		else{
			alert(msg);  
	return false;
	}
}
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
<tr><td style="padding-top:30px; padding-bottom:30px;">
<div align="center" id="package_information">
<table width="90%" border="0" cellpadding="6" cellspacing="0" bgcolor="#FFFFFF" class="border1">
	<tr bgcolor="#999999">
		<th align="center" valign="middle" class="txtbold">Quantity</th>
		<th align="center" valign="middle" class="txtbold">Name</th>
		<th align="center" valign="middle" class="txtbold">Description</th>
		<th align="center" valign="middle" class="txtbold">Item Number</th>
		<th align="center" valign="middle" class="txtbold">Weight</th>
		<th align="center" valign="middle" class="txtbold">Price</th>
		<th align="center" valign="middle" class="txtbold">Subtotal</th>	
	</tr>
	<tr bgcolor="#ffffff">
		<td align="center" valign="middle" class="txt1"><? echo $arr['0'];?></td>
		<td align="center" valign="middle" class="txt1"><? echo $arr['1'];?></td>
		<td align="center" valign="middle" class="txt1"><? echo $arr['2']." Funding";?></td>
		<td align="center" valign="middle" class="txt1"><? echo $arr['3'];?></td>
		<td align="center" valign="middle" class="txt1"><? echo $arr['4'];?></td>
		<td align="center" valign="middle" class="txt1"><? echo "$".$arr['5'];?></td>
		<td align="center" valign="middle" class="txt1"><? echo "$".$arr['5'];?></td>	
	</tr>
	<tr>
		<td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF" class="txt1">&nbsp;</td>
		<th align="center" valign="middle" bgcolor="#999999">Total Weight</th>
		<td align="center" valign="middle" bgcolor="#ffffff" class="txt1"><? echo $arr['4'];?></td>
		<th align="center" valign="middle" bgcolor="#999999">Sub Total</th>
		<td align="center" valign="middle" bgcolor="#ffffff" class="txt1"><? echo "$".$arr['5'];?></td>
	</tr>
	<tr>
		<td colspan="5" align="center" valign="middle" bgcolor="#FFFFFF" class="txt1">&nbsp;</td>
		<th align="center" valign="middle">Shipping/Handling</th>
		<td align="center" valign="middle" bgcolor="#ffffff" class="txt1">$0.00</td>
	</tr>
	<tr>
		<td colspan="5" align="center" valign="middle" bgcolor="#FFFFFF" class="txt1">&nbsp;</td>
		<th align="center" valign="middle" bgcolor="#999999">Tax</th>
		<td align="center" valign="middle" bgcolor="#ffffff" class="txt1">$0.00</td>
	</tr>
	<tr>
		<td colspan="5" align="center" valign="middle" bgcolor="#FFFFFF" class="txt1">&nbsp;</td>
		<th align="center" valign="middle">Total</th>
		<td align="center" valign="middle" bgcolor="#ffffff" class="txt1"><? echo "$".$arr['5'];?></td>
	</tr>
</table>
</div>
<div align="center" id="billing_information" style="padding-top:30px;">
<table width="70%" border="0" align="center" cellpadding="6" cellspacing="0" bgcolor="#FFFFFF" class="border1">
	<tr>
		<th colspan="2" align="center" valign="middle" bgcolor="#999999" class="txtbold">Billing Information</th>
	</tr>
	<tr>
		
      <td align="left" valign="middle">&nbsp;First Name</td>
		<td align="left" valign="middle"><b><? echo $_POST['first_name'];?></b></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Last Name</td>
		<td align="left" valign="middle"><b><? echo $_POST['last_name'];?></b></td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="middle">&nbsp;Note: <i>The following address is for both billing and shipping.</i></td>
		
	</tr>
	<tr>
		
      <td align="left" valign="middle">&nbsp;Address line 1</td>
		<td align="left" valign="middle"><b><? echo $_POST['address_line_1'];?></b></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Address line 2</td>
		<td align="left" valign="middle"><b><? echo $_POST['address_line_2'];?></b></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;City</td>
		<td align="left" valign="middle"><b><? echo $_POST['city'];?></b></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;State/province</td>
		<td align="left" valign="middle"><b><? echo $_POST['state'];?></b></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Zip/Postal Code</td>
		<td align="left" valign="middle"><b><? echo $_POST['zip_code'];?></b></td>
	</tr><tr>
		<td align="left" valign="middle">&nbsp;Country</td>
		<td align="left" valign="middle"><b><? echo $_POST['country'];?></b></td>
	</tr><tr>
		<td align="left" valign="middle">&nbsp;Phone</td>
		<td align="left" valign="middle"><b><? echo $_POST['phone'];?></b></td>
	</tr>
	<tr>
		          <td align="left" valign="middle">&nbsp;E-mail</td>
		<td align="left" valign="middle"><b><? echo $_POST['email'];?></b></td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="middle">&nbsp;</td>
	</tr>
	</table>
	<?php 
	if($_SESSION['paymentgetway']=='1')
	{
	?>
	<form name="Checkout" method="POST" action="DoDirectPaymentReceipt1.php">
		
	<?php }
	else if($_SESSION['paymentgetway']=='2')
	{
	?>
	<form name="Checkout" method="POST" action="plugnpay.php">
	<?php }
	else if($_SESSION['paymentgetway']=='3')
	{
	?>
	<form name="Checkout" method="POST" action="linkpointcentral.php">
	<?php }
	else
	{
	?>
	<form name="paypal" method="post" action="merchantpartners.php" onSubmit="return check(this)">
	<?php } ?>
	<table width="70%" border="0" align="center" cellpadding="6" cellspacing="0" bgcolor="#FFFFFF" class="border1">
	<tr>
		<th colspan="2" align="center" valign="middle" bgcolor="#999999" class="txtbold">Credit Card Payment</th>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Cardholder's Name</td>
		<td align="left" valign="middle"><input name="card_holder_name" type="text" class="input_field" value=""></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Card Number</td>
		<td align="left" valign="middle"><input name="creditCardNumber" type="text" class="input_field" value=""></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Expiration Date</td>
		<td align="left" valign="middle"><select name="expdate_month" class="input_field">
							<option value=01>January
							<option value=02>February
							<option value=03>March
							<option value=04>April
							<option value=05>May
							<option value=06>June
							<option value=07>July
							<option value=08>August
							<option value=09>September
							<option value=10>October
							<option value=11>November
							<option value=12>December
						</select>&nbsp;
						<select name="expdate_year" class="input_field">
						  <option value=2006>2006
						  <option value=2007>2007
						  <option value=2008>2008
						  <option value=2009>2009
						  <option value=2010>2010
						  <option value=2010>2010
						  <option value=2011>2011
						  <option value=2012>2012
						  <option value=2013>2013
						  <option value=2014>2014
						  <option value=2015>2015
					</select>
		</td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;CVV2 Number</td>
		<td align="left" valign="middle"><input name="cvv2Number" type="text" class="input_field" value=""></td>
	</tr>
	<tr>
		<td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><img src="../images/Visa-CVV2.gif">		</td>
	</tr>


<tr>
<td colspan="2" align="left" valign="middle">The CVV2 number is printed in the signature area of your Visa and Mastercard charge card. It is the last 3 digits after the credit card number in the signature area of the card.<br>
<br>
NOTE: Your transaction will be authorized in real-time, which may take up to 2 minutes. Please wait patiently and please do NOT click on the "Submit Order" button more than once, or you may be <br>
charged multiple times. </td>
</tr>
										<tr> 
											<td colspan="3" align="left" valign="middle">&nbsp;
											<!--Hidden Fields For Pay Pal-->
											
											
											<!------------------------   BILLING INFORMATION ----------------------->
											<input type="hidden" name="firstName" value="<?php echo $_POST['first_name']; ?>">
											<input type="hidden" name="lastName" value="<?php echo $_POST['last_name']; ?>">
											<input type="hidden" name="creditCardType" value="<?php echo $_POST['payment_method']; ?>">
											<input type="hidden" name="address1" value="<?php echo $_POST['address_line_1']; ?>">
											<input type="hidden" name="address2" value="<?php echo $_POST['address_line_2']; ?>">
											<input type="hidden" name="city" value="<?php echo $_POST['city']; ?>">
											<input type="hidden" name="state" value="<?php echo $_POST['state']; ?>">
											<input type="hidden" name="zip" value="<?php echo $_POST['zip_code']; ?>">
											<input type="hidden" name="amount" value="<?php echo $arr['2']; ?>">
											<input type="hidden" name="country" value="<?php echo $_POST['country']; ?>">
											<!------------------------   SHIPPING INFORMATION ------------------------->
											

										  </td>
			    </tr>
	<tr>
		<td align="left" valign="middle">&nbsp;</td>
		<td colspan="2" align="left" valign="middle">
		<input type="button" name="Edit" value="Edit" onClick="JavaScript:history.back();" class="input_btn">
		&nbsp;&nbsp;<input type="submit" name="Submit" value="Checkout" class="input_btn">
		</td>
	</tr>
</table>
</form>
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
