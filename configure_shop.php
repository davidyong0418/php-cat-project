<?php session_start();
$msg="";
if(isset($_POST['submit']))
{	
	$description=addslashes($_POST['desc']);
	$welcomemessage=addslashes($_POST['welcomemessage']);
	$query="update store_owner_information set
			store_name='$_POST[store_name]',
			s_email='$_POST[s_email]',
			email_outgoing_name='$_POST[outgoingname]',
			store_description='$description',
			welcome_message='$welcomemessage',
			category1='$_POST[category1]',
			category2='$_POST[category2]',
			category3='$_POST[category3]',
			category4='$_POST[category4]'
			where store_id='$_SESSION[store_id]'";
	$result=mysql_query($query) or die(mysql_error());
	$msg="Your changes have been saved";
}

$query="select * from  store_owner_information where store_id='$_SESSION[store_id]'";
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);

$storedescription=stripcslashes($row['store_description']);
$welcomemessage=stripcslashes($row['welcome_message']);

$sql="select * from category where store_id='0' order by categoryname";
$res1=mysql_query($sql);
$res2=mysql_query($sql);
$res3=mysql_query($sql);
$res4=mysql_query($sql);
?>
<script language="JavaScript">
function checkvalidation()
{
	if(document.s_registration.account_type.value=="")
	{
		alert("Please select a account type");
		document.s_registration.account_type.focus();
		return false;
	}
	if(document.s_registration.s_country.value=="")
	{
		alert("Please enter your country name");
		document.s_registration.s_country.focus();
		return false;
	}
	return true;
}
</script>
<style type="text/css">
<!--
.style1 {	color: #FFFFFF;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>

<form name="s_registration" method="post" action="" style="margin:0px;" onSubmit="return checkvalidation();">
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td></td>
      <td height="20" align="right"><a href='welcome.php?val=addcategory' class="style1"></a></td>
    </tr>
    <tr>
      <td></td>
      <td align="left">Store Setup: <strong>Configure Store</strong>
          <hr size="1" /></td>
    </tr>
    <tr>
      <td width="17"></td>
      <td width="100%" height="20" align="left">&nbsp;</td>
    </tr>
  </table>
  <table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#07183F">
  <tr>
    <td><table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
              <tr>
                <td colspan="3" align="center"><font size="2" color="#FFFF99" face="Verdana, Arial, Helvetica, sans-serif"><? echo $msg; ?></font></td>
              </tr>
			  <tr>
			    <td colspan="3">&nbsp;</td>
	      </tr>
		     <tr>
			  	<td width="3%">&nbsp;</td>
				<td width="42%"><strong>Enter Store Name:</strong></td>
			   <td width="55%"><input name="store_name" type="text" class="input_field" value="<? echo $row['store_name'];?>" size="50" maxlength="25"></td>
			</tr> 
              
			<tr>
			  	<td width="3%">&nbsp;</td>
				<td width="42%"><strong>E-mail to receive order information:</strong></td>
			  <td width="55%"><input name="s_email" type="text" class="input_field" value="<? echo $row['s_email'];?>" size="50"></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
				<td><strong>Name on outgoing E-mail:</strong></td>
				<td><input name="outgoingname" type="text" class="input_field" value="<? echo $row['email_outgoing_name'];?>" size="50"></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
				<td><strong>Enter Store Description:</strong></td>
				<td>
				  <textarea name="desc" cols="50" rows="2" class="input_field"><? echo $storedescription;?></textarea>				</td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
				<td><strong>Enter Your Welcome Message:</strong></td>
				<td>
				  <input name="welcomemessage" class="input_field" type="text" value="<? echo $welcomemessage;?>" size="50" maxlength="50" />				</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="2" align="left">&nbsp;</td>
    </tr>
			<tr>
	  			<td>&nbsp;</td>
				<td colspan="2" align="left"><strong>Pick up to 4 categories you want your store displayed in:</strong></td>
			</tr>
			<tr>
			  <td colspan="3" align="center"><img src="images/spacer.gif" width="6" height="6" /></td>
    </tr>
			<tr>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;</td>
				<td align="left" valign="middle"><input name="submit" type="submit" class="input_btn" value="Save">&nbsp;<input name="reset" type="reset" class="input_btn" value="Reset"></td>
			</tr>
			<tr>
			  <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>
			  <td align="left" valign="middle">&nbsp;</td>
    </tr>
  </table></td>
  </tr>
</table>

</form>