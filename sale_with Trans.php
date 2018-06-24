<?php session_start();
$time=time();
//echo $_REQUEST['month'];
$year="";
if(isset($_REQUEST['submit']))
{
	$year=$_REQUEST['year'];
	$month=$_REQUEST['month'];
	$curdate=date('d-m-y');
	$query="select itm.client_id,itm.item_name,itm.Date,itm.shopownerprice,soi.commission,soi.global_commission,soi.charge_back,clnt.first_name,clnt.last_name from transactions as tran,items as itm,store_owner_information as soi,clients as clnt where tran.TRnum=itm.tr_id and itm.store_id='$_SESSION[store_id]' and soi.store_id=itm.Store_id and itm.Date BETWEEN '$year-$month-01' AND '$year-$month-31' and itm.client_id=clnt.id and itm.shopownerprice <>'0'order by itm.Date";
	$result=mysql_query($query) or die(mysql_error());
	
}
else{
	$year=date('Y');
	$month=date('m');
	$curdate=date('Y-m-d');
	$query="select itm.client_id,itm.item_name,itm.Date,itm.shopownerprice,soi.commission,soi.global_commission,soi.charge_back,clnt.first_name,clnt.last_name from transactions as tran,items as itm,store_owner_information as soi,clients as clnt where tran.TRnum=itm.tr_id and itm.store_id='$_SESSION[store_id]' and soi.store_id=itm.Store_id and itm.Date BETWEEN '$year-$month-01' AND '$year-$month-31' and itm.client_id=clnt.id and itm.shopownerprice <>'0' order by itm.Date";
	$result=mysql_query($query) or die(mysql_error());
}
?>
<link href="style/standard_admin_classes.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #FFFFFF}
-->
</style>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="778" border="0" cellspacing="0" cellpadding="0">
			   
			   <tr><td height="20"><? echo $msg; ?></td></tr>
			   <tr> 
				  <td> 
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td></td>
                        <td height="20" align="left"><font color="#FFFFCC"><strong></strong></font></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td align="left">Reports & Statistics: <strong>Sales Report </strong>
                            <hr size="1" /></td>
                      </tr>
                      <tr>
                        <td width="17"></td>
                        <td width="100%" height="20" align="left">&nbsp;</td>
                      </tr>
                    </table>
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <form name="sale" action="welcome.php?val=sale" method="post">
					  <tr> 
						<td height="33" align="left" valign="top" style="padding-right:20px;">Sales for month of: 
						  	
						  <select name="month" class="input_field">
							  <option value="01" selected="selected" <?php if($_REQUEST['month']=='01'){echo "selected"; }?>>January</option>
							  <option value="02" <?php if($_REQUEST['month']=='02'){echo "selected"; }?>>February</option>
							  <option value="03" <?php if($_REQUEST['month']=='03'){echo "selected"; }?>>March</option>
							  <option value="04" <?php if($_REQUEST['month']=='04'){echo "selected"; }?>>April</option>
							  <option value="05" <?php if($_REQUEST['month']=='05'){echo "selected"; }?>>May</option>
							  <option value="06" <?php if($_REQUEST['month']=='06'){echo "selected"; }?>>June</option>
							  <option value="07" <?php if($_REQUEST['month']=='07'){echo "selected"; }?>>July</option>
							  <option value="08" <?php if($_REQUEST['month']=='08'){echo "selected"; }?>>August</option>
							  <option value="09" <?php if($_REQUEST['month']=='09'){echo "selected"; }?>>September</option>
							  <option value="10" <?php if($_REQUEST['month']=='10'){echo "selected"; }?>>October</option>
							  <option value="11" <?php if($_REQUEST['month']=='11'){echo "selected"; }?>>November</option>
							  <option value="12" <?php if($_REQUEST['month']=='12'){echo "selected"; }?>>December</option>
						  </select>&nbsp;&nbsp;Year
						  <select name="year" class="input_field">
							  <option value="2015" selected="selected" <?php if($_REQUEST['year']=='2015'){echo "selected"; }?>>2015</option>
							  <option value="2016" <?php if($_REQUEST['year']=='2016'){echo "selected"; }?>>2016</option>
							  <option value="2017" <?php if($_REQUEST['year']=='2017'){echo "selected"; }?>>2017</option>
						  </select>
						  &nbsp;&nbsp;
						  <input type="submit" name="submit" value="Submit" class="input_btn">						  </td>
					    </tr>
					  </form>
					</table>
			     </td>
			  </tr>
				<tr>
				  <td width="90%" valign="top">
					
       <TABLE  width="90%"   border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#999999" bgcolor="#565656">
						  	<TR  class="adminnavileft1">
							    
							    <TD height="19" align=center background="images/HdrBKG.gif"><B><font color="#FFFFFF">Count</font></B></TD>
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Client Name</FONT></B></TD>
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Purchased Clip</FONT></B></TD>
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Price</FONT></B></TD>
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Date</FONT></B></TD>
								
							</tr>
							<? 
							$count=0;
							$commissionrate="";
							$income="";
							$totalsale="";
							$chargeback="";
							while($row=mysql_fetch_array($result))
							{ $count++;
							$chargeback=$row['charge_back'];
							$commissionrate=$row['commission'];
							?>
							<tr>
								
								<TD align=center><?php echo $count; ?></TD>
								<TD align=center><?php echo $row['first_name']." ".$row['last_name']; ?></TD>
								<TD align=center><? echo $row['item_name'];?></TD>
								<TD align=center><? echo "$".$row['shopownerprice'];?></TD>
								<TD align=center><? echo $row['Date'];?></TD>
								<? $totalsale+=$row['shopownerprice']; ?>
								<? $income+=($row['shopownerprice']-($row['shopownerprice']*$commissionrate)); ?>
								
							</tr>
							<? }?>
							
			        </TABLE>
					   
					   <table width="90%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#666666">
                         <tr>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td align="left"><br>
                            <?php 
							echo "Month:";
							if($_REQUEST['month']==01 || $month=='01')
							{
							echo " January ".$year;
							}
							else if($_REQUEST['month']==02 || $month=='02')
							{
							echo " February ".$year;
							}
							else if($_REQUEST['month']==03 || $month=='03')
							{
							echo " March ".$year;
							}
							else if($_REQUEST['month']==04 || $month=='04')
							{
							echo " April ".$year;
							}
							else if($_REQUEST['month']==05 || $month=='05')
							{
							echo " May ".$year;
							}
							else if($_REQUEST['month']==06 || $month=='06')
							{
							echo " June ".$year;
							}
							else if($_REQUEST['month']==07 || $month=='07')
							{
							echo " July ".$year;
							}
							else if($_REQUEST['month']=='08' || $month=='08')
							{
							echo " August ".$year;
							}
							else if($_REQUEST['month']=='09' || $month=='09')
							{
							echo " September ".$year;
							}
							else if($_REQUEST['month']==10 || $month=='10')
							{
							echo " October ".$year;
							}
							else if($_REQUEST['month']==11 || $month=='11')
							{
							echo " November ".$year;
							}
							else if($_REQUEST['month']==12 || $month=='12')
							{
							echo " December ".$year;
							}
							else{}
							echo "<br>";
							echo "Total Sales: $".$totalsale."<br>";
							echo "Commision Rate:   ".$commissionrate." %"."<br>";
							echo "Charge Back(s): $".$chargeback."<br>";
							echo "Total Earnings: $".number_format($income, 2, '.', '')."<br>";
							$total = $income-$chargeback;
							echo "Total Payout for this month:   "."$".number_format($total, 2, '.', '')."<br>" ;
							echo "<br>";
						?>
                           </td>
                         </tr>
                         <tr bgcolor="#990000">
                           <td align="left"><p class="style1">Payouts are sent on the 15th of each month for the previous months sales.<br>
                             <br>
                             <strong>Please Note: There is a $200 minimum on payouts for Domestic Checks and International Wire Transfers. If your Store does not process $200 in a month we will carry over the amount and send payment, once sales have reached $200 or more.</strong></p>
                             <p class="style2"><strong>Thank You</strong></p></td>
                         </tr>
                    </table></td>
				</tr>
				<tr>
					<td style="padding-top:20px;">
						
					</td>
				</tr>
	   	</table>
	  </td>
  </tr>
</table>

