<?php session_start();
$time=time();
include("Pager.php");
$pagerObj =new Pager;

$query="select itm.client_id,itm.item_name,itm.Date,itm.price,soi.commission,soi.global_commission,clnt.account_number from transactions as tran,items as itm,store_owner_information as soi,clients as clnt where tran.TRnum=itm.tr_id and itm.store_id='$_SESSION[store_id]' and soi.store_id=itm.Store_id and clnt.id=itm.client_id";
$res=mysql_query($query);
$totalrecord=mysql_num_rows($res);
# Show many results per page?
$limit = 10;
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

?>
<link href="style/standard_admin_classes.css" rel="stylesheet" type="text/css">

<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="778" border="0" cellspacing="0" cellpadding="0">
			   
			   <tr><td height="20" align="center"><font size="1"><i>Note: 10 record are showing per page, and the total income of that 10 clips are showing that</i></font></td></tr>
			   <tr> 
				  <td> 
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <form name="sale" action="welcome.php?val=sale" method="post">
					  <tr> 
						<td></td>
						<td class="head" align="left"> 
						  <H5>Sale Details</H5>
						  </td>
						  <td align="center" style="padding-right:20px;"><?php echo "Total Number of records :".$totalrecord; ?></td>
						  <td align="right" style="padding-right:20px;"><?=$pagelist;?>
						  
						  </td>
						 </tr>
						 </form>
					</table>
				  </td>
				</tr>
				<tr>
					<td width="90%" valign="top">
					
					   <TABLE  width="100%"   border="1" bgcolor="#828282" bordercolor="#282B77">
						  	<TR  class="adminnavileft1" height="20" bgcolor="#000000">
							    
							    
								<TD align=center><B><FONT COLOR="#FFFFFF">Client Account No</FONT></B></TD>
								<TD align=center><B><FONT COLOR="#FFFFFF">Purchased Clip</FONT></B></TD>
								<TD align=center><B><FONT COLOR="#FFFFFF">Price</FONT></B></TD>
								<TD align=center><B><FONT COLOR="#FFFFFF">DATE</FONT></B></TD>
								
							</tr>
							<? 
							$count=0;
							$commissionrate="";
							$income="";
							while($row=mysql_fetch_array($result))
							{ $count++;
							if($row['global_commission']!='0%')
							{ $commissionrate=$row['global_commission']; }
							 else
							 { $commissionrate=$row['commission']; }
							?>
							<tr>
								
								
								<TD align=center><?php echo $row['account_number']; ?></TD>
								<TD align=center><? echo $row['item_name'];?></TD>
								<TD align=center><? echo "$".$row['price'];?></TD>
								<TD align=center><? echo $row['Date'];?></TD>
								
								<? $income+=(($row['price']*(100-$commissionrate))/100); ?>
							</tr>
							<? }?>
							
					   </TABLE>
					   
					</td>
				</tr>
				<tr>
					<td style="padding-top:20px;">
						<?php 
							echo "Commision Rate Per Clip :   ".$commissionrate." %"."<br>";
							echo "Total Income :   "."$".$income;
						?>
					</td>
				</tr>
	   	</table>
	  </td>
  </tr>
</table>

