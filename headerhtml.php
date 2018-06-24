<?php session_start();
include("includes/connect.php");

$time=time();
$msg="";
if(isset($_POST['submit']))
{
	$query="update font set
			t_text='$_POST[top_html]'
			where store_id='$_SESSION[store_id]'";
	$result=mysql_query($query) or die(mysql_error());
	//$qu="update store_owner_information set
		// updated_date='$time'
		// where store_id='$_SESSION[store_id]'";
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

</script>

<script language="JavaScript" type="text/javascript" src="../editor/wysiwyg.js">
</script>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
    <td height="20" align="left"><font color="#FFFFCC"><strong><?php echo $msg ?></strong></font></td>
  </tr>
  <tr>
    <td></td>
    <td align="left">Store Setup: <strong>Edit HTML Header</strong>
        <hr size="1" /></td>
  </tr>
  <tr>
    <td width="17"></td>
    <td width="100%" height="20" align="left">&nbsp;</td>
  </tr>
</table>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#5E5E5E" style="border:1px solid #828282;  ">
            <tr align="left" valign="top"> 
              <td width="90%"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>For
              Basic HTML</strong></font></div></td>
            </tr>
			
            <tr align="left" valign="top"> 
              <td>
			  <form name="cus_shop" method="post" action="">
			  <table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr><td style="padding:10px; padding-left:0px;" align="center">
						<table width="95%" cellpadding="2" cellspacing="0">
                    <tr>
								<td width="552" colspan="2" align="center"></td>
						  </tr>
							<tr>
								<td colspan="2" align="center" bgcolor="#999999" id="padding-left"  style="padding:0px; padding-left:10px;">
                        <font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>This
                        Editor is for Basic HTML Code <br>
                        For 
                        Advanced Code please use
                        Bottom Input Box </strong></font><br>
<textarea name="top_html" id="top_html" cols="70" rows="12"><? echo $row['t_text']; ?></textarea>
								    <script language="javascript1.2">
  generate_wysiwyg('top_html');
                                  </script>
                                    <br />
                              <input type="submit" name="submit" value="Save Header HTML" class="input_btn"></td>
							</tr>
					  </table></td>
					</tr>
				</table></form></td>
            </tr>
            <tr align="left" valign="top"> 
              <td><form name="cus_shop" method="post" action="">
			  <table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
					  <td style="padding:10px; padding-left:0px;" align="center">
						<font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>For Advanced
						HTML Please use the Bottom Input Box </strong></font><br>
						<br>
						<table width="95%" cellpadding="2" cellspacing="0" bgcolor="#CCCCCC">
                    <tr>
								<td width="552" colspan="2" align="center"></td>
						  </tr>
							<tr>
								<td colspan="2" align="center" bgcolor="#999999" id="padding-left"  style="padding:0px; padding-left:10px;">
                                  <font color="#CCCCCC">
                                    <textarea name="top_html" id="top_html" cols="70" rows="12"><? echo $row['t_text']; ?></textarea>
                                    <br>
                                    <br />
                                  <input type="submit" name="submit" value="Save Advanced Header HTML" class="input_btn">
                              </font></td>
							</tr>
					  </table></td>
					</tr>
				</table></form>&nbsp;</td>
            </tr>
</table>
