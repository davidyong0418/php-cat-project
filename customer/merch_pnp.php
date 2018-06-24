<?php session_start();
include("../includes/connect.php");

?>
<html>
<head>
<title><? echo $site_name ?> - Fund by Credit Card</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />


<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {
	color: #FF0000;
	font-weight: bold;
}
.style3 {color: #FF0000}
.style4 {
	color: #333333;
	font-weight: bold;
}
.style5 {
	color: #000000;
	font-weight: bold;
}
.style6 {color: #000000}
-->
</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../header.php"); ?></td>
  </tr>
<tr>
          <td align="right" valign="top" background="../images/GRAYBKG.gif"> <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" class="whitetxtcolor">&nbsp;</td>
              </tr>
              <tr> 
                <td align="left" class="whitetxtcolor"><strong>Fund By Credit 
                  Card</strong></td>
              </tr>
              <tr> 
                <td><img src="/images/spacer.gif" width="10" height="10"></td>
              </tr>
              <tr> 
                <td><div class="border2" style="padding:5px"> <span class="style2"><blink>::IMPORTANT::</blink> 
                  </span><span class="style4">All funds could take up to 4 hours 
                    to be added to your account. The address submitted must match 
                    your credit card billing address or the transaction will be 
                    declined.                 <br>
                    <br>
                    Please provide your Account Number in the Comments box provided on Checkout.</span> <br>
                  <br>
                  <span class="style3"><span class="style5">Discreet purchase 
                    will be billed as</span> <b> &quot;Stomp Productions &quot;</b>.</span></div></td>
              </tr>
            </table>
            <br> 
<!--BEGIN NEW TABLE -->
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" class="border1" >

<tr>
  <td colspan="2" align="center" valign="middle" scope="col"><form method="post" action="https://pay1.plugnpay.com/payment/pay.cgi"><input type="hidden" name="publisher-email" value="admin@nicheclips.com"><input type="hidden" name="publisher-name" value="stompprodu">
  <input type="hidden" name="order-id" value="website_order">
  <input type="hidden" name="card-allowed" value="Visa,Mastercard">
  <input type="hidden" name="shipinfo" value="0">
  <input type="hidden" name="easycart" value="1">
  <input type="hidden" name="currency" value="usd">
  <input type="hidden" name="currency_symbol" value=" ">
  <input type="hidden" name="success-link" value="http://nicheclips.com/accounts/approved.htm">
  <table border="0" cellspacing="0" cellpadding="3" width="90%">
    <tr>
      <input type="hidden" name="item1" value="0001">
      <td align="center" valign="middle"><input type="hidden" name="description1" value="Package 1 $20.00 Funding">      <strong>Package 1 - $20.00 Credit </strong></td>
      <td align="center" valign="middle"><strong>Price:</strong>
        <strong>
          <input type="hidden" name="cost1" value="20.99">        
          $20.99</strong></td>
      <td width="10%" align="center" valign="middle"><input type="hidden" name="quantity1" size="2" value="1">
        <input name="return" type="submit" class="input_btn" value="Order Package 1"></td>
    </tr>
  </table>
  </form>  </td>
</tr>
<tr>
  <td colspan="2" align="center" scope="col"><form method="post" action="https://pay1.plugnpay.com/payment/pay.cgi">
<input type="hidden" name="publisher-email" value="admin@nicheclips.com">
<input type="hidden" name="publisher-name" value="stompprodu">
<input type="hidden" name="order-id" value="website_order">
<input type="hidden" name="card-allowed" value="Visa,Mastercard">
<input type="hidden" name="shipinfo" value="0">
<input type="hidden" name="easycart" value="1">
<input type="hidden" name="currency" value="usd">
<input type="hidden" name="currency_symbol" value="" >
<input type="hidden" name="success-link" value="http://nicheclips.com/accounts/approved.htm">

<table width="90%" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <input type="hidden" name="item1" value="0001">
    <td align="center"><input type="hidden" name="description1" value="Package 2 $40.00 Funding">            <strong>Package 2 - $40.00 Credit </strong></td>
      <td align="center"><strong>Price:
        <input type="hidden" name="cost1" value="41.99">        
        $41.99</strong></td>
      <td align="center" width="10%"><input type="hidden" name="quantity1" size="2" value="1">
        <input name="return" type="submit" class="input_btn" value="Order Package 2"></td>
    </tr>
</table>
  </form></td>
</tr>
<tr>
  <th colspan="2" align="center" scope="col"><form method="post" action="https://pay1.plugnpay.com/payment/pay.cgi">
<input type="hidden" name="publisher-email" value="admin@nicheclips.com">
<input type="hidden" name="publisher-name" value="stompprodu">
<input type="hidden" name="order-id" value="website_order">
<input type="hidden" name="card-allowed" value="Visa,Mastercard">
<input type="hidden" name="shipinfo" value="0">
<input type="hidden" name="easycart" value="1">
<input type="hidden" name="currency" value="usd">
<input type="hidden" name="currency_symbol" value=" " >
<input type="hidden" name="success-link" value="http://nicheclips.com/accounts/approved.htm">

<table width="90%" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <input type="hidden" name="item1" value="0001">
    <td align="center"><input type="hidden" name="description1" value="Package 3 $60.00 Funding">      <strong>Package 3 - $60.00 Credit </strong></td>
      <td align="center"><strong>Price:
        <input type="hidden" name="cost1" value="62.99"> 
        $62.99</strong></td>
      <td align="center" width="10%"><input type="hidden" name="quantity1" size="2" value="1">
        <input name="return" type="submit" class="input_btn" value="Order Package 3"></td>
    </tr>
</table>
  </form></th>
</tr>
<tr>
  <td colspan="2" align="center" scope="col"><form method="post" action="https://pay1.plugnpay.com/payment/pay.cgi">
<input type="hidden" name="publisher-email" value="admin@nicheclips.com">
<input type="hidden" name="publisher-name" value="stompprodu">
<input type="hidden" name="order-id" value="website_order">
<input type="hidden" name="card-allowed" value="Visa,Mastercard">
<input type="hidden" name="shipinfo" value="0">
<input type="hidden" name="easycart" value="1">
<input type="hidden" name="currency" value="usd">
<input type="hidden" name="currency_symbol" value=" ">
<input type="hidden" name="success-link" value="http://nicheclips.com/accounts/approved.htm">
<div align="center">
<table width="90%" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <input type="hidden" name="item1" value="0001">
    <td align="center"><input type="hidden" name="description1" value="Package 4 $80.00 Funding">      <strong>Package 4 - $80.00 Credit </strong></td>
    <td align="center"><strong>Price:
        <input type="hidden" name="cost1" value="83.99">        
        $83.99</strong></td>
    <td align="center" width="10%"><input type="hidden" name="quantity1" size="2" value="1">
      <input name="return" type="submit" class="input_btn" value="Order Package 4"></td>
  </tr>
</table>
</div>
</form></td>
</tr>
<tr>
    <td colspan="2" align="center" scope="col"><form method="post" action="https://pay1.plugnpay.com/payment/pay.cgi"><input type="hidden" name="publisher-email" value="admin@nicheclips.com">
<input type="hidden" name="publisher-name" value="stompprodu">
<input type="hidden" name="order-id" value="website_order">
<input type="hidden" name="card-allowed" value="Visa,Mastercard">
<input type="hidden" name="shipinfo" value="0">
<input type="hidden" name="easycart" value="1">
<input type="hidden" name="currency" value="usd">
<input type="hidden" name="currency_symbol" value=" ">
<input type="hidden" name="success-link" value="http://nicheclips.com/accounts/approved.htm">
<div align="center">
<table width="90%" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <input type="hidden" name="item1" value="0001">
    <td align="center"><input type="hidden" name="description1" value="Package 5 $100.00 Funding">      <strong>Package 5 - $100.00 Credit </strong></td>
    <td align="center"><strong>Price:
        <input type="hidden" name="cost1" value="104.99">        
        $104.99</strong></td>
    <td align="center" width="10%"><input type="hidden" name="quantity1" size="2" value="1">
      <input name="return" type="submit" class="input_btn" value="Order Package 5"></td>
  </tr>
</table></div></form></td>
  </tr>
</table>
<!-- END NEW TABLE -->
            <br> <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td><strong>&lt;&lt; <a href="javascript:history.back();" class="bodyfont style1">Return 
                  to My Account </a></strong></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <div align="center" class="bodyfont"><br>
              <br>
              <a href="javascript:history.back();" class="bodyfont style1"></a></div>
            <div align="center"></div>
<br></td></tr>
<tr>
    <td align="left" valign="top"><?php include("../footer.php"); ?></td>
  </tr>
</table>
</td></tr>
</table>

</body>
</html>
