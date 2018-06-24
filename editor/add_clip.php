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
			size='$_POST[size]'";
	$result=mysql_query($query) or die(mysql_error());
	$qu="update store_owner_information set
		 updated_date='$time'
		 where store_id='$_SESSION[store_id]'";
	$rr=mysql_query($qu) or die(mysql_error());
	$msg="Your changes has been saved";			
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
	$msg="Your changes has been updated";			
}

$query="select * from category where store_id='$_SESSION[store_id]'";
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
		alert("Please select a category name");
		document.f_add_clip.category.focus();
		return false;
	}
	if(document.f_add_clip.title.value=="")
	{
		alert("Please enter a name for clip");
		document.f_add_clip.title.focus();
		return false;
	}
	if(document.f_add_clip.description.value=="")
	{
		alert("Please give a description about the clip");
		document.f_add_clip.description.focus();
		return false;
	}
	if(document.f_add_clip.vedioclip.value=="")
	{
		alert("Please select a vedio clip");
		document.f_add_clip.vedioclip.focus();
		return false;
	}
	if(document.f_add_clip.thumbimage.value=="")
	{
		alert("Please select a thumb image for the clip");
		document.f_add_clip.thumbimage.focus();
		return false;
	}
	if(document.f_add_clip.previewimage.value=="")
	{
		alert("Please select a preview image for the clip");
		document.f_add_clip.previewimage.focus();
		return false;
	}
	if(document.f_add_clip.video_formate.value=="")
	{
		alert("Please select a vedio formate");
		document.f_add_clip.video_formate.focus();
		return false;
	}
	if(document.f_add_clip.size.value=="")
	{
		alert("Please enter the size of the clip");
		document.f_add_clip.size.focus();
		return false;
	}
	if(document.f_add_clip.running_time.value=="")
	{
		alert("Please enter the running time of the clip");
		document.f_add_clip.running_time.focus();
		return false;
	}
	
	if(document.f_add_clip.price.value=="")
	{
		alert("Please select a price for the clip");
		document.f_add_clip.price.focus();
		return false;
	}
	if(document.f_add_clip.month.value=="")
	{
		alert("Please select a month");
		document.f_add_clip.month.focus();
		return false;
	}
	if(document.f_add_clip.day.value=="")
	{
		alert("Please select a day");
		document.f_add_clip.day.focus();
		return false;
	}
	if(document.f_add_clip.year.value=="")
	{
		alert("Please select a year");
		document.f_add_clip.year.focus();
		return false;
	}
	if(document.f_add_clip.hour.value=="")
	{
		alert("Please select a hour");
		document.f_add_clip.hour.focus();
		return false;
	}if(document.f_add_clip.minute.value=="")
	{
		alert("Please select a minute");
		document.f_add_clip.minute.focus();
		return false;
	}
	if(document.f_add_clip.timeformate.value=="")
	{
		alert("Please select a timeformate");
		document.f_add_clip.timeformate.focus();
		return false;
	}
}
</script>

<script language="JavaScript" type="text/javascript" src="wysiwyg.js">
</script>


<form name="f_add_clip" method="post" action="" enctype="multipart/form-data" onSubmit="return checkvalidation();">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td height="5" align="left"><?php echo $msg; ?></td>
      </tr>
      <tr>
        <td align="left" valign="top"><img src="images/new-clip.gif" width="117" height="30" /></td>
      </tr>
      
      
    <tr> 
      <td align="left" valign="top" >You must FTP some 
        clip up to the server before you can add a clip product to your store! 
      </td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3" id="padding-left">
          <tr>
            <td width="14%" align="left" valign="top" id="padding-left">Category</td>
            <td width="86%" align="left" valign="top">
			<select name="category" style="width:200px" class="txtbox">
            <option value="">All Natural</option>  	
			  <? while($row=mysql_fetch_array($result))
			  		{ ?>
					<option value="<? echo $row['id']?>"<?php if($row['id']==$recordofquery['category']){echo "selected"; }?>><? echo $row['categoryname']; ?></option>
					<? }?>
            </select></td>
          </tr>
          <tr>
            <td align="left" valign="top" id="padding-left">Title</td>
            <td align="left" valign="top"><input name="title" type="text" class="field" value="<?php echo $recordofquery['title']; ?>"></td>
          </tr>
          <tr>
            <td align="left" id="padding-left">Description</td>
            <td align="left" valign="top"><textarea id="textarea1" name="description" style="height: 170px; width: 500px;"><?php echo $recordofquery['description']; ?>

