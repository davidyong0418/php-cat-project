
<?php session_start();
include("includes/connect.php");
$time=time();
$vedioname=$_REQUEST['vedioclip'];
$imagename=$_REQUEST['thumbimage'];
$preimage=$_REQUEST['previewimage'];
$id=$_REQUEST['clip_id'];
$activationdate=time(date('y-m-d'));

$msg="";
if((!empty($_POST["category"])) && (empty($_REQUEST['clip_id'])))
{	
	
	if(!empty($_POST['select2']))
	{
		$vedioname=$_POST['select2'];
	}
	$query="insert into vedio_clip set
			store_id='$_SESSION[store_id]',
			category='$_POST[category]',
			title=\"$_POST[title]\",
			description='$_POST[description]',
			vedio_file='$vedioname',
			vedio_format='$_POST[video_formate]',
			image_file='$imagename',
			pre_image='$preimage',
			running_time='$_POST[running_time]',
			price='$_POST[price]',
			display_order='$_POST[display_order]',
			drm='$_POST[drm]',
			available='$_POST[avablelity]',
			activation_date='$activationdate',
			size='$_POST[size]'";
	$result=mysql_query($query) or die(mysql_error());
	$qu="update store_owner_information set
		 updated_date='$time'
		 where store_id='$_SESSION[store_id]'";
	$rr=mysql_query($qu) or die(mysql_error());
	$msg="Your new clip has been added. You may now add additional clips or click the link on the side to View Online Store.";			
}

if((!empty($_POST["category"])) && (!empty($_REQUEST['clip_id'])))
{	
	
	if(!empty($_POST['select2']))
	{
		$vedioname=$_POST['select2'];
	}
	if(!empty($_POST['thumbimage']))
	{
		$imagename=$_POST['thumbimage'];
	}
	if(!empty($_POST['previewimage']))
	{
		$preimage=$_POST['previewimage'];
	}
	$query="update vedio_clip set
			store_id='$_SESSION[store_id]',
			category='$_POST[category]',
			title='$_POST[title]',
			description='$_POST[description]',
			vedio_file='$vedioname',
			vedio_format='$_POST[video_formate]',
			image_file='$imagename',
			pre_image='$preimage',
			running_time='$_POST[running_time]',
			price='$_POST[price]',
			display_order='$_POST[display_order]',
			drm='$_POST[drm]',
			available='$_POST[avablelity]',
			activation_date='$activationdate',
			size='$_POST[size]'
			where id='$id'";
	$result=mysql_query($query) or die(mysql_error());
	$qu="update store_owner_information set
		 updated_date='$time'
		 where store_id='$_SESSION[store_id]'";
	$rr=mysql_query($qu) or die(mysql_error());
	$msg="Your changes have been updated.";			
}

$query="select * from category where store_id='$_SESSION[store_id]' order by categoryname";
$result=mysql_query($query) or die(mysql_error());

