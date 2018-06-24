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

function Advanced() {
   document.getElementById("AdvancedEdit").style.display = "block";
   document.getElementById("BasicEdit").style.display = "none";
}
function Basic() {
   document.getElementById("AdvancedEdit").style.display = "none";
   document.getElementById("BasicEdit").style.display = "block";
}
</script>

<script language="JavaScript" type="text/javascript" src="editor/wysiwyg.js">
</script>
<style type="text/css">
<!--
.style1 {	color: #000000;
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
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#5E5E5E" style="border:1px solid #828282;">
<tr align="center" valign="top">
              <td><br />
<!--BEGIN ADVANCED EDITOR-->
<div>
<form name="cus_shop" method="post" action="">
<table width="95%" cellpadding="2" cellspacing="0">
                    <tr>
								<td width="552" colspan="2" align="center"></td>
		    </tr>
							<tr>
								<td colspan="2" align="center" bgcolor="#999999" id="padding-left"  style="padding:0px; padding-left:10px;"><br /><p align="left" class="WhiteLinks">
							    Advanced Header HTML Editor:&nbsp; <font color="#FBCB03"><strong><?php echo $msg ?></strong></font></p>
                                  <DIV class="style1">NOTE: No Active Links or emails are allowed in the   Header or Footer </DIV>
                                  <p><font color="#CCCCCC">
                                  <textarea name="top_html" id="top_html" cols="70" rows="12"><? echo $row['t_text']; ?></textarea>
                                    <br>
                                    <br />
                                  <input type="submit" name="submit" value="Save Advanced Header HTML" class="input_btn">
                                      </font></p>
                               <div class="border2" style="width:500px"><br />
                                 <p class="txt4"><span class="redtxt"><strong>*For Basic HTML using our interface</strong></span> <span class="txtbold"><a href="welcome.php?val=headerBas">click here</a>.</span><br /><br />
                                 </p>
                               </div><br><br></td>
							</tr>
		  </table></form></div>
<!--END ADVANCED EDITOR-->
			  </td>
  </tr>
            <tr align="left" valign="top">
              <td>&nbsp;</td>
            </tr>
</table>
