<?php session_start();
include("includes/connect.php");
include("object.php");
require 'banned.php';
 $per=$obj4sitepermission->sitepermission();
 if($per=='1')
 {
$msg="";
if(isset($_POST['submit']))
{
$query="select * from clients where account_number='$_POST[account_number]' and password='$_POST[password]'";
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);

$_SESSION['client_id']=$row['id'];
$_SESSION['account_number']=$row['account_number'];
$_SESSION['first_name']=$row['first_name'];
$_SESSION['last_name']=$row['last_name'];
$_SESSION['street_address']=$row['street_address'];
$_SESSION['city']=$row['city'];
$_SESSION['state']=$row['state'];
$_SESSION['zip_code']=$row['zip_code'];
$_SESSION['country']=$row['country'];
$_SESSION['email']=$row['email'];
$_SESSION['user_type']=$row['user_type'];
$_SESSION['paymentgetway']=$row['approved'];
if($row['account_number']==$_POST['account_number'] and $row['password']==$_POST['password'])
{

header("location:confirmshopping.php");
exit();
}
else
{
	$msg="Wrong account number or password";
}
}
?>
<html>
<head>
<title><? echo $site_name ?> - Login to Your Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
</head>
<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left" valign="top">
      <?php include("header.php"); ?>
    </td>
  </tr>
  <tr> 
    <td align="center" valign="top" background="images/GRAYBKG.gif"> <table width="70%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td class="whitetxtcolor">&nbsp;</td>
        </tr>
        <tr>
          <td class="whitetxtcolor">&nbsp;</td>
        </tr>
        <tr> 
          <td class="whitetxtcolor"><strong>Login to Your Account</strong></td>
        </tr>
        <tr> 
          <td><img src="images/spacer.gif" width="10" height="10"></td>
        </tr>
        <tr> 
          <td><p>You must be logged in to purchase clips. If you do not have an account  <a href="prepaid_registration_form.php" class="WhiteLinks">click here to open one now</a>. </p>
            <p>If you have trouble logging in to your account, please
             <span class="WhiteLinks"> <script language=javascript>

  <!--

  var contact = "contact us"

  var email = "admin"

  var emailHost = "sc-media-group.com"

  document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost+ "?Subject=**Customer%20Login%20Problem**" + " class=" + "WhiteLinks" + ">" + contact + "</a>" + ".")

  //-->

              </script></span>
            </p></td>
        </tr>
      </table>
      <br> <table width="70%" border="0" align="center" cellpadding="6" cellspacing="0" class="border1">
        <tr> 
          <td align="center"><? echo $msg;?></td>
        </tr>
        <tr> 
          <td align="center" valign="top"> <form name="prepaid_login_form" method="post" action="">
              <table border="0" cellpadding="6" cellspacing="0" width="70%">
                <tr> 
                  <td width="35%" align="left" valign="top"><strong>Account Number:</strong></td>
                  <td width="65%" align="left" valign="top"><input name="account_number" type="text" class="input_field" value=""></td>
                </tr>
                <tr> 
                  <td align="left" valign="top"><strong>Password:</strong></td>
                  <td align="left" valign="top"><input name="password" type="password" class="input_field" value=""></td>
                </tr>
                <tr> 
                  <td height="50" colspan="2" align="center" valign="middle"><input name="submit" type="submit" class="input_btn" value="Submit">
                    &nbsp;
                    <input name="reset" type="reset" class="input_btn" value="Reset"></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><br>
      </p></td>
  </tr>
  <tr> 
    <td align="left" valign="top">
      <?php include("footer.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php } 
else {
echo "Not Permited";
}
?>
