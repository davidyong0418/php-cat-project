<?php session_start();
	include("../includes/connect.php");
 if(empty($_SESSION['account_number']))
{
  header("location:prepaid_login_form.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}

$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
$yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
$to2marodate=date('Y-m-d',$tomorrow);
$to3marodate=date('Y-m-d',$yesterday);
$query="select itm.item_name,itm.Date,itm.price,soi.store_name from items as itm,store_owner_information as soi where itm.Store_id=soi.store_id and itm.Date NOT BETWEEN '$to3marodate' AND '$to2marodate' and itm.client_id='$_SESSION[client_id]' order by itm.tr_id DESC LIMIT 0,5";
//$query="select itm.item_name,itm.price,itm.Date,soi.store_name,vc.vedio_file FROM items as itm left join store_owner_information as soi on itm.Store_id=soi.store_id and itm.client_id='$_SESSION[client_id]' left join vedio_clip as vc on itm.item_name=vc.title where itm.Date NOT BETWEEN '$to3marodate' AND '$to2marodate' order by itm.tr_id DESC";
$result=mysql_query($query) or die(mysql_error());

?>
<html>
<head>
<title><? echo $site_name ?> - View Your Order History</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFF00;
	font-weight: bold;
}
.style2 {color: #FFFFFF}
-->
</style>
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="1004">
<tr><td align="center" valign="top">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../header.php"); ?></td>
  </tr>
<tr>
<tr>
          <td align="center" valign="top" background="../images/GRAYBKG.gif"> 
            <table width="70%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="whitetxtcolor">&nbsp;</td>
              </tr>
              <tr> 
                <td class="whitetxtcolor"><strong>Order History </strong></td>
              </tr>
              <tr> 
                <td><img src="/images/spacer.gif" width="10" height="10"></td>
              </tr>
              <tr> 
                <td><p><span class="style1">Note:</span> <strong>Your History 
                    will only contain the last 5 orders. If you would like to 
                    re-download these clips again you must <span class="WhiteLinks"> 
                    </span></strong><span class="WhiteLinks"> 
                    <script language=javascript>

  <!--

  var contact = "contact us"

  var email = "admin"

  var emailHost = "nicheclips.com"

  document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost + "?Subject=Duplicate%20Download%20Request" + ">" + contact + "</a>" + ".")

  //-->

    </script>
                    <strong>within 48 hours of the purchase date.</strong><br>
                    <br>
                    <strong>We Strongly recommend that you immediately backup 
                    all your downloads, as we will not extend any downloads past 
                    48 hours from purchase date.</strong><br>
                    </span> </p>
                  </td>
              </tr>
            </table>
    <br>
    <TABLE  width="70%" border="1" cellpadding="3" cellspacing="0" bordercolor="#666666" class="border1">
		<TR  class="adminnavileft1" height="20" bgcolor="#000000">
			<TD align=center background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">S.No</FONT></B></TD>
			<TD align=center background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Title</FONT></B></TD>
			<TD align=center nowrap background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Price</FONT></B></TD>
			<TD align=center background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Store Name</FONT></B></TD>
			<TD align=center nowrap background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Date</FONT></B></TD>
			<!--<TD align=center><B><FONT COLOR="#FFFFFF">Download</FONT></B></TD>-->
		</TR>
		<? 
			$count=0;
			while($row=mysql_fetch_array($result))
			{ $count++;?>
			<tr align="left">
				<TD align=center class="txt4"><?php echo $count; ?></TD>
				<TD class="txt4"><? echo $row['item_name'];?></TD>
				<TD class="txt4"><? echo "$".$row['price'];?></TD>
				<TD class="txt4"><? echo $row['store_name'];?></TD>
				<TD class="txt4"><? echo $row['Date'];?></TD>
				<!--<TD align=center><A HREF="../storeowner/<?php echo $row['store_name']; ?>/vedio/<?php echo $row['vedio_file']; ?>" class="alink">Download</A> </TD>-->
			</tr>
		<? }?>
  </table>
    <br>
    <table width="70%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><strong>&lt;&lt; <span class="WhiteLinks"><a href="option.php">Return
          to My Account </a></span></strong></td>
        <td>&nbsp;</td>
      </tr>
    </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><br>
            </p></td></tr>
<tr>
    <td align="left" valign="top"><?php include("../footer.php"); ?></td>
  </tr>
</table>
</td></tr>
</table>
</body>
</html>
