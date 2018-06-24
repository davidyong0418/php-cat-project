<?php session_start();
$time=time();

if(isset($_POST['submitbanner']))
{
	$querybanner="select * from banner_details where store_id='$_SESSION[store_id]'";
	$resultquery=mysql_query($querybanner) or die(mysql_error());
	if(mysql_num_rows($resultquery) < 1)
	{
		$postbanner="INSERT INTO banner_details set 
					 banner_name='$_POST[banner_name]',
					 alt_text='$_POST[alt_text]',
					 banner_file='$_POST[bannerfile]',
					 store_id='$_SESSION[store_id]'";
		mysql_query($postbanner) or die(mysql_error());
		$msg="Your changes have been updated.";
	}
	
	if(mysql_num_rows($resultquery) > 0)
	{
		$postbanner="UPDATE banner_details set 
					 banner_name='$_POST[banner_name]',
					 alt_text='$_POST[alt_text]',
					 banner_file='$_POST[bannerfile]'
					 where store_id='$_SESSION[store_id]'";
		mysql_query($postbanner) or die(mysql_error());
		$msg="Your changes have been updated.";
	}
}
$query="select * from banner_details where store_id='$_SESSION[store_id]'";
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);

?>
<link href="style/standard_admin_classes.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
.style2 {color: #FFFF00}
-->
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td></td>
                <td height="20" align="left"><font color="#FFFFCC"><strong><? echo $msg; ?></strong></font></td>
              </tr>
              <tr>
                <td></td>
                <td align="left">Store Setup: <strong>Manage Banner</strong>
                    <hr size="1" /></td>
              </tr>
              <tr>
                <td></td>
                <td align="left"><img src="images/spacer.gif" width="10" height="10" /></td>
              </tr>
              <tr>
                <td></td>
                <td height="20" align="left"><strong><span class="style2">Note:</span> Your banner MUST be 468 x 60 pixels. This utility will place your banner in the  rotation on the website home page. You may change the banner as often as you like. </strong></td>
              </tr>
              <tr>
                <td></td>
                <td align="left"><img src="images/spacer.gif" width="10" height="10" /></td>
              </tr>
              <tr>
                <td></td>
                <td height="20" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="28%" align="center">Your current banner:</td>
                    <td width="72%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <?php if($row['banner_file']!="")
						  { 
						   $ph =getcwd();
						   $path="/".$_SESSION["store_id"]."/clips/files/banner/";
						  ?>
						  <tr>
							<td width="80%" align="left" valign="middle" style="padding-top:5px;"><a href="shop.php?store_id=<?php echo $_SESSION['store_id']; ?>" target="_blank"><img src="<?php echo $path.$row['banner_file']; ?>" alt="<? echo $row['alt_text'];?>" border="0"></a></td> 
						  </tr>
						 <? }?>
					</table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td width="17"></td>
                <td width="100%" height="20" align="left">&nbsp;</td>
              </tr>
            </table>
    		<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#07183F">
              <tr>
                <td align="center">						   <form name="f1" action="" method="post">
						   <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
							  <tr>
								<td colspan="3" align="center">&nbsp;</td>
								
							  </tr>
							  
							  <tr>
								<td width="4%">&nbsp;</td>
								
								  <td width="27%" align="left"><strong>Banner Name:</strong></td>
											
							    <td width="69%" align="left"><input type="text" name="banner_name" class="input_field" value="<?php echo $row['banner_name']?>"></td>
							 </tr>
									<tr>
								  <td>&nbsp;</td>
									
								  <td align="left"><strong>ALT Text:</strong></td>
									<td align="left"><input name="alt_text" type="text" class="input_field" value="<?php echo $row['alt_text']?>"></td>
								</tr>
								<tr>
								  <td>&nbsp;</td>
									
								  <td align="left"><strong>Select a banner to post:</strong></td>
								  <td align="left">
										<select name="bannerfile">
											<? 
											$ph =getcwd();
											$path=$ph."/".$_SESSION["store_id"]."/clips/files/banner";
											if ($handle = opendir($path)) { ?>
												<option value="">Select banner</option>
												<?
												while (false !== ($file = readdir($handle)))
												{ 
												if($file!='.' && $file!='..')
												{
												?>
													<option value="<? echo $file; ?>"<?php if ($file==$row['banner_file']){echo "selected"; }?>><? echo $file; ?></option>
											 <? }
												}
												closedir($handle);
											}
										  ?>		
										</select>
									  &nbsp;<span class="style1">You must first upload a banner via FTP. </span></td>
								</tr>
								
								<tr>
									<td align="center">&nbsp;</td>
									<td align="center">&nbsp;</td>
									<td align="left" valign="middle"><input name="submitbanner" type="submit" class="input_btn" value="Save">&nbsp;<input name="reset" type="reset" class="input_btn" value="Reset"></td>
								</tr>
								<tr>
								  <td align="center">&nbsp;</td>
								  <td align="center">&nbsp;</td>
								  <td align="left" valign="middle">&nbsp;</td>
						     </tr>
				  </table>
						   </form></td>
              </tr>
            </table>
    		<table width="778" border="0" cellspacing="0" cellpadding="0">
			   <tr><td height="20" align="center"></td></tr>
			   <tr>
			   		<td align="center" style="padding-top:10px;"></td>
			   </tr>
			   <tr> 
				  <td> 
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr> 
						<td width="0%"></td>
						
					  </tr>
					</table>
				  </td>
			  </tr>
				<tr>
					<td width="90%" valign="top" align="center">
					

					   
					</td>
				</tr>
			
	   	</table>
	  </td>
  </tr>
</table>