</textarea>
<script language="javascript1.2">
  generate_wysiwyg('textarea1');
</script>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</td>
          </tr>
          <tr>
            <td align="left" valign="middle" id="padding-left">Clip File </td>
            <td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13%"><select name="vedioclip" style="" class="txtbox">
                  <? 
				  	$ph =getcwd();
					$path=$ph."/storeowner/".$_SESSION["store_id"]."/clips";
					if ($handle = opendir($path)) { ?>
						<option value="">Uploaded Clip</option>
						<?
						while (false !== ($file = readdir($handle)))
						{ 
						if($file!='.' && $file!='..')
						{
						?>
							<option value="<? echo $file; ?>"<?php if ($file==$recordofquery['vedio_file']){echo "selected"; }?>><? echo $file; ?></option>
					 <? }
					 	}
						closedir($handle);
					}
				  ?>
                </select></td>
                <td width="87%"><strong> This list will only be populated, if you have clips uploaded  through FTP</strong></td>
              </tr>
            </table></td>
          </tr>
		  <tr>
		  	<td align="left" id="padding-left">Thumb Image</td>
			<td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13%"><select name="thumbimage" style="" class="txtbox">
                  <? 
				  	$ph =getcwd();
					$path=$ph."/storeowner/".$_SESSION["store_id"]."/thumbs";
					if ($handle = opendir($path)) { ?>
						<option value="">Uploaded Thumb Image</option>
						<?
						while (false !== ($file = readdir($handle)))
						{ 
						if($file!='.' && $file!='..')
						{
						?>
							<option value="<? echo $file; ?>" <?php if ($file==$recordofquery['image_file']){echo "selected"; }?>><? echo $file; ?></option>
					 <? }
					 	}
						closedir($handle);
					}
				  ?>
                </select></td>
                <td width="87%"><strong> This list will only be populated, if you have clips uploaded  through FTP</strong></td>
              </tr>
            </table>
			</td>
		  </tr>
		  <tr>
		  	<td align="left" id="padding-left">Preview Image</td>
			<td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13%"><select name="previewimage" style="" class="txtbox">
                  <? 
				  	$ph =getcwd();
					$path=$ph."/storeowner/".$_SESSION["store_id"]."/preview";
					if ($handle = opendir($path)) { ?>
						<option value="">Uploaded Preview Image</option>
						<?
						while (false !== ($file = readdir($handle)))
						{ 
						if($file!='.' && $file!='..')
						{
						?>
							<option value="<? echo $file; ?>"<?php if ($file==$recordofquery['pre_image']){echo "selected"; }?>><? echo $file; ?></option>
					 <? }
					 	}
						closedir($handle);
					}
				  ?>
                </select></td>
                <td width="87%"><strong> This list will only be populated, if you have clips uploaded  through FTP</strong></td>
              </tr>
            </table>
			</td>
		  </tr>
          <tr>
            <td align="left" id="padding-left">Video Format </td>
            <td align="left" valign="top"><select name="video_formate" style="" class="txtbox">
               <option value="">Select Format</option>
               <option value=".3gp"<?php if($recordofquery['vedio_format']=='.3gp'){ echo "selected";} ?>>3GPP</option>
               <option value=".asf"<?php if($recordofquery['vedio_format']=='.asf'){ echo "selected";} ?>>ASF</option>
			   <option value=".avi"<?php if($recordofquery['vedio_format']=='.avi'){ echo "selected";} ?>>AVI</option>
               <option value=".mov"<?php if($recordofquery['vedio_format']=='.mov'){ echo "selected";} ?>>MOV</option>
               <option value=".mp4"<?php if($recordofquery['vedio_format']=='.mp4'){ echo "selected";} ?>>MPEG-4</option>
			   <option value=".mpg"<?php if($recordofquery['vedio_format']=='.mpg'){ echo "selected";} ?>>MPEG</option>
               <option value=".qt"<?php if($recordofquery['vedio_format']=='.qt'){ echo "selected";} ?>>QT</option>
			   <option value=".rm"<?php if($recordofquery['vedio_format']=='.rm'){ echo "selected";} ?>>RM</option>
               <option value=".rmvb"<?php if($recordofquery['vedio_format']=='.rmvb'){ echo "selected";} ?>>RMVB</option>
			   <option value=".swf"<?php if($recordofquery['vedio_format']=='.swf'){ echo "selected";} ?>>SWF</option>
               <option value=".wmv"<?php if($recordofquery['vedio_format']=='.wmv'){ echo "selected";} ?>>WMV</option>
			</select></td>
          </tr>
          <tr>
            <td align="left" id="padding-left">Size</td>
            <td align="left" valign="top"><input type="text" name="size" value="<?php echo $recordofquery['size']?>"></td>
          </tr>
          <tr>
            <td align="left" id="padding-left">Running Time </td>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                  <td width="14%"><input type="text" name="running_time" class="txtbox" value="<?php echo $recordofquery['running_time']?>"></td>
                <td width="86%">Minute</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" id="padding-left">Price</td>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="35%" align="left" valign="top"><select name="price" class="txtbox">
                    <option value="">Select Price</option>
                    <option value="1.00"<?php if($recordofquery['price']=='1.00'){ echo "selected";} ?>>1.00
					<option value="2.00"<?php if($recordofquery['price']=='2.00'){ echo "selected";} ?>>2.00
					<option value="3.00"<?php if($recordofquery['price']=='3.00'){ echo "selected";} ?>>3.00
					<option value="4.00"<?php if($recordofquery['price']=='4.00'){ echo "selected";} ?>>4.00
					<option value="5.00"<?php if($recordofquery['price']=='5.00'){ echo "selected";} ?>>5.00
					<option value="6.00"<?php if($recordofquery['price']=='6.00'){ echo "selected";} ?>>6.00
					<option value="7.00"<?php if($recordofquery['price']=='7.00'){ echo "selected";} ?>>7.00
					<option value="8.00"<?php if($recordofquery['price']=='8.00'){ echo "selected";} ?>>8.00
					<option value="9.00"<?php if($recordofquery['price']=='9.00'){ echo "selected";} ?>>9.00
					<option value="10.00"<?php if($recordofquery['price']=='10.00'){ echo "selected";} ?>>10.00 
					<option value="11.00"<?php if($recordofquery['price']=='11.00'){ echo "selected";} ?>>11.00 
					<option value="12.00"<?php if($recordofquery['price']=='12.00'){ echo "selected";} ?>>12.00 
					<option value="13.00"<?php if($recordofquery['price']=='13.00'){ echo "selected";} ?>>13.00 
					<option value="14.00"<?php if($recordofquery['price']=='14.00'){ echo "selected";} ?>>14.00 
					<option value="15.00"<?php if($recordofquery['price']=='15.00'){ echo "selected";} ?>>15.00 
					<option value="16.00"<?php if($recordofquery['price']=='16.00'){ echo "selected";} ?>>16.00 
					<option value="17.00"<?php if($recordofquery['price']=='17.00'){ echo "selected";} ?>>17.00 
					<option value="18.00"<?php if($recordofquery['price']=='18.00'){ echo "selected";} ?>>18.00 
					<option value="19.00"<?php if($recordofquery['price']=='19.00'){ echo "selected";} ?>>19.00 
					<option value="20.00"<?php if($recordofquery['price']=='20.00'){ echo "selected";} ?>>20.00 
					<option value="21.00"<?php if($recordofquery['price']=='21.00'){ echo "selected";} ?>>21.00 
					<option value="22.00"<?php if($recordofquery['price']=='22.00'){ echo "selected";} ?>>22.00 
					<option value="23.00"<?php if($recordofquery['price']=='23.00'){ echo "selected";} ?>>23.00  
					<option value="24.00"<?php if($recordofquery['price']=='24.00'){ echo "selected";} ?>>24.00  
					<option value="25.00"<?php if($recordofquery['price']=='25.00'){ echo "selected";} ?>>25.00  
					<option value="26.00"<?php if($recordofquery['price']=='26.00'){ echo "selected";} ?>>26.00 
					<option value="27.00"<?php if($recordofquery['price']=='27.00'){ echo "selected";} ?>>27.00 
					<option value="28.00"<?php if($recordofquery['price']=='28.00'){ echo "selected";} ?>>28.00 
					<option value="29.00"<?php if($recordofquery['price']=='29.00'){ echo "selected";} ?>>29.00 
					<option value="30.00"<?php if($recordofquery['price']=='30.00'){ echo "selected";} ?>>30.00
					<option value="31.00"<?php if($recordofquery['price']=='31.00'){ echo "selected";} ?>>31.00
					<option value="33.00"<?php if($recordofquery['price']=='33.00'){ echo "selected";} ?>>33.00
					<option value="35.00"<?php if($recordofquery['price']=='35.00'){ echo "selected";} ?>>36.00
					<option value="37.00"<?php if($recordofquery['price']=='37.00'){ echo "selected";} ?>>37.00
					<option value="39.00"<?php if($recordofquery['price']=='39.00'){ echo "selected";} ?>>39.00
					<option value="40.00"<?php if($recordofquery['price']=='40.00'){ echo "selected";} ?>>40.00
					<option value="41.00"<?php if($recordofquery['price']=='41.00'){ echo "selected";} ?>>41.00
					<option value="43.00"<?php if($recordofquery['price']=='43.00'){ echo "selected";} ?>>43.00
					<option value="45.00"<?php if($recordofquery['price']=='45.00'){ echo "selected";} ?>>45.00 
					<option value="47.00"<?php if($recordofquery['price']=='47.00'){ echo "selected";} ?>>47.00
					<option value="49.00"<?php if($recordofquery['price']=='49.00'){ echo "selected";} ?>>49.00
					<option value="50.00"<?php if($recordofquery['price']=='50.00'){ echo "selected";} ?>>50.00 
					<option value="55.00"<?php if($recordofquery['price']=='55.00'){ echo "selected";} ?>>55.00
					<option value="60.00"<?php if($recordofquery['price']=='60.00'){ echo "selected";} ?>>60.00
					
                </select></td>
                  <td width="65%">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" id="padding-left">Display Order</td>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="17%" align="left"><input name="display_order" type="text" class="field1" value="<?php echo $recordofquery['display_order']; ?>"></td>
                <td width="83%">Smaller values display first </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" id="padding-left">Available</td>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="3%" align="left" valign="middle"><input type="checkbox" name="avablelity" value="1" <?php if($recordofquery['available']=='1'){echo "checked"; }; ?> ></td>
                <td width="97%" align="left">Make clip available for sale. </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <!--<td align="left" id="padding-left">Future Activation</td>-->
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <!--<tr>
                <td width="3%" align="left" valign="middle"><input type="checkbox" name="future_activation" value="1" /></td>
                <td width="97%" align="left">Automatically activate this clip in the future. </td>
              </tr>-->
            </table></td>
          </tr>
          <tr>
            <!--<td align="left" id="padding-left">Activate on </td>-->
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <!-- 
			  <tr>
                <td width="58" align="left" valign="middle"><select name="month" class="txtbox">
                  <option value="">Mon</option>
				  <option value="jan">January</option>
				  <option value="feb">February </option>
				  <option value="mar">March</option>
				  <option value="apr">April</option>
				  <option value="may">May</option>
				  <option value="jun">June</option>
				  <option value="jul">July</option>
				  <option value="aug">August</option>
				  <option value="sep">September</option>
				  <option value="oct">October</option>
				  <option value="nov">November</option>
				  <option value="dec">December</option>
				 </select></td>
                <td width="15" align="center">/</td>
                <td width="58" align="center"><select name="day" style="" class="txtbox">
                  <option value="">Day</option>
				  <option value="1">01</option>
				  <option value="2">02</option>
				  <option value="3">03</option>
				  <option value="4">04</option>
				  <option value="5">05</option>
				  <option value="6">06</option>
				  <option value="7">07</option>
				  <option value="8">08</option>
				  <option value="9">09</option>
				  <option value="10">10</option>
				  <option value="11">11</option>
				  <option value="12">12</option>
				  <option value="13">13</option>
				  <option value="14">14</option>
				  <option value="15">15</option>
				  <option value="16">16</option>
				  <option value="17">17</option>
				  <option value="18">18</option>
				  <option value="19">19</option>
				  <option value="20">20</option>
				  <option value="21">21</option>
				  <option value="22">22</option>
				  <option value="23">23</option>
				  <option value="24">24</option>
				  <option value="25">25</option>
				  <option value="26">26</option>
				  <option value="27">27</option>
				  <option value="28">28</option>
				  <option value="29">29</option>
				  <option value="30">30</option>
				  <option value="31">31</option>
				</select></td>
                <td width="15" align="center">/</td>
                <td width="68" align="left"><select name="year" style="" class="txtbox">
                    <option value="">Year</option>
					<option value="07">2007</option>
					<option value="08">2008</option>
					<option value="09">2009</option>
					<option value="10">2010</option>
					
                </select></td>
                <td width="66" align="left"><select name="hour" style="" class="txtbox">
                  <option value="">Hour</option>
				  <option value="01">01</option>
				  <option value="02">02</option>
				  <option value="03">03</option>
				  <option value="04">04</option>
				  <option value="05">05</option>
				  <option value="06">06</option>
				  <option value="07">07</option>
				  <option value="08">08</option>
				  <option value="09">09</option>
				  <option value="10">10</option>
				  <option value="11">11</option>
				  <option value="12">12</option>
                </select></td>
                <td width="10" align="center"><strong>:</strong></td>
                <td width="63" align="left"><select name="minute" style="" class="txtbox">
                  <option value="">Min</option>
				  <option value="01">01</option>
				  <option value="02">02</option>
				  <option value="03">03</option>
				  <option value="04">04</option>
				  <option value="05">05</option>
				  <option value="06">06</option>
				  <option value="07">07</option>
				  <option value="08">08</option>
				  <option value="09">09</option>
				  <option value="10">10</option>
				  <option value="11">11</option>
				  <option value="12">12</option>
				  <option value="13">13</option>
				  <option value="14">14</option>
				  <option value="15">15</option>
				  <option value="16">16</option>
				  <option value="17">17</option>
				  <option value="18">18</option>
				  <option value="19">19</option>
				  <option value="20">20</option>
				  <option value="21">21</option>
				  <option value="22">22</option>
				  <option value="23">23</option>
				  <option value="24">24</option>
				  <option value="25">25</option>
				  <option value="26">26</option>
				  <option value="27">27</option>
				  <option value="28">28</option>
				  <option value="29">29</option>
				  <option value="30">30</option>
				  <option value="31">31</option>
				  <option value="32">32</option>
				  <option value="33">33</option>
				  <option value="34">34</option>
				  <option value="35">35</option>
				  <option value="36">36</option>
				  <option value="37">37</option>
				  <option value="38">38</option>
				  <option value="39">39</option>
				  <option value="40">40</option>
				  <option value="41">41</option>
				  <option value="42">42</option>
				  <option value="43">43</option>
				  <option value="44">44</option>
				  <option value="45">45</option>
				  <option value="46">46</option>
				  <option value="47">47</option>
				  <option value="48">48</option>
				  <option value="49">49</option>
				  <option value="50">50</option>
				  <option value="51">51</option>
				  <option value="52">52</option>
				  <option value="53">53</option>
				  <option value="54">54</option>
				  <option value="55">55</option>
				  <option value="56">56</option>
				  <option value="57">57</option>
				  <option value="58">58</option>
				  <option value="59">59</option>
				  <option value="60">60</option>
				  
                </select></td>
				<td>
				<select name="timeformate">
					<option value="am">Am</option>
					<option value="pm">Pm</option>
				</select>
				</td>
                <td align="left">Current server time: <? echo date("F j, Y, g:i a"); ?></td>
                </tr>
			  
			  -->
            </table></td>
          </tr>
          <!--<tr>
            <td align="left" id="padding-left">&nbsp;</td>
            <td align="left" valign="top">To use future activation you must also check th 'Available' box to make the clip appear in your store. </td>
          </tr>-->
          <tr>
            <td align="left" id="padding-left">&nbsp;</td>
            <td height="45" align="left"><input  type="image" id="Add clip" src="images/add-clip1.gif" align="left" ></td>
          </tr>
        </table></td>
      </tr>
 </table>
 </form>