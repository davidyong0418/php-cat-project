<?php session_start();

if(isset($_POST['submit']))
{
	$day=$_REQUEST['day'];
	$month=$_REQUEST['month'];
	$year=$_REQUEST['year'];
	$date=$year."-".$month."-".$day;
	$query="select * from traffic_details where store_id='$_SESSION[store_id]' and date='$date'";
	$result=mysql_query($query) or die(mysql_error());
	
}
else {
	$date=date('Y-m-d');
	$query="select * from traffic_details where store_id='$_SESSION[store_id]' and date='$date'";
	$result=mysql_query($query) or die(mysql_error());
}
?>
<link href="style/standard_admin_classes.css" rel="stylesheet" type="text/css">

<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="778" border="0" cellspacing="0" cellpadding="0">
			   <tr> 
				  <td> 
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <form name="sale" action="welcome.php?val=traffic" method="post">
					  <tr>
					    <td align="left"><font color="#FFFFCC"><strong><? echo $msg; ?>&nbsp;</strong></font></td>
					    </tr>
					  <tr>
					    <td align="left">Reports &amp; Statistics: <strong>Traffic Statistics  </strong>
                          <hr size="1" /></td>
					    </tr>
					  <tr>
					    <td align="right" style="padding-right:20px;">&nbsp;</td>
					    </tr>
					  <tr> 
						<td height="33" align="left" valign="top" style="padding-right:20px;">Traffic of : Day 
						  	
						  <select name="day" class="input_field">
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
							    <option value="13">13</option>
							    <option value="14">14</option>
							    <option value="15">15</option>
							    <option value="16">16</option>
							    <option value="17">17</option>
							    <option value="18">18</option>
							    <option value="19">19</option>
							    <option value="20">20</option>
							    <option value="21">21</option>
							    <option value="22">22</option>
							    <option value="23">23</option>
							    <option value="24">24</option>
							    <option value="25">25</option>
							    <option value="26">26</option>
							    <option value="27">27</option>
							    <option value="28">28</option>
							    <option value="29">29</option>
							    <option value="30">30</option>
							    <option value="31">31</option>
						  </select>
						  Month : 
					  	  <select name="month" class="input_field">
							  <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
						  </select>
						  Year: 
							  <select name="year" class="input_field">
							    <option value="2007">2007</option>
							    <option value="2008">2008</option>
							    <option value="2009">2009</option>
							    <option value="2010">2010</option>
						  </select>
						  <input type="submit" name="submit" value="Submit" class="input_btn">						  </td>
					    </tr>
					  </form>
					</table>
				  </td>
				</tr>
				<tr>
					<td width="90%" align="center" valign="top">
					
					   <TABLE  width="90%"   border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#565656">
						  	<TR  class="adminnavileft1">
							    
							    <TD height="19" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">S.No</FONT></B></TD>
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Type of OS</FONT></B></TD>
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Type of Browser</FONT></B></TD>
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Date</FONT></B></TD>
								
							</tr>
							<? 
							$count=0;
							while($row=mysql_fetch_array($result))
							{ $count++;
							?>
							<tr>
								
								<TD align=center><?php echo $count; ?></TD>
								<TD align=center><? echo $row['ostype'];?></TD>
								<TD align=center><? echo $row['browsertype'];?></TD>
								<TD align=center><? echo $date;?></TD>
								
								
							</tr>
							<? }?>
							
				      </TABLE>
					   
					</td>
				</tr>
				
	   	</table>
	  </td>
  </tr>
</table>

