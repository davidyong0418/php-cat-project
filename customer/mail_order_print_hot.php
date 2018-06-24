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
<title><? echo $site_name ?> - Print For Mail Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body bgcolor="#FFFFFF">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td class="whitetxtcolor">&nbsp;</td>
              </tr>
              <tr> 
                <td align="left" class="whitetxtcolor"><strong>Add Funds via Mail Order</strong></td>
              </tr>
              <tr> 
                <td align="left">&nbsp;</td>
              </tr>
              <tr> 
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                  Payable to "S Productions " and mail to: </span></b></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td><strong>S Productions </strong><br>
                  PO BOX 6696<br>
                  Delray Beach, FL 33482<br>
                USA</td>
              </tr>
              <tr> 
                <td width="37">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
              </tr>
</table>  
 <table width="650" border="0" align="center" cellpadding="4" cellspacing="0" class="border1">
        <tr> 
          <td colspan="3" align="left" class="txt4">&nbsp;</td>
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
          <td width="4%" align="left" class="txt4">&nbsp;</td>
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
          <td height="30" align="left" valign="bottom"><table width="70%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td>&nbsp;</td>
                <td><form> 
<input type=button name=print value="Print This Form" onClick="javascript:window.print()"> 
</form></td>
              </tr>
            </table>
            <p></td>
        </tr>
        <tr> 
          <td colspan="3" align="left">&nbsp;</td>
        </tr>
</table>
</body>
</html>