$sqlquer="select * from vedio_clip where id='$_REQUEST[clip_id]'";
$resofsql=mysql_query($sqlquer) or die(mysql_error());
$recordofquery=mysql_fetch_array($resofsql);
?>
<script language="JavaScript">
function checkvalidation()
{
	if(document.f_add_clip.category.value=="")
	{
		alert("Please select a category name.");
		document.f_add_clip.category.focus();
		return false;
	}
	if(document.f_add_clip.title.value=="")
	{
		alert("Please enter a name for your clip.");
		document.f_add_clip.title.focus();
		return false;
	}
	if(document.f_add_clip.description.value=="")
	{
		alert("Please give a description about the clip.");
		document.f_add_clip.description.focus();
		return false;
	}
	if(document.f_add_clip.vedioclip.value=="")
	{
		alert("Please select a video clip.");
		document.f_add_clip.vedioclip.focus();
		return false;
	}
	if(document.f_add_clip.thumbimage.value=="")
	{
		alert("Please select a thumbnail image for the clip.");
		document.f_add_clip.thumbimage.focus();
		return false;
	}
	if(document.f_add_clip.previewimage.value=="")
	{
		alert("Please select a preview image for the clip.");
		document.f_add_clip.previewimage.focus();
		return false;
	}
	if(document.f_add_clip.video_formate.value=="")
	{
		alert("Please select a video format.");
		document.f_add_clip.video_formate.focus();
		return false;
	}
	if(document.f_add_clip.size.value=="")
	{
		alert("Please enter the file size of the clip.");
		document.f_add_clip.size.focus();
		return false;
	}
	if(document.f_add_clip.running_time.value=="")
	{
		alert("Please enter the running time of the clip.");
		document.f_add_clip.running_time.focus();
		return false;
	}
	
	if(document.f_add_clip.price.value=="")
	{
		alert("Please select a price for the clip.");
		document.f_add_clip.price.focus();
		return false;
	}
	if(document.f_add_clip.month.value=="")
	{
		alert("Please select a month.");
		document.f_add_clip.month.focus();
		return false;
	}
	if(document.f_add_clip.day.value=="")
	{
		alert("Please select a day.");
		document.f_add_clip.day.focus();
		return false;
	}
	if(document.f_add_clip.year.value=="")
	{
		alert("Please select a year.");
		document.f_add_clip.year.focus();
		return false;
	}
	if(document.f_add_clip.hour.value=="")
	{
		alert("Please select an hour.");
		document.f_add_clip.hour.focus();
		return false;
	}if(document.f_add_clip.minute.value=="")
	{
		alert("Please select a minute.");
		document.f_add_clip.minute.focus();
		return false;
	}
	if(document.f_add_clip.timeformate.value=="")
	{
		alert("Please select a time format.");
		document.f_add_clip.timeformate.focus();
		return false;
	}
}
</script>

<script language="JavaScript" type="text/javascript" src="editor/wysiwyg.js">
</script>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana;
	font-size: 12px;
	color:#FFFFFF
}
.border2{
	border:1px solid #C8A502;
	background-color:#FDE884;
	}
.style2 {
	font-family: Verdana;
	font-size: 12px;
	font-weight: bold;
	color:#FFFFFF
}

.style3 {
	font-family: Verdana;
	font-size: 10px;
	color:#FFFFFF
}
.style4 {
	color: #FF0000;
	font-weight: bold;
}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #FF0000;
}
.style6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
		color: #000000;
}
-->
</style>



