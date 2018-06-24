<?php
include("object.php");
 $per=$obj4sitepermission->sitepermission();
 if($per=='1')
 {
session_start(); 
include("includes/connect.php");

$mes="";
if(isset($_POST['B2']))
{
	$sql="select * from store_owner_information where store_id='$_POST[account]' and s_user_name ='$_POST[username]' and s_password='$_POST[password]' and user_type='store_owner'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	$row=mysql_fetch_array($result);
	$approved=$row['approved'];	
		if($count > '0' && $approved=='1') 
		{ 
		$_SESSION["store_id"]=$row["store_id"];
		$_SESSION["user_type"]=$row["user_type"];
		$_SESSION["name"]=$row["s_user_name"];
		$_SESSION["email"]=$row["s_email"];
		$_SESSION["phone"]=$row["s_phone"];
		$_SESSION["pay_to"]=$row["cheques_payable"];
		$_SESSION["store_name"]=$row["store_name"];
		header("location: welcome.php?val=accountsummary");
		exit();
		} 
		if($count > '0' && $approved=='0')
		{
	   	$mes = "Your account is out of service. Please contact your administrator.";
	 	}
		if($count=='0')
		{
	   	$mes = "Wrong store id, user name or password.";
	 	}	
}
?>
<html>
<head>
<title><? echo $site_name ?> - Store Owner Login</title>
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
<tr><td height="400" align="center" valign="top" background="images/GRAYBKG.gif">
<br>
<table width="70%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="whitetxtcolor"><strong>Store Owner Login</strong></td>
  </tr>
  <tr>
    <td><img src="/images/spacer.gif" width="10" height="10"></td>
  </tr>
  <tr>
    <td>If you have trouble logging into your store, please
      <script language=javascript>

  <!--

  var contact = "contact us"

  var email = "admin"

  var emailHost = "sc-media-group.com"

  document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost + "?Subject=**Store%20Owner%20Login%20Problem**" + " class=WhiteLinks" + ">" + contact + "</a>" + ".")

  //-->

    </script></td>
  </tr>
</table>
<br>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">

<tr>
	<td align="center"><? echo $msg;?></td>
</tr>
<tr>
	<td align="center" valign="top">
		<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                          <tr>  <form name="login" form method="POST" action="">
                            <td align="right" valign="top"> 
                             
                                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                                  <tr> </tr>
								  <tr>
                                    <td colspan="3" align="center" class="ErrorText"><? echo $mes; ?></td>
                                  </tr>
                                  <tr>
                                    <td width="5%" align="left" valign="top">&nbsp;</td>
                                    <td width="25%" align="left" valign="top"><strong>Store 
                                    ID:</strong></td>
                                    <td width="70%" align="left" valign="top"><input name="account" type="store id" class="input_field" size="20"></td>
                                  </tr>
                                  <tr>
                                    <td width="5%" align="left" valign="top">&nbsp;</td>
                                    <td width="25%" align="left" valign="top"><strong>User 
                                    Name:</strong></td>
                                    <td width="70%" align="left" valign="top"><input name="username" type="username" class="input_field" size="20"></td>
                                  </tr>
                                  <tr>
                                    <td width="5%" align="left" valign="top">&nbsp;</td>
                                    <td width="25%" align="left" valign="top"><strong>Password:</strong></td>
                                    <td width="70%" align="left" valign="top"><input name="password" type= "password" class="input_field" size="20"></td>
                                  </tr>
                                  <tr>
                                    <td width="5%" align="right" valign="top">&nbsp;</td>
                                    <td align="left" valign="top">&nbsp;</td>
                                    <td width="70%" height="35" align="left" valign="top"><input name="B2" type="submit" class="input_btn" value="Log In"> </td>
                              </table>
                            </td></form>
                      </tr>
                  </table></td>
</tr>
</table>
<table width="70%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="whitetxtcolor">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="/images/spacer.gif" width="10" height="10"></td>
  </tr>
</table>
<br></td>
</tr>
<tr>
    <td align="left" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>
</td></tr>
</table>
</body>
</html>
<?php } 
else {
echo "Not Permited";
}
?>