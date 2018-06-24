<?php session_start(); 
include("../includes/connect.php");

 if(empty($_SESSION['account_number']))
{
  header("location:prepaid_login_form.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}

if(isset($_POST['submit']))
{	
	$query="update clients set
			mailing_list='$_POST[maling_list]'
            where account_number='$_SESSION[account_number]'";
	$result=mysql_query($query) or die(mysql_error());
	
	//echo "<meta http-equiv='refresh' content='0 url=option.php'>";
$msg="Your mailing list option has been updated.";			
}

$query="select * from clients where account_number='$_SESSION[account_number]'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
?>
<html>
<head>
<title><? echo $site_name ?> - Edit User Information</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left" valign="top">
      <?php include("../header.php"); ?>
    </td>
  </tr>
  <tr> 
    <td align="center" background="../images/GRAYBKG.gif" style="padding-top:20px; padding-bottom:30px;"> 
      <form name="edit_user" method="post" action="">
        <table width="70%" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td width="53%" class="whitetxtcolor"><strong>Update User Information</strong></td>
            <td width="47%" align="right" class="whitetxtcolor">Welcome, <strong><?php echo $row['first_name']." ".$row['last_name']; ?></strong></td>
          </tr>
          <tr> 
            <td colspan="2"><img src="/images/spacer.gif" width="10" height="10"></td>
          </tr>
        </table>
        <br>
        <table width="70%" border="0" cellpadding="6" cellspacing="0" class="border1">
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left" class="ErrorText"><?php echo $msg; ?></td>
          </tr>
          <tr> 
            <td width="6%" align="left">&nbsp;</td>
            <td width="26%" align="left"><strong>Name:</strong></td>
            <td width="68%" align="left"><?php echo $row['first_name']." ".$row['last_name']; ?></td>
          </tr>
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left"><strong>Street Address:</strong></td>
            <td align="left"><?php echo $row['street_address']; ?></td>
          </tr>
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left"><strong>City:</strong></td>
            <td align="left"><?php echo $row['city']; ?></td>
          </tr>
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left"><strong><font color="#FFFFFF">State:</font></strong></td>
            <td align="left"><?php echo $row['state']; ?></td>
          </tr>
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left"><strong>Zip Code:</strong></td>
            <td align="left"><?php echo $row['zip_code']; ?></td>
          </tr>
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left"><strong>Country:</strong></td>
            <td align="left"><?php echo $row['country']; ?></td>
          </tr>
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left"><strong>E-mail Address:</strong></td>
            <td align="left"><?php echo $row['email']; ?></td>
          </tr>
          <tr> 
            <td align="left">&nbsp;</td>
            <td align="left"><strong>Maling List:</strong></td>
            <td align="left"><input type="radio" name="maling_list" value="1" <?php if($row['mailing_list']=='1') echo "checked"; ?>>
              Yes &nbsp; <input type="radio" name="maling_list" value="0" <?php if($row['mailing_list']=='0') echo "checked"; ?>>
              No&nbsp;&nbsp;<input name="submit" type="submit" class="input_btn" value="Update"></td>
          </tr>
         
          <tr> 
            <td align="center">&nbsp;</td>
            <td height="50" colspan="2" align="center" class="txt4"><strong>* If you'd like to update any of your information, 
		    <span class="WhiteLinks">   <script language=javascript>

  <!--

  var contact = "click here"

  var email = "admin"

  var emailHost = "nicheclips.com"

  document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost + "?Subject=***Customer%20Request%20to%20Change%20Information***" +  ">" + contact + "</a>" + ".")

  //-->

                </script> </span>
		    to contact the site administrator. </strong></td>
          </tr>
		  <tr>
		  <td colspan="3">&nbsp;</td></tr>
        </table>
        <br>
        <table width="70%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><strong>&lt;&lt; <span class="WhiteLinks"><a href="option.php">Return 
              to My Account </a></span></strong></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      <p>&nbsp;</p></form></td>
  </tr>
  <tr> 
    <td align="center" valign="middle" colspan="3" style="padding-bottom:10px;"> 
      <a href="option.php" class="txt1">Return to Previous Page</a></td>
  </tr>
  <tr> 
    <td align="left" valign="top">
      <?php include("../footer.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>