<?php session_start();
include("../includes/connect.php");
if(empty($_SESSION['account_number']))
{
  header("location:prepaid_login_form.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}
$_SESSION['client_id'];
$query4gettingbilldetails="select * from clients where id='$_SESSION[client_id]'";
$result4gettingbilldetails=mysql_query($query4gettingbilldetails) or die(mysql_error());
$row4gettingbilldetails=mysql_fetch_array($result4gettingbilldetails);

?>
<html>
<head>
<title><? echo $site_name ?> - Fund by Online Checks</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />

<script>
var checkobj

function agreesubmit(el){
checkobj=el
if (document.all||document.getElementById){
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
var tempobj=checkobj.form.elements[i]
if(tempobj.type.toLowerCase()=="submit")
tempobj.disabled=!checkobj.checked
}
}
}

function defaultagree(el){
if (!document.all&&!document.getElementById){
if (window.checkobj&&checkobj.checked)
return true
else{
alert("Please read/accept terms to submit form")
return false
}
}
}

</script>
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
          <td align="right" valign="top" background="../images/GRAYBKG.gif"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" class="whitetxtcolor">&nbsp;</td>
              </tr>
              <tr> 
                <td align="left" class="whitetxtcolor"><strong>Fund By Check </strong></td>
              </tr>
              <tr>
                <td><img src="/images/spacer.gif" width="10" height="10"></td>
              </tr>
              <tr>
                <td>Funding by electronic check. USA Customers
                  Only </td>
              </tr>
            </table>
            <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666" class="border1" >
              <tr bgcolor="#000000">
                <th height="23" colspan="3" bgcolor="#FDE884" scope="col"><div align="center">
                  <p class="style2"><blink><blink><span class="style4">All funds could 
                    take up to 4 hours to be added to your account. The address 
                    submitted must match your Check billing address or the transaction 
                    will be declined.</span></blink></blink></p>
                  <p class="style2"><span class="txt2"> Billing will be stated as   "Stomp Prod"</span></p>
                  <br>
                </div></th>
              </tr>
              <tr>
                <th scope="col">$10.00 Credit </th> 
                <th height="38" scope="col"><strong>Price:</strong> <strong>
$10.99   </strong></th>
                <th width="37%" rowspan="10" valign="middle" scope="col"><br>
                  <br>
                  <input type='submit' name='btnPayNow' value='Add Funds By Check'  id='ctl00_ctl00_ContentPlaceHolder1_ContentPlaceHolder1_gdPaymentButton_ctl02_GraphicButton' style='Color:Black;font-size:12Px;font-family:Arial,Helvetica, sans-serif;font-weight:;font-style:;background-color:Silver' onClick="javascript:window.open('https://payments.paysimple.com/buyer/checkoutformpay/sX8x-Qmu-TEaqr8e47OePu3xAQ0-');return false;"/>
                <label></label></th></tr>
              <tr>
                <th width="33%" scope="col">$20.00 Credit </th> 
                <th width="30%" height="28" scope="col"><strong>Price:</strong> <strong> $20</strong><strong>.99    </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$30.00 Credit </th> 
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $30</strong><strong>.99    </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$40.00 Credit </th> 
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $40</strong><strong>.99   </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$50.00 Credit </th>
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $50</strong><strong>.99 </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$60.00 Credit </th>
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $60</strong><strong>.99 </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$70.00 Credit </th>
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $70</strong><strong>.99 </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$80.00 Credit </th>
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $80</strong><strong>.99 </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$90.00 Credit </th>
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $90</strong><strong>.99 </strong></th>
              </tr>
              <tr>
                <th class="bodyfont" scope="col">$100.00 Credit </th>
                <th height="28" class="bodyfont" scope="col"><strong>Price:</strong> <strong> $100</strong><strong>.99   </strong></th>
              </tr>
              
              
            </table>
            <br> <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td><strong>&lt;&lt; <a href="option.php" class="bodyfont style1">Return 
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
