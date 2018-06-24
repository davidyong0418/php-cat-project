<?php session_start();
include("includes/connect.php");

$date=date('Y-m-d');
$income="";
$monthincome="";
$month=date('m');
$year=date('Y');
$firstdate="$year-$month-01";


$query="select DISTINCT item_name from items where Date='$date' and Store_id='$_SESSION[store_id]'";
$result=mysql_query($query);
$count=mysql_num_rows($result);

$query2="select shopownerprice from items where Date='$date' and Store_id='$_SESSION[store_id]'";
$result2=mysql_query($query2);

while($row2=mysql_fetch_array($result2))
{
	$income+=$row2['shopownerprice'];
}
$query3="select item_name from items where Date BETWEEN '$firstdate' and '$date' and Store_id='$_SESSION[store_id]' order by item_name";
$result3=mysql_query($query3);
$count3=mysql_num_rows($result3);

$query4="select shopownerprice from items where Date BETWEEN '$firstdate' and '$date' and Store_id='$_SESSION[store_id]' order by item_name";
$result4=mysql_query($query4);
while($row4=mysql_fetch_array($result4))
{
	$monthincome+=$row4['shopownerprice'];
}

$query4traffic="select * from traffic_details where store_id='$_SESSION[store_id]' and date='$date'";
$result4trsffic=mysql_query($query4traffic);
$num=mysql_num_rows($result4trsffic);

$query4monthtraffic="select * from traffic_details where store_id='$_SESSION[store_id]' and date BETWEEN '$firstdate' and '$date'";
$result4monthtraffic=mysql_query($query4monthtraffic);
$monthhits=mysql_num_rows($result4monthtraffic);

$querytotal="select itm.client_id,itm.item_name,itm.Date,itm.shopownerprice,soi.commission,soi.global_commission,soi.charge_back,clnt.first_name,clnt.last_name from items as tran,items as itm,store_owner_information as soi,clients as clnt where tran.tr_id=itm.tr_id and itm.store_id='$_SESSION[store_id]' and soi.store_id=itm.Store_id and itm.Date BETWEEN '$year-$month-01' AND '$year-$month-31' and itm.client_id=clnt.id and itm.shopownerprice <>'0'order by itm.Date";
	$querytotal=mysql_query($querytotal) or die(mysql_error());

?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
            

            <tr align="left" valign="top"> 
              <td width="90%" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="left"><strong>Store Home Page </strong>
                      <hr size="1" /></td>
                </tr>
                
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
                
      <table width="90%" border="1" cellpadding="3" cellspacing="0" bordercolor="#999999" bgcolor="#07183F" id="left-nav">
        <tr> 
          <td width="188" height="19" align="left" background="images/HdrBKG.gif"><strong>Quick 
            Stats:</strong></td>
          <td width="484" align="left" background="images/HdrBKG.gif">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Store 
            ID <?php echo $_SESSION["store_id"]; ?></strong></td>
        </tr>
        <tr> 
          <td align="left">Clip Income Today:</td>
          <td align="left"><div align="right" style="width:80px">
              <?php if($income==""){echo "$0";} else {echo "$".$income; }?>
            </div></td>
        </tr>
        <tr> 
          <td align="left">Hits Today:</td>
          <td align="left"><div align="right" style="width:80px"><?php echo $num; ?></div></td>
        </tr>
        <tr> 
          <td align="left" valign="top">Sales Report for This Month:</td>
          <td align="left" valign="top"><div align="left" style="width:280px">
              <? 
							$count=0;
							$commissionrate="";
							$income="";
							$totalsale="";
							$chargeback="";
							while($row=mysql_fetch_array($querytotal))
							{ $count++;
							$chargeback=$row['charge_back'];
							$commissionrate=$row['commission'];
							?>
              <? $totalsale+=$row['shopownerprice']; ?>
              <? $income+=($row['shopownerprice']-($row['shopownerprice']*$commissionrate)); ?>
              <? }?>
              <?php 
							echo "";
							if($_REQUEST['month']==01 || $month=='01')
							{
							echo " <strong>January</strong> ".$year;
							}
							else if($_REQUEST['month']==02 || $month=='02')
							{
							echo " <strong>February</strong> ".$year;
							}
							else if($_REQUEST['month']==03 || $month=='03')
							{
							echo " <strong>March</strong> ".$year;
							}
							else if($_REQUEST['month']==04 || $month=='04')
							{
							echo " <strong>April</strong> ".$year;
							}
							else if($_REQUEST['month']==05 || $month=='05')
							{
							echo " <strong>May</strong> ".$year;
							}
							else if($_REQUEST['month']==06 || $month=='06')
							{
							echo " <strong>June</strong> ".$year;
							}
							else if($_REQUEST['month']==07 || $month=='07')
							{
							echo " <strong>July </strong>".$year;
							}
							else if($_REQUEST['month']=='08' || $month=='08')
							{
							echo " <strong>August</strong> ".$year;
							}
							else if($_REQUEST['month']=='09' || $month=='09')
							{
							echo " <strong>September</strong> ".$year;
							}
							else if($_REQUEST['month']==10 || $month=='10')
							{
							echo " <strong>October</strong> ".$year;
							}
							else if($_REQUEST['month']==11 || $month=='11')
							{
							echo " <strong>November</strong> ".$year;
							}
							else if($_REQUEST['month']==12 || $month=='12')
							{
							echo " <strong>December</strong> ".$year;
							}
							else{}
							echo "<br><br>";
							echo "<strong>Total Sales:</strong> $".$totalsale."<br>";
							echo "<strong>Commision Rate:</strong>   ".$commissionrate." %"."<br>";
							echo "<strong>Total Payout for this month:</strong> $".number_format($income, 2, '.', '')."<br>";
							$total = $income-$chargeback;
							
						?>
            </div></td>
        </tr>
      </table></td>
            </tr>
            <tr align="left" valign="top"> 
			
			
		
			
			
			
              <td>	</td>
            </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#999999" id="left-nav">
  <tr bgcolor="#000000">
    <td height="122" align="left" bgcolor="#333333"><p><strong>Payout Schedule:</strong></p>
      <p>Store Payouts are sent on the 15th of each month for the previous months sales.<br>
      Please Note: There is a $200 minimum on payouts for Domestic Checks and International Wire Transfers. If your Store does not process $200 in a month we will carry over the amount and send payment, once sales have reached $200 or more.</p>
      <p>Thank You<br>
    </p></td>
  </tr>
  <tr> 
    <td height="110" align="left"><strong>Quick Tips :
      </strong>
      <p><strong>Use your mailing list option to mail all your customers. Use this tool to help you promote your new video releases.</strong><br>
      </p>
    </td>
  </tr>
</table>
