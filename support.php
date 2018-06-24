<?php
include("object.php");
 $per=$obj4sitepermission->sitepermission();
 if($per=='1')
 {
include("includes/connect.php");

?>
<html>
<head>
<title><? echo $site_name ?> - Support</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr><td valign="top" background="images/GRAYBKG.gif" bgcolor="#333333">
    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" class="whitetxtcolor">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" class="whitetxtcolor"><strong>Please contact us with any questions.</strong></td>
    </tr>
    <tr>
      <td><img src="/images/spacer.gif" width="10" height="10"></td>
    </tr>
  </table>
  <br>
  <table width="70%" border="0" align="center" cellpadding="6" cellspacing="0" class="border1">
              <tr>
      <td align="left">For <strong>Customer Support</strong> 
	  <script language=javascript>

  <!--

  var contact = "click here"

  var email = "admin"

  var emailHost = "sc-media-group.com"

  document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost + "?Subject=sc-media-group%20Customer%20Support" + " class=WhiteLinks" + ">" + contact + "</a>" + ".")

  //-->

    </script></td>
    </tr>
    <tr>
      <td align="left" valign="top">For <strong>Shop Owner Support</strong> 
	  <script language=javascript>

  <!--

  var contact = "click here"

  var email = "admin"

  var emailHost = "sc-media-group.com"

  document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost + "?Subject=sc-media-group%20Account%20Support" + " class=WhiteLinks" + ">" + contact + "</a>" + ".")

  //-->

    </script></td>
    </tr>
  </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><br>
            </p>
</td>
</table>
</td></tr>
</table>
    <td align="left" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</body>
</html>
<?php } 
else {
echo "Not Permited";
}
?>