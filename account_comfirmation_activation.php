<?php
include("object.php");
 $per=$obj4sitepermission->sitepermission();
 if($per=='1')
 {
include("includes/connect.php");

?>
<html>
<head>
<title><? echo $site_name ?> - Thank you for opening your account</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
<style type="text/css">
<!--
.style3 {font-weight: bold; font-size: 14px; }
.style4 {font-weight: bold; font-size: 16px; }
.style5 {font-weight: bold; font-size: 12px; }
-->
</style>
</head>
<body>
  <table cellpadding="0" cellspacing="0" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
  <td background="images/GRAYBKG.gif"><p>&nbsp;</p>
            <p>&nbsp;</p>
            <table width="79%" border="0" align="center" cellpadding="5" cellspacing="0" class="border1">
	<tr>
	  <td align="center">&nbsp;</td>
  </tr>
	<tr>
		<td align="left"><p class="style3"><strong><strong>Thank You for opening an account at sc-media-group.com. </strong></strong></p>
		  <p class="style3"><strong><strong>An email has been sent to you regarding account activation details. Please reply to the email to activate your account.</strong></strong></p>
		  <p class="style3"><strong><strong>Your name and address must be correct or your new account will be declined.</strong></strong></p>
		  <p class="style3"><strong><strong>Thank You</strong></strong></p>
		  <p class="style5"><font color="#FFFF00" face="Verdana, Arial, Helvetica, sans-serif"><strong>Note:</strong></font><font face="Verdana, Arial, Helvetica, sans-serif"><strong> 
                    <strong>If you do not receive an email within 15 minutes please check your Spam or Junk folder <BR>
                    Thank you.  </strong></strong></font><font face="Verdana, Arial, Helvetica, sans-serif"><strong><strong></strong></strong></font> </p></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
  </tr>
</table>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td></tr>
  </table>
</td></tr>
</table>
    <td align="left" valign="top"><?php include("includes/footer.php"); ?></td>
  </tr>
</body>
</html>
<?php } 
else {
echo "Not Permited";
}
?>