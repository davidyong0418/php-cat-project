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
<title>Billing Information</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
</head>

<body bgcolor="#565656" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table cellpadding="0" cellspacing="0" style="border:6px solid #000000" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../includes/header.php"); ?></td>
</tr>
<tr><td style="padding-top:30px; padding-bottom:30px;">
<form name="paypal" method="post" action="https://www.paypal.com/cgi-bin/webscr">
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
		<td align="left" valign="middle">&nbsp;E-mailLast Name</td>
		<td align="left" valign="middle"><b><? echo $_POST['email'];?></b></td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="middle">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="2" align="center" valign="middle" bgcolor="#999999" class="txtbold">Credit Card Payment</th>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Cardholder's Name</td>
		<td align="left" valign="middle"><input name="card_holder_name" type="text" class="input_field" value=""></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Card Number</td>
		<td align="left" valign="middle"><input name="card_number" type="text" class="input_field" value=""></td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Expiration Date</td>
		<td align="left" valign="middle"><select name="expmon" class="input_field">
							<option value=1>January
							<option value=2>February
							<option value=3>March
							<option value=4>April
							<option value=5>May
							<option value=6>June
							<option value=7>July
							<option value=8>August
							<option value=9>September
							<option value=10>October
							<option value=11>November
							<option value=12>December
						</select>&nbsp;
						<select name="expyear" class="input_field">
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
		<td align="left" valign="middle"><input name="cvv2" type="text" class="input_field" value=""></td>
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
											<input type="hidden" name="cmd" value="_xclick">
											<input type="hidden" name="redirect_cmd" value="_xclick">
											<input type="hidden" name="business" value="COHA@outdoorheritage.org">
											<input type="hidden" name="return" value="http://hosting.altserver.com/~artandph/return.php?firstname%3Dmanjeet%26lastname%3Dchauhan%26address1%3Dhkjhkjh%26address2%3Dhkhkh%26city%3Dkhkh%26state%3DUS+States+Only%26email%3Dabc%40abc.com%26country%3DIndia%26amount%3D250.00%26zipcode%3D11001%26phone%3D1111111111%26session_id%3De342e8b1d26076709d1d18d58db4058a%26S_firstname%3Dmanjeet%26S_lastname%3Dchauhan%26S_address1%3Dhkjhkjh%26S_address2%3Dhkhkh%26S_city%3Dkhkh%26S_state%3D0%26S_country%3DIndia%26amount%3D250.00%26S_zipcode%3D11001%26S_phone%3D%26session_id%3De342e8b1d26076709d1d18d58db4058a">
											<input type="hidden" name="rm" value="2">
											<input type="hidden" name="image_url" value="http://203.122.11.40/stompproductions.com/images/logo.jpg">

											<input type="hidden" name="item_name" value="Make a Payment @ stompproductions.com">
											<input type="hidden" name="item_number" value="<?php echo $arr['3'];?>">
											<input type="hidden" name="amount" value="<?php echo "$".$arr['5'];?>">
											<input type="hidden" name="no_shipping" value="1">
											<input type="hidden" name="cancel_return" value="http://impl.vsworx.co.in/stompproductions.com/customer/cancel_transection.php">
											
											<input type="hidden" name="on0" value="session_id">
											<input type="hidden" name="os0" value="e342e8b1d26076709d1d18d58db4058a">
											
											<!------------------------   BILLING INFORMATION ----------------------->
											<input type="hidden" name="first_name" value="<?php echo $_POST['first_name']; ?>">
											<input type="hidden" name="last_name" value="<?php echo $_POST['last_name']; ?>">
											<input type="hidden" name="address1" value="<?php echo $_POST['address_line_1']; ?>">
											<input type="hidden" name="address2" value="<?php echo $_POST['address_line_2']; ?>">
											<input type="hidden" name="city" value="<?php echo $_POST['city']; ?>">
											<input type="hidden" name="state" value="<?php echo $_POST['state']; ?>">
											<input type="hidden" name="zip" value="<?php echo $_POST['zip_code']; ?>">
											<input type="hidden" name="email" value="<?php echo $_POST['e-mail']; ?>">
											<input type="hidden" name="H_PhoneNumber" value="<?php echo $_POST['phone']; ?>">
											<input type="hidden" name="country" value="<?php echo $_POST['country']; ?>">
											<!------------------------   SHIPPING INFORMATION ------------------------->
											<input type="hidden" name="S_firstname" value="<?php echo $_POST['first_name']; ?>">
											<input type="hidden" name="S_lastname" value="<?php echo $_POST['last_name']; ?>">
											<input type="hidden" name="S_address1" value="<?php echo $_POST['address_line_1']; ?>">
											<input type="hidden" name="S_address2" value="<?php echo $_POST['address_line_2']; ?>">
											<input type="hidden" name="S_city" value="<?php echo $_POST['city']; ?>">
											<input type="hidden" name="S_state" value="<?php echo $_POST['state']; ?>">
											<input type="hidden" name="S_zip" value="<?php echo $_POST['zip_code']; ?>">
											<input type="hidden" name="S_country" value="<?php echo $_POST['country']; ?>">

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
