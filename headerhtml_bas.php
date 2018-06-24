<?php session_start();
include("includes/connect.php");

$time=time();
$msg="";
if(isset($_POST['submit']))
{
	$top_html = mysql_real_escape_string($_POST['top_html']);
	$query="update font set
			t_text='$top_html'
			where store_id='$_SESSION[store_id]'";
	$result=mysql_query($query) or die(mysql_error());
	//$qu="update store_owner_information set
		// updated_date='$time'
		// where store_id='$_SESSION[store_id]'";
	//$rr=mysql_query($qu) or die(mysql_error());
	$msg="Your changes have been saved.";
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

<script language="JavaScript" type="text/javascript" src="editor/wysiwyg.js">
</script>
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
}
-->
</style>

<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
    <td height="20" align="left"></td>
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
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#07183F" style="border:1px solid #828282;">
<tr align="center" valign="top">
              <td><br />
			  <!--BEGIN BASIC EDITOR-->
<div id="BasicEdit" style="display:block">
<form name="cus_shop" method="post" action="">
<table width="95%" cellpadding="2" cellspacing="0">
                    <tr>
								<td width="552" colspan="2" align="center"></td>
		    </tr>
							<tr>
								<td colspan="2" align="center" bgcolor="#999999" id="padding-left"  style="padding:0px; padding-left:10px;"><br />
								<p align="left" class="WhiteLinks">
							    Basic Header HTML Editor: &nbsp; <font color="#FBCB03"><strong><?php echo $msg ?></strong></font></p>
								  <DIV class="style1">NOTE: No Active Links or emails are allowed in the   Header or Footer </DIV>
								  <p>
					                <textarea name="top_html" id="top_html" cols="70" rows="12"><? echo $row['t_text']; ?></textarea>
								    <script language="javascript1.2">
  generate_wysiwyg('top_html');
                                    </script>
								    <br />
								    <br />
					                <input type="submit" name="submit" value="Save Header HTML" class="input_btn">
						          </p>
							  <div class="border2" style="width:500px"><br />
							    <p class="redtxt"><strong>* To input                              advanced HTML code</strong> <span class="txtbold"><strong><a href="welcome.php?val=headerAdv">click here</a>.</strong></span> <br /><br />
							  </div><br /><br /></td>
							</tr>
		  </table></form></div>
<!--END BASIC EDITOR-->

			  </td>
  </tr>
            <tr align="left" valign="top">
              <td>&nbsp;</td>
            </tr>
</table>
