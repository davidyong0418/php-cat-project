<?php session_start();
 if(empty($_SESSION['account_number']))
{
  header("location:prepaid_login_form.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}

?>

<html>
<head>
<title><? echo $site_name ?> - Add Funds Via Mail Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
</head>

<body bgcolor="#565656" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table cellpadding="0" cellspacing="0" style="border:6px solid #000000" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../header.php"); ?></td>
</tr>
<tr><td height="25" align="center" valign="middle" background="../images/GRAYBKG.gif" style="padding-top:30px; padding-bottom:30px;">
  <table width="60%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td class="whitetxtcolor"><strong>Add Funds via Mail Order</strong></td>
    </tr>
    <tr>
      <td><img src="/images/spacer.gif" width="10" height="10"></td>
    </tr>
	  <tr>
      <td valign="top"><table width="492" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2">Payments may be sent in form of Cash, Money Order, Personal Checks.</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td height="22" colspan="2" valign="top"><b><span class="txt4">Make all Checks Payable to "Stomp Productions" and mail to: </span></b></td>
            </tr>
          <tr>
            <td width="37">&nbsp;</td>
            <td width="455"><strong>Stomp Productions </strong><br>
4573 Palm Ridge Blvd <br>
Delray Beach, FL 33445</td>
          </tr>
        </table>
        <b>        </b></td>
    </tr>
	    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
<div align="center">
<table width="60%" border="0" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF" class="border1">
	<tr>
		<td width="28%" align="left" valign="middle">&nbsp;Pre-fund Amount:</td>
		<td width="72%" align="left" valign="middle"><select name="Total" size="1" class="input_field" id="Total">
                <option value="100.00">100.00
                <option value="80.00">80.00
                <option value="60.00">60.00
                <option value="50.00">50.00
                <option value="40.00">40.00
                <option value="30.00">30.00
                <option value="20.00" selected>20.00
		</select>		</td>
	</tr>
	<tr>
		<td align="left" valign="middle">&nbsp;Account Number:</td>
		<td align="left" valign="middle" class="txt4"><? echo $_SESSION['account_number'];?></td>
	</tr>
	<tr>
		<td colspan="2" align="left" valign="middle">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
			  <tr>
			    <td width="28%" align="left" class="txt4">Name:</td>
			    <td width="72%" align="left" class="txt4"><? echo $_SESSION['last_name']." ".$_SESSION['first_name'];?></td>
				  </tr>
			  <tr>
			    <td align="left" class="txt4">Address:</td>
			    <td align="left" class="txt4"><? echo $_SESSION['street_address'];?></td>
				  </tr>
			  <tr>
			    <td align="left"  class="txt4">&nbsp;</td>
			    <td align="left"  class="txt4"><? echo $_SESSION['city'].", ".$_SESSION['state']." ".$_SESSION['zip_code'];?></td>
				  </tr>
			  <tr>
			    <td align="left" class="txt4">&nbsp;</td>
			    <td align="left" class="txt4"><? echo $_SESSION['country'];?></td>
				  </tr>
			  <tr>
			    <td align="left" class="txt4">E-mail:</td>
			    <td align="left" class="txt4"><? echo $_SESSION['email'];?></td>
				  </tr>
			  <tr>
			    <td align="left">&nbsp;</td>
			    <td align="left" height="20">&nbsp;</td>
				  </tr>
			  </table></td>
		</tr>
	<tr>
		<td colspan="2" align="left" valign="top" class="txt1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="WhiteLinks" onClick="window.print();">Print this page</a></td>
	</tr>
	<tr>
		<td height="30" align="left" colspan="2" class="txt4">&lt;&lt; <a href="option.php" class="WhiteLinks">Return to previous page</a></td>
	</tr>
</table>
<br>
</div>
<div align="center"></div>
</td>
</tr>
<tr>
    <td align="left" valign="top"><?php include("../footer.php"); ?></td>
  </tr>
</table>
</td></tr>
</table>
</body>
</html>