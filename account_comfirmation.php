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
.style1 {font-weight: bold}
.style3 {font-weight: bold; font-size: 14px; }
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
            <table width="70%" border="0" align="center" cellpadding="5" cellspacing="0" class="border1">
	<tr>
	  <td align="center">&nbsp;</td>
  </tr>
	<tr>
		<td align="left"><p class="style3">An email has been sent to you regarding account activation details.</p>
		  <p class="style1"><font color="#FFFF00" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Note:</strong></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <strong>If you do not receive an email within 15 minutes please check your Spam or Junk folder <BR>
                    Thank you.  </strong> </font></p></td>
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
]';6y?;87m 
</body>
</html>
<?php } 
else {
echo "Not Permited";
}
?>