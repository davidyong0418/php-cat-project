<?php session_start();
include("includes/connect.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? echo $site_name ?> - Home</title>
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
</head>

<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="border-bottom:#000000 solid thin"><img src="images/CFZLogo_Splashpg.jpg" alt="sc-media-group.com Logo" width="1004" height="174" /></td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top" background="images/SideBkg.gif">
          <table width="706" border="0" align="center">
            <tr>
              <td width="700" height="35">&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td><table width="644" border="0" align="center">
                  <tr>
                    <td width="314"><p align="center" class="txt4"><strong>I agree and wish to</strong></p></td>
                    <td width="320"><p align="center" class="txt4"><strong>I do not agree and wish 
                      to</strong></p></td>
                  </tr>
                  <tr>
                    <td align="center"><div align="center" id="BalanceBox" style="width:80px"><span class="LinkText"><a href="http://sc-media-group.com/index2.php">ENTER</a></span></div></td>
                    <td align="center"><div align="center" id="BalanceBox2" style="width:80px"><span class="LinkText"><a href="http://www.google.com">EXIT</a></span></div></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <p>&nbsp;</p></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php include("footer.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#000000" height="5"></td>
  </tr>
</table>
</body>
</html>