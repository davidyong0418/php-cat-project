<?php session_start();
$time=time();
$msg="";
$bannerfile="";

$query2="select * from banner_details where store_id='$_SESSION[store_id]' and banner_id='$_REQUEST[banner_id]'";
$result2=mysql_query($query2) or die(mysql_error());
$row2=mysql_fetch_array($result2);
$bannerfile=$row2['banner_file'];
if(isset($_POST['submit']))
{	
	$datetime=date("F j, Y, g:i a");
	
	if(!empty($_FILES['banner_file']['name']))
	{
	$bannerfile=$_FILES['banner_file']['name'];
	$imagefile=$_FILES['banner_file']['tmp_name'];
	$path=getcwd()."/storeowner/".$_SESSION['store_name']."/banner/".$_FILES['banner_file']['name'];
	move_uploaded_file($imagefile,$path);
	}	
	$query="update banner_details set
			banner_name='$_POST[banner_name]',
			alt_text='$_POST[alt_text]',
			banner_file='$bannerfile',
			datetime='$datetime',
			store_id='$_SESSION[store_id]'
			where banner_id='$_REQUEST[banner_id]'";
	$result=mysql_query($query) or die(mysql_error());
	$qu="update store_owner_information set
		 updated_date='$time'
		 where store_id='$_SESSION[store_id]'";
	$rr=mysql_query($qu) or die(mysql_error());
	$msg="Your changes has been saved";
}
$query="select * from banner_details where store_id='$_SESSION[store_id]' and banner_id='$_REQUEST[banner_id]'";
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);
$arr=explode("http://",$row['url']);
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
<? if(($count<2) || ($_REQUEST['q']=='edit'))
{ ?>
<form name="s_registration" method="post" action="" enctype="multipart/form-data" onSubmit="return checkvalidation();">
<table width="90%" border="0" align="center" cellpadding="6" cellspacing="0" class="border1">
              <tr>
                <td colspan="3" align="center"><font size="3" color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><? echo $msg; ?></font></td>
                
              </tr>
			  
              <tr>
                <td>&nbsp;</td>
				
      <td>Banner Name</td>
				
      <td><input type="text" name="banner_name" class="input_field" value="<? echo $row['banner_name']; ?>"></td>
			</tr>
		<tr>
	  <td>&nbsp;</td>
		
      <td>ALT Text</td>
		<td><input name="alt_text" type="text" class="input_field" value="<? echo $row['alt_text']; ?>"></td>
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
<? }?>