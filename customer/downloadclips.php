<?php session_start();
	include("../includes/connect.php");
 if(empty($_SESSION['account_number']))
{
  header("location:prepaid_login_form.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}
include 'dl-hash.php';
$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
$yesterday  = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
$to2marodate=date('Y-m-d',$tomorrow);
$to3marodate=date('Y-m-d',$yesterday);

$query="select itm.item_name,itm.Download_Date,itm.price,soi.store_name,soi.store_id,vc.vedio_file from items as itm,store_owner_information as soi,vedio_clip as vc where itm.Store_id=soi.store_id and itm.vedioclipid=vc.id and itm.Download_Date BETWEEN '$to3marodate' AND '$to2marodate' and itm.client_id='$_SESSION[client_id]' order by itm.tr_id DESC";


//$query="select itm.item_name,itm.price,itm.Date,soi.store_name,vc.vedio_file FROM items as itm left join store_owner_information as soi on itm.Store_id=soi.store_id and itm.client_id='$_SESSION[client_id]' left join vedio_clip as vc on itm.item_name=vc.title where itm.Date BETWEEN '$to3marodate' AND '$to2marodate' order by itm.tr_id DESC";
$result=mysql_query($query) or die(mysql_error());

?>
<html>
<head>
<title><? echo $site_name ?> - Download Clips</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../header.php"); ?></td>
  </tr>
<tr>

<tr>
  <td height="400" align="center" valign="top" background="../images/GRAYBKG.gif"> <br>   
    <table width="70%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="whitetxtcolor"><font size="2"><b>Thank You For Your Order
        </b></font></td>
      </tr>
      <tr>
        <td><img src="/images/spacer.gif" width="10" height="10"></td>
      </tr>
      <tr>
                <td> Please download your video clips. <strong>All downloads will expire within 24 hours</strong>. <br>
                  <strong>We   highly recommend backing up all of your downloaded clips. </strong><br>
                  sc-media-group is not   responsible for any lost clips Example: Computer Crash, Hard Drive Failure,  Viruses and so on. <strong>Please Backup Your Clips in a safe place.</strong><br>
                  <br>
                  <strong>If you have any difficulties downloading 
                  your video files, please <span class="WhiteLinks"> 
                  <script language=javascript>

  <!--

  var contact = "click here"

  var email = "admin"

  var emailHost = "sc-media-group.com"

  document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost + "?Subject=***Download%20Problem***" +  ">" + contact + "</a>")

  //-->

                </script>
                to contact us.</span></strong></td>
      </tr>
    </table>
    <br>
    <TABLE  width="70%"   border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" class="border1">
		<TR  class="adminnavileft1" height="20">
			<TD height="25" align=center nowrap background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">S.No</FONT></B></TD>
			<TD height="25" align=center background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Title</FONT></B></TD>
			<TD height="25" align=center nowrap background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Price</FONT></B></TD>
			<TD height="25" align=center background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Store Name</FONT></B></TD>
			<TD height="25" align=center nowrap background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Date</FONT></B></TD>
			<TD height="25" align=center background="../images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Download</FONT></B></TD>
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
				<TD class="txt4"><? echo $row['Download_Date'];?></TD>
				<TD align=center><span class="WhiteLinks"><A HREF="../DWLOAD_112_FILES.php?storeowner=<?php echo $row['store_id']; ?>&vedio=<?php echo shash_file($row['vedio_file']); ?>&date=<?php echo $row['Download_Date']; ?>">Download</A></span></TD>
			</tr>
		<? }?>
  </table>
    <br>
    <table width="70%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><strong>&lt;&lt; <span class="WhiteLinks"><a href="../customer/option.php">Return
          to My Account </a></span></strong></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <br></td></tr>
<tr>
    <td align="left" valign="top"><?php include("../footer.php"); ?></td>
  </tr>
</table>
</td></tr>
</table>
</body>
</html>
