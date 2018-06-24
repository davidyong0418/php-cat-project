<?php ini_set("display_error",1);
session_start();
include("includes/connect.php");
$time=time();
$query2="select * from banner_details where store_id='$_SESSION[store_id]'";
$result2=mysql_query($query2) or die(mysql_error());
$count=mysql_num_rows($result2);


$msg="";
if(isset($_POST['submit']))
{	
	$datetime=date("F j, Y, g:i a");
	
	$bannerfile=$_FILES['banner_file']['name'];
	$imagefile=$_FILES['banner_file']['tmp_name'];
	$path=getcwd()."/banner/".$_FILES['banner_file']['name'];
	move_uploaded_file($imagefile,$path);
		
	$query="insert into banner_details set
			banner_name='$_POST[banner_name]',
			alt_text='$_POST[alt_text]',
			banner_file='$bannerfile',
			datetime='$datetime',
			store_id='$_SESSION[store_id]'";
	$result=mysql_query($query) or die(mysql_error());
	$qu="update store_owner_information set
		 updated_date='$time'
		 where store_id='$_SESSION[store_id]'";
	$rr=mysql_query($qu) or die(mysql_error());
	echo "<meta http-equiv='refresh' content='0 url=welcome.php?val=bannerdetails'>";
}

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

<form name="s_registration" method="post" action="" enctype="multipart/form-data" onSubmit="return checkvalidation();">
<table width="90%" border="0" align="center" cellpadding="6" cellspacing="0" class="border1">
              <tr>
                <td colspan="3" align="center"><font size="3" color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><? echo $msg; ?></font></td>
                
              </tr>
			  
              <tr>
                <td>&nbsp;</td>
				
      <td>Banner Name</td>
				
      <td><input type="text" name="banner_name" class="input_field" value=""></td>
			</tr>
		<tr>
	  <td>&nbsp;</td>
		
      <td>ALT Text</td>
		<td><input name="alt_text" type="text" class="input_field" value=""></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		
      <td>Banner File</td>
		<td><input type="file" name="banner_file" value=""></td>
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
</table>
</form>