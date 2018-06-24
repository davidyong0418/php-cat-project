<?php session_start();
include("includes/connect.php"); 
$time=time();
$msg="";
if(isset($_POST['submit']))
{
	$query="update font set
			background_color='$_POST[bgcolor]',
			background_text_color='$_POST[bgcolortext]',
			table_color='$_POST[bordercolor]',
			text_color='$_POST[textcolor]',
			link_color='$_POST[linkcolor]',
			visited_link_color='$_POST[visitedcolor]'			
			where store_id='$_SESSION[store_id]'";
	$result=mysql_query($query) or die(mysql_error());
	//$qu="update store_owner_information set
		 //updated_date='$time'
		 //where store_id='$_SESSION[store_id]'";
	//$rr=mysql_query($qu) or die(mysql_error());
	$msg="Your changes have been saved";
}
$query="select * from font where store_id='$_SESSION[store_id]'";
$result=mysql_query($query) or die(mysql_query());
$row=mysql_fetch_array($result);

$sql="select * from font_face";
$res=mysql_query($sql) or die(mysql_error());
$resl=mysql_query($sql) or die(mysql_error());

?>
<script language="JavaScript">

//==============================================================\\

//======FUNCTION TO SHOW THE COLOR DIALOG BOX=========\\

 var sInitColor;

 function callColorDlg(src){

  if(sInitColor == null)

   var sColor = dlgHelper.ChooseColorDlg();

  else

   var sColor = dlgHelper.ChooseColorDlg(sInitColor);

 

  sColor = sColor.toString(16);

  if (sColor.length < 6) {

   var sTempString = "000000".substring(0,6-sColor.length);

   sColor = sTempString.concat(sColor);

  }

 

  src.value = '#' + sColor;

  sInitColor = sColor;

 }

</script>
<style type="text/css">
<!--
.style1 {	font-family: Verdana;
	font-size: 12px;
	color:#FFFFFF
}
.style2 {	font-family: Verdana;
	font-size: 12px;
	font-weight: bold;
	color:#FFFFFF
}
.style2a {	font-family: Verdana;
	font-size: 12px;
}
-->
</style>

<OBJECT id=dlgHelper CLASSID="clsid:3050f819-98b5-11cf-bb82-00aa00bdce0b" width="0px" height="0px">
<embed width="0px" height="0px"></embed></OBJECT>

<form name="cus_shop" method="post" action="">
<div id="colorpicker201" class="colorpicker201"></div>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/spacer.gif" width="10" height="10" /></td>
  </tr>
  <tr>
    <td><font color="#FFFFCC"><strong><?php echo $msg; ?></strong></font></td>
  </tr>
  <tr>
    <td><span class="style1">Store Setup:</span> <span class="style2">Edit Store Colors</span>
        <hr size="1" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/spacer.gif" width="10" height="10" /></td>
  </tr>
</table>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#07183F" style="border:1px solid #999999;">    
      <tr>
        <td align="left" valign="top"><table width="90%" align="center" cellpadding="2" cellspacing="0" id="padding-left">
          <tr>
            <td align="center" colspan="2"></td>
          </tr>
		  <tr>
		    <td align="left" valign="top" id="padding-left">&nbsp;</td>
		    <td align="left" valign="top">&nbsp;</td>
	      </tr>
		  <tr>
            <td width="34%" align="left" valign="top" id="padding-left"><strong>Background Color:</strong></td>
            <td width="66%" align="left" valign="top"><input type="text" name="bgcolor" id="bgcolor" value="<? echo $row['background_color']; ?>" class="field">&nbsp;<img src="images/sel.gif" alt="Click here to pick the color." title="Click here to pick the color." border="0" onclick="showColorGrid2('bgcolor','sample_1');" style="cursor:hand"/>&nbsp;<input type="text" ID="sample_1" size="1" value="">
</td>
		  </tr>
		  <tr>
            <td width="34%" height="42" align="left" valign="top" id="padding-left"><strong>Background Text Color:</strong></td>
            <td width="66%" align="left" valign="top">
<input type="text" id="bgcolortext" name="bgcolortext" value="<? echo $row['background_text_color']; ?>" class="field">&nbsp;<img src="images/sel.gif" alt="Click Here to pick the color." title="Click Here to pick the color." border="0" onclick="showColorGrid2('bgcolortext','sample_2');" style="cursor:hand"/>&nbsp;<input type="text" ID="sample_2" size="1" value=""></td>
		  </tr>
          <tr>
            <td align="left" valign="top" id="padding-left">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top" id="padding-left"><strong>Table Color:</strong></td>
            <td align="left" valign="top"><input name="bordercolor" id="bordercolor" type="text" class="field" value="<? echo $row['table_color']; ?>"/>&nbsp;<img src="images/sel.gif" alt="Click here to pick the color."title="Click here to pick the color."  border="0" onclick="showColorGrid2('bordercolor','sample_3');" style="cursor:hand"/>&nbsp;<input type="text" ID="sample_3" size="1" value=""></td>
          </tr>
          <tr>
            <td align="left" id="padding-left"><strong>Table Text Color:</strong></td>
            <td align="left" valign="top"><input type="text" name="textcolor" id="textcolor" value="<? echo $row['text_color']; ?>">&nbsp;<img src="images/sel.gif" alt="Click Here to pick the color." title="Click Here to pick the color."  border="0" onclick="showColorGrid2('textcolor','sample_4');" style="cursor:hand"/>&nbsp;<input type="text" ID="sample_4" size="1" value=""></td>
          </tr>
          <tr>
            <td align="left" valign="middle" id="padding-left"><strong>Link Color:</strong></td>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13%"><input type="text" name="linkcolor" id="linkcolor" value="<? echo $row['link_color']; ?>">&nbsp;<img src="images/sel.gif" alt="Click Here to pick the color." title="Click Here to pick the color."  border="0" onclick="showColorGrid2('linkcolor','sample_5');" style="cursor:hand"/>&nbsp;<input type="text" ID="sample_5" size="1" value=""></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" id="padding-left">&nbsp;</td>
            <td height="28" align="left"><input type="submit" name="submit" value="Save" class="input_btn"></td>
          </tr>
        </table>
        <br /></td>
      </tr>
</table>
</form>