<form name="f_add_clip" method="post" action="" enctype="multipart/form-data" onSubmit="return checkvalidation();">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
    
      <tr>
        <td align="left" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="images/spacer.gif" width="10" height="10" /></td>
          </tr>
          <tr>
            <td><font color="#FFFFCC"><strong><?php echo $msg; ?></strong></font></td>
          </tr>
          <tr>
            <td><span class="style1">Manage Products:</span> <span class="style2">Add New Clips</span>
        <hr size="1" /></td>
          </tr>
          <tr>
            <td><div class="style2">You must have already uploaded video clips, thumbnail images and previews through FTP to the server before you can add any products to your store.</div></td>
          </tr>
          <tr>
            <td><img src="images/spacer.gif" width="10" height="10" /></td>
          </tr>
        </table>
          
          <table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#565656">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="3" id="padding-left">
              <tr>
                <td colspan="3" align="left" valign="top" id="padding-left"><span class="style2"><img src="images/spacer.gif" width="10" height="6" /></span></td>
                </tr>
              <tr>
                <td width="3%" align="left" valign="top" id="padding-left"><img src="images/spacer.gif" width="10" height="10" /></td>
                <td width="21%" align="left" valign="top" id="padding-left"><span class="style2">Category:</span></td>
                <td width="76%" align="left" valign="top"><select name="category" style="width:200px" class="input_field">
                    <option value="">Select Category</option>
                    <? while($row=mysql_fetch_array($result))
			  		{ ?>
                    <option value="<? echo $row['id']?>"<?php if($row['id']==$recordofquery['category']){echo "selected"; }?>><? echo $row['categoryname']; ?></option>
                    <? }?>
                </select></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" valign="top" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" valign="top"><div class="border2"><span class="style5">**IMPORTANT**</span><br />
                  <span class="style6"><strong>Please</strong> <strong class="style5">DO NOT </strong><strong>use any type of single quote or apostrophe in your clip titles. </strong>Examples of what <strong>NOT</strong> to do are, &quot;Jane<span class="style4">'</span>s&quot;, &quot;I<span class="style4">'</span>m&quot;, &quot;I<span class="style4">'</span>ll&quot;, &quot;Don<span class="style4">'</span>t&quot;, etc. If you do put a single quote or an apostrophe in your clip title <strong>IT WILL NOT BE DOWNLOADABLE TO CUSTOMERS</strong>. We apologize for any inconvenience. We expect to have this issue resolved shortly. </span></div></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" valign="top" class="style2" id="padding-left">Title:</td>
                <td align="left" valign="top"><input name="title" type="text" class="input_field" value="" size="40" maxlength="40" />&nbsp;<a href="javascript:;" onclick="replaceChars(document.f_add_clip.text.value);" class="style1">Test</a></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" valign="middle" class="style2" id="padding-left">Description:</td>
                <td align="left" valign="top"><textarea id="textarea1" name="description" style="height: 170px; width: 420px;" class="input_field"><?php echo $recordofquery['description']; ?>

            </textarea>
                    <script language="JavaScript1.2" type="text/javascript">
  generate_wysiwyg('description');
              </script>                </td>
              </tr>
              <tr>
                <td colspan="3" align="left" valign="bottom" class="style2" id="padding-left"><img src="images/spacer.gif" width="10" height="6" /></td>
              </tr>
              <tr>
                <td align="left" valign="bottom" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" valign="bottom" class="style2" id="padding-left">Clip File:</td>
                <td align="left" valign="bottom"><? $clips=array();
				  	$ph =getcwd();
					$path=$ph."/".$_SESSION["store_id"]."/clips/files/dwnload_files";
					if ($handle = opendir($path))
					{
						while (false !== ($file = readdir($handle)))
						{ 
							if($file!='.' && $file!='..')
							{
								$clips[]=$file;
							}
					 	}
						closedir($handle);
					}
					sort($clips);
					?>
                    <select name="vedioclip" style="" class="input_field">
                      <option value="">Uploaded Clip</option>
                      <?php 
						foreach ($clips as $key => $val)
						{ ?>
                      <option value="<?php echo $val; ?>" <?php if ($val==$recordofquery['vedio_file']) echo "selected"; ?>><?php echo $val; ?></option>
                      <?php	}
						?>
                  </select>
                    <span class="style3">List will populate only if you have
                  uploaded your clips.</span></td>
              </tr>
              
              <tr>
                <td align="left" valign="bottom" nowrap="nowrap" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" valign="bottom" class="style2" id="padding-left">Thumbnail Image:</td>
                <td align="left" valign="top"><? $thumb=array();
				  	$ph =getcwd();
					$path=$ph."/".$_SESSION["store_id"]."/clips/files/img_files";
					if ($handle = opendir($path))
					{
						while (false !== ($file = readdir($handle)))
						{ 
							if($file!='.' && $file!='..')
							{
								$thumb[]=$file;
							}
					 	}
						closedir($handle);
					}
					sort($thumb);
					?>
                    <select name="thumbimage" style="" class="input_field">
                      <option value="">Uploaded Thumb Image</option>
                      <?php 
						foreach ($thumb as $key => $val)
						{ ?>
                      <option value="<?php echo $val; ?>" <?php if ($val==$recordofquery['image_file']) echo "selected"; ?>><?php echo $val; ?></option>
                      <?php	}
						?>
                  </select>
                    <span class="style3">List will only populate if you have
                  uploaded Thumb Images.</span></td>
              </tr>
              
              <tr>
                <td align="left" valign="bottom" nowrap="nowrap" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" valign="bottom" class="style2" id="padding-left">Preview Image:</td>
                <td align="left" valign="top"><? $preview=array();
				  	$ph =getcwd();
					$path=$ph."/".$_SESSION["store_id"]."/clips/files/preview_files";
					if ($handle = opendir($path))
					{
						while (false !== ($file = readdir($handle)))
						{ 
							if($file!='.' && $file!='..')
							{
								$preview[]=$file;
							}
					 	}
						closedir($handle);
					}
					sort($preview);
					?>
                    <select name="previewimage" class="input_field">
                      <option value="">Uploaded Preview Image</option>
                      <?php 
						foreach ($preview as $key => $val)
						{ ?>
                      <option value="<?php echo $val; ?>" <?php if ($val==$recordofquery['pre_image']) echo "selected"; ?>><?php echo $val; ?></option>
                      <?php	}
						?>
                  </select>
                    <span class="style3">List will only populate if you have
                  uploaded Preview Images.</span></td>
              </tr>
              
              <tr>
                <td align="left" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" class="style2" id="padding-left">Video Format:</td>
                <td align="left" valign="top"><select name="video_formate" style="" class="input_field">
                    <option value="">Select Format</option>
                    <option value=".AVI"<?php if($recordofquery['vedio_format']=='.AVI'){ echo "selected";} ?>>AVI</option>
                  <br>
                    <option value=".DIVX"<?php if($recordofquery['vedio_format']=='.DIVX'){ echo "selected";} ?>>DIVX</option>
                    <option value=".WMV"<?php if($recordofquery['vedio_format']=='.WMV'){ echo "selected";} ?>>WMV</option>
                    <option value=".MPEG"<?php if($recordofquery['vedio_format']=='.MPEG'){ echo "selected";} ?>>MPEG</option>
                    <option value=".MOV"<?php if($recordofquery['vedio_format']=='.MOV'){ echo "selected";} ?>>MOV</option>
                    <option value=".RM"<?php if($recordofquery['vedio_format']=='.RM'){ echo "selected";} ?>>RM</option>
                </select></td>
              </tr>
              <tr>
                <td align="left" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" class="style2" id="padding-left">File Size:</td>
                <td align="left" valign="top"><input name="size" type="text" class="input_field" value="<?php echo $recordofquery['size']?>" size="7" maxlength="7" />
                    <span class="style1"> MB</span></td>
              </tr>
              <tr>
                <td align="left" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" class="style2" id="padding-left">Running Time:</td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="5%" height="22"><input name="running_time" type="text" class="input_field" value="<?php echo $recordofquery['running_time']?>" size="7" maxlength="7" /></td>
                      <td width="95%" class="style1">&nbsp;Minutes</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" class="style2" id="padding-left">Price:</td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="35%" align="left" valign="top"><select name="price" class="input_field">
                          <option value="">Select Price</option>
                          <option value="1.00"<?php if($recordofquery['price']=='1.00'){ echo "selected";} ?>>1.00 </option>
                        <option value="2.00"<?php if($recordofquery['price']=='2.00'){ echo "selected";} ?>>2.00 </option>
                        <option value="3.00"<?php if($recordofquery['price']=='3.00'){ echo "selected";} ?>>3.00 </option>
                        <option value="4.00"<?php if($recordofquery['price']=='4.00'){ echo "selected";} ?>>4.00 </option>
                        <option value="5.00"<?php if($recordofquery['price']=='5.00'){ echo "selected";} ?>>5.00 </option>
                        <option value="6.00"<?php if($recordofquery['price']=='6.00'){ echo "selected";} ?>>6.00 </option>
                        <option value="7.00"<?php if($recordofquery['price']=='7.00'){ echo "selected";} ?>>7.00 </option>
                        <option value="8.00"<?php if($recordofquery['price']=='8.00'){ echo "selected";} ?>>8.00 </option>
                        <option value="9.00"<?php if($recordofquery['price']=='9.00'){ echo "selected";} ?>>9.00 </option>
                        <option value="10.00"<?php if($recordofquery['price']=='10.00'){ echo "selected";} ?>>10.00 </option>
                        <option value="11.00"<?php if($recordofquery['price']=='11.00'){ echo "selected";} ?>>11.00 </option>
                        <option value="12.00"<?php if($recordofquery['price']=='12.00'){ echo "selected";} ?>>12.00 </option>
                        <option value="13.00"<?php if($recordofquery['price']=='13.00'){ echo "selected";} ?>>13.00 </option>
                        <option value="14.00"<?php if($recordofquery['price']=='14.00'){ echo "selected";} ?>>14.00 </option>
                        <option value="15.00"<?php if($recordofquery['price']=='15.00'){ echo "selected";} ?>>15.00 </option>
                        <option value="16.00"<?php if($recordofquery['price']=='16.00'){ echo "selected";} ?>>16.00 </option>
                        <option value="17.00"<?php if($recordofquery['price']=='17.00'){ echo "selected";} ?>>17.00 </option>
                        <option value="18.00"<?php if($recordofquery['price']=='18.00'){ echo "selected";} ?>>18.00 </option>
                        <option value="19.00"<?php if($recordofquery['price']=='19.00'){ echo "selected";} ?>>19.00 </option>
                        <option value="20.00"<?php if($recordofquery['price']=='20.00'){ echo "selected";} ?>>20.00 </option>
                        <option value="21.00"<?php if($recordofquery['price']=='21.00'){ echo "selected";} ?>>21.00 </option>
                        <option value="22.00"<?php if($recordofquery['price']=='22.00'){ echo "selected";} ?>>22.00 </option>
                        <option value="23.00"<?php if($recordofquery['price']=='23.00'){ echo "selected";} ?>>23.00 </option>
                        <option value="24.00"<?php if($recordofquery['price']=='24.00'){ echo "selected";} ?>>24.00 </option>
                        <option value="25.00"<?php if($recordofquery['price']=='25.00'){ echo "selected";} ?>>25.00 </option>
                        <option value="26.00"<?php if($recordofquery['price']=='26.00'){ echo "selected";} ?>>26.00 </option>
                        <option value="27.00"<?php if($recordofquery['price']=='27.00'){ echo "selected";} ?>>27.00 </option>
                        <option value="28.00"<?php if($recordofquery['price']=='28.00'){ echo "selected";} ?>>28.00 </option>
                        <option value="29.00"<?php if($recordofquery['price']=='29.00'){ echo "selected";} ?>>29.00 </option>
                        <option value="30.00"<?php if($recordofquery['price']=='30.00'){ echo "selected";} ?>>30.00 </option>
                        <option value="31.00"<?php if($recordofquery['price']=='31.00'){ echo "selected";} ?>>31.00 </option>
                        <option value="33.00"<?php if($recordofquery['price']=='33.00'){ echo "selected";} ?>>33.00 </option>
                        <option value="35.00"<?php if($recordofquery['price']=='35.00'){ echo "selected";} ?>>36.00 </option>
                        <option value="37.00"<?php if($recordofquery['price']=='37.00'){ echo "selected";} ?>>37.00 </option>
                        <option value="39.00"<?php if($recordofquery['price']=='39.00'){ echo "selected";} ?>>39.00 </option>
                        <option value="40.00"<?php if($recordofquery['price']=='40.00'){ echo "selected";} ?>>40.00 </option>
                        <option value="41.00"<?php if($recordofquery['price']=='41.00'){ echo "selected";} ?>>41.00 </option>
                        <option value="43.00"<?php if($recordofquery['price']=='43.00'){ echo "selected";} ?>>43.00 </option>
                        <option value="45.00"<?php if($recordofquery['price']=='45.00'){ echo "selected";} ?>>45.00 </option>
                        <option value="47.00"<?php if($recordofquery['price']=='47.00'){ echo "selected";} ?>>47.00 </option>
                        <option value="49.00"<?php if($recordofquery['price']=='49.00'){ echo "selected";} ?>>49.00 </option>
                        <option value="50.00"<?php if($recordofquery['price']=='50.00'){ echo "selected";} ?>>50.00 </option>
                        <option value="55.00"<?php if($recordofquery['price']=='55.00'){ echo "selected";} ?>>55.00 </option>
                        <option value="60.00"<?php if($recordofquery['price']=='60.00'){ echo "selected";} ?>>60.00 </option>
                      </select></td>
                      <td width="65%">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" class="style2" id="padding-left">&nbsp;</td>
                <td align="left" class="style2" id="padding-left">Available:</td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="3%" align="left" valign="middle"><input name="avablelity" type="checkbox" value="1" checked="checked" <?php if($recordofquery['available']=='1'){echo "checked"; }; ?>></td>
                      <td width="97%" align="left" class="style1">Make clip available for sale. </td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" id="padding-left">&nbsp;</td>
                <td align="left" id="padding-left">&nbsp;</td>
                <td height="45" align="left">
				<input  type="image" id="Add clip" src="images/add-clip1.gif" align="left" ></td>
              </tr>
            </table>
            <img src="images/spacer.gif" width="6" height="6" /></td>
          </tr>
        </table></td>
      </tr>
 </table>
</form>