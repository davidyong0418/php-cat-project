<?php session_start();
include("includes/connect.php");

include("Pager.php");
$pagerObj =new Pager;


if(isset($_REQUEST['clip']))
{
$query="select title,sold_time from vedio_clip where Store_id='$_SESSION[store_id]' and id='$_REQUEST[clip]'";
$result=mysql_query($query) or die(mysql_error());
}
else{

//$result=mysql_query($query) or die(mysql_error());
$query="select title,sold_time from vedio_clip where Store_id='$_SESSION[store_id]' order by sold_time DESC";
$res=mysql_query($query);
$totalrecord=mysql_num_rows($res);
# Show many results per page?
$limit = 20;
# Find the start depending on $_GET['page'] (declared if it's null)
$start = $pagerObj->findStart($limit);
# Find the number of rows returned from a query; Note: Do NOT use a LIMIT clause in this query
$count = mysql_num_rows(mysql_query($query));
# Find the number of pages based on $count and $limit
$pages = $pagerObj->findPages($count, $limit);
# Now we use the LIMIT clause to grab a range of rows
$result = mysql_query($query." LIMIT ".$start.", ".$limit) or die(mysql_error());
# Now get the page list and echo it
$pagelist = $pagerObj->nextPrev($_GET['page'], $pages,$_REQUEST['val']);
}

$query4GettingClipTitle="select id,title from vedio_clip where Store_id='$_SESSION[store_id]' order by title";
$result4GettingClipTitle=mysql_query($query4GettingClipTitle);

?>


<table border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="778" border="0" cellspacing="0" cellpadding="0">
			   <tr> 
				  <td> <form name="f1" action="" method="post" style="margin:0px;">
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td  align="left" valign="middle">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"  align="left" valign="middle">Reports &amp; Statistics: <strong>Clips Sold  </strong>
                  <hr size="1" /></td>
                </tr>
              <tr>
                <td  align="left" valign="middle">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr> 
				  <td width="61%"  align="left" valign="middle"><B>Seclect a clip to see how many copies sold: &nbsp;</B>
					
					<select name="clip" onChange="form.submit()" class="input_field">
						<option value="">Select Clip</option>
						<?php 
							while($row4GettingClipTitle=mysql_fetch_array($result4GettingClipTitle))
							{ ?>
								<option value="<?php echo $row4GettingClipTitle['id']; ?>"><?php echo $row4GettingClipTitle['title'];?></option>
					<?php   }
						?>
					</select>				</td>
				<td width="17%"><?=$pagelist;?></td>
					  </tr>
					  <tr>
					  <td colspan="2">&nbsp;</td>
					  </tr>
					</table>
					</form>
				  </td>
				</tr>
				<tr>
					<td align="center" valign="top">
					
					   <TABLE  width="90%"   border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#07183F">
						  	<TR  class="adminnavileft1">
							    <TD height="19" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Clip Name</FONT></B></TD>
								<!--<TD align=center><B><FONT COLOR="#FFFFFF">Name</FONT></B></TD>-->
								<!--<TD align=center><B><FONT COLOR="#FFFFFF">Purchased Clip</FONT></B></TD>-->
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Total Sold</FONT></B></TD>
							</tr>
							<?php 
							while($row=mysql_fetch_array($result))
							{
								
							?>
							<tr>
								<TD align=center><?php echo $row['title'];?></TD>
								<!--<TD align=center><A HREF="welcome.php?val=confmail&client_id=<? echo $row['id'];?>" class="alink">[SEND MAIL]</A> / <A HREF="welcome.php?act=deletepackage&val=delete&package_id=<?php echo $row['package_id']?>" onclick="return window.confirm('Are you sure want to delete this product')" class="alink">[DELETE]</A></TD>-->
								<!--<TD align=center><?php echo $row['first_name']." ".$row['last_name']?></TD>-->
								<!--<TD align=center><?php echo $row['item_name'];?></TD>-->
								<TD align=center><?php echo "Sold ".$row['sold_time']." Copies";?></TD>
								
							</tr>
							<?php }?>						
				      </TABLE>
			
					</td>
				</tr>
			
	   	</table>
	  </td>
  </tr>
</table>

