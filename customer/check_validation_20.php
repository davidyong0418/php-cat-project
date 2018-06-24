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
<title><? echo $site_name ?> - Fund by Credit Card</title>
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
.style6 {
	color: #000000;
	font-weight: bold;
}
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
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td height="111"><div class="border2" style="padding:5px"> 
                  <DIV class="style6">Online Check Validation:<BR>
                    As a new customer you   have reached your limit for online checks. As soon as your initial check clears   by our bank. This is a one time waiting process, you will have full access once the initial check has cleared. This  could take up  to 4 business days.</DIV>
                  <DIV class="style6">&nbsp;</DIV>
                  <DIV class="style6">Thank You for your understanding </DIV>
                  <p class="style2"><blink></blink><span class="txt2"><br>
                  </span></p>
                  </div></td>
              </tr>
            </table>
            <p><br>
            </p>
            <p>                <br> 
            </p>
            <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
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
