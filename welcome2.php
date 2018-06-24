<?php session_start();
include("includes/connect.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? echo $site_name ?> - Store Admin</title>
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
<link rel="stylesheet" href="customer/style/style.css" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<SCRIPT LANGUAGE="JavaScript">

function replaceChars(entry) {
out = "'"; // replace this
add = "&#8217;"; // with this
temp = "" + entry; // temporary holder

while (temp.indexOf(out)>-1) {
pos= temp.indexOf(out);
temp = "" + (temp.substring(0, pos) + add + 
temp.substring((pos + out.length), temp.length));
}
document.f_add_clip.text.value = temp;
}

</script>
</head>

<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" rowspan="5" align="left" valign="top" bgcolor="#000000">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#000000" height="5"></td>
    <td rowspan="5" align="left" valign="top" bgcolor="#000000" width="5"></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php include("slogan.php");?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="20%" align="left" valign="top" bgcolor="#828282" class=""> 
            <? include("s_leftpanel.php"); ?>
          </td>
          <td width="" align="left" valign="top" bgcolor="#000000">&nbsp;</td>
          <td align="left" valign="top" width="80%" style="padding-top:8px; padding-bottom:8px;"><?php
		  		
		   if(isset($_SESSION) && $_SESSION['store_id']!=""){
		  
		  switch($_REQUEST['val'])
			{	
				case "chang_password":		
				include("chang_password.php");
				break;
				case "showclip":		
				include("showclip.php");
				break;
				case "addclip":		
				include("add_clip2.php");
				break;
				case "editclip":		
				include("edit_clip.php");
				break;
				case "customizeshop":		
				include("customize_shop.php");
				break;
				case "accountsummary":		
				include("account_details.php");
				break;
				case "editaccount":		
				include("edit_account.php");
				break;
				case "malinglist":		
				include("maling.php");
				break;
				case "confmail":		
				include("confmail.php");
				break;
				case "bannerdetails":		
				include("banner_details.php");
				break;
				case "addbanner":		
				include("add_banner.php");
				break;
				case "editbanner":		
				include("edit_banner.php");
				break;
				case "sale":		
				include("sale_id.php");
				break;
				case "categoryhome":		
				include("categoryhome.php");
				break;
				case "addcategory":		
				include("addcategory.php");
				break;
				case "payouthistory":		
				include("payouthistory.php");
				break;
				case "traffic":		
				include("traffic.php");
				break;
				case "header":		
				include("headerhtml.php");
				break;
				case "footer":		
				include("bottomhtml.php");
				break;
				case "configureshop":		
				include("configure_shop.php");
				break;
				case "clipsold":		
				include("clipsold.php");
				break;
				case "2257compliance":		
				include("2257compliance.php");
				break;
			}
		   }
			
			?></td>
		</tr>
		<tr><td height="1" align="left" valign="top" bgcolor="#565656"></td></tr>
      </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?  include("footer.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#000000" height="5"></td>
  </tr>
</table>
</body>
</html>