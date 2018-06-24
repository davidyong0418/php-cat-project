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
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../header.php"); ?></td>
</tr>
<tr><td align="center" valign="top" background="../images/GRAYBKG.gif">
<table width="70%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="2" class="whitetxtcolor">&nbsp;</td>
              </tr>
              <tr> 
                <td width="72%" class="whitetxtcolor"><strong>Add Funds via Mail Order CF-Z Account </strong></td>
                <td width="28%" align="left" class="whitetxtcolor"></td>
              </tr>
              <tr> 
                <td colspan="2"><img src="/images/spacer.gif" width="10" height="10"></td>
              </tr>
              <tr> 
                <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td colspan="2">Payments may be sent in form of Cash, Money Order 
                  or Personal Check. To fund your account via mail order, simply 
                  fill out the form below, print it and send a copy with your 
                  payment to the address below. </td>
              </tr>
              <tr> 
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr> 
                <td colspan="2" valign="top"><b><span class="txt4">Make all Checks 
                  Payable to "S Cristofaro" and mail to: </span></b></td>
              </tr>
              <tr>
                <td><img src="/images/spacer.gif" width="10" height="10"></td>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td><strong>S Cristofaro </strong><br>
                  4573 Palm Ridge Blvd <br>
                  Delray Beach, FL 33445 USA</td>
              </tr>
              <tr> 
                <td width="37">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
              </tr>
            </table>  
 <table width="70%" border="0" cellpadding="4" cellspacing="0" class="border1">
        <tr> 
          <td colspan="3" align="left" class="txt4"><img src="/images/spacer.gif" width="10" height="5"></td>
        </tr>
        <tr> 
          <td align="left" class="txt4">&nbsp;</td>
          <td width="24%" align="left" valign="middle"><strong>Pre-fund Amount:</strong></td>
         <td width="72%" align="left" valign="middle"><select name="Total" size="1" class="input_field" id="Total">
    <option value="20.00" selected>20.00 
    <option value="30.00">30.00 
    <option value="40.00">40.00 
    <option value="50.00">50.00 
    <option value="60.00">60.00 
    <option value="70.00">70.00 
    <option value="80.00">80.00 
    <option value="90.00">90.00 
    <option value="100.00">100.00 
    <option value="120.00">120.00 
    <option value="140.00">140.00 
    <option value="160.00">160.00 
    <option value="180.00">180.00 
    <option value="200.00">200.00 
    <option value="300.00">300.00 
    <option value="400.00">400.00 
   <option value="500.00">500.00 
  </select> </td>
        </tr>
        <tr> 
          <td align="left" class="txt4">&nbsp;</td>
          <td align="left" valign="middle"><strong>Account Number:</strong></td>
          <td align="left" valign="middle" class="txt4"><? echo $_SESSION['account_number'];?></td>
        </tr>
        <tr> 
          <td width="4%" align="left" class="txt4"><img src="/images/spacer.gif" width="20" height="5"></td>
          <td width="24%" align="left" class="txt4"><strong>Name:</strong></td>
          <td width="72%" align="left" class="txt4"><? echo $_SESSION['last_name']." ".$_SESSION['first_name'];?></td>
        </tr>
        <tr> 
          <td align="left" class="txt4">&nbsp;</td>
          <td align="left" class="txt4"><strong>Address:</strong></td>
          <td align="left" class="txt4"><? echo $_SESSION['street_address'];?></td>
        </tr>
        <tr> 
          <td align="left"  class="txt4">&nbsp;</td>
          <td align="left"  class="txt4">&nbsp;</td>
          <td align="left"  class="txt4"><? echo $_SESSION['city'].", ".$_SESSION['state']." ".$_SESSION['zip_code'];?></td>
        </tr>
        <tr> 
          <td align="left" class="txt4">&nbsp;</td>
          <td align="left" class="txt4">&nbsp;</td>
          <td align="left" class="txt4"><? echo $_SESSION['country'];?></td>
        </tr>
        <tr> 
          <td align="left" class="txt4">&nbsp;</td>
          <td align="left" class="txt4"><strong>E-mail:</strong></td>
          <td align="left" class="txt4"><? echo $_SESSION['email'];?></td>
        </tr>
        <tr> 
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
          <td height="30" align="left" valign="bottom"><span class="WhiteLinks"><a href="#" onClick="window.print();">Print 
            this page</a></span></td>
        </tr>
        <tr>
          <td colspan="3" align="left"><span class="txt4"><img src="/images/spacer.gif" width="10" height="7"></span></td>
        </tr>
        <tr>
          <td colspan="3" align="left"><img src="../images/printicon.gif" alt="Print " width="17" height="15" hspace="2" align="absmiddle">If you have trouble printing this form, use our <span class="WhiteLinks"><a href="JavaScript:;" onClick="MM_openBrWindow('mail_order_print.php','PrinterFriendly','width=650,height=550')">Printer-Friendly Version</a></span>.</td>
        </tr>
        <tr> 
          <td colspan="3" align="left"><img src="/images/spacer.gif" width="10" height="5"></td>
        </tr>
      </table>
      <br> <table width="70%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td><strong>&lt;&lt;</strong> <span class="WhiteLinks"><a href="option.php">Return 
                  to My Account </a></span></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p><br>
            </p>
</td>
</tr>
<tr>
    <td align="left" valign="top"><?php include("../footer.php"); ?></td>
  </tr>
</table>
</body>
</html>