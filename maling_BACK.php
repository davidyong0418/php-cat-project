<?php session_start();
include("includes/connect.php");

$query="select DISTINCT(email),id from clients as clnt,items as itm where itm.client_id=clnt.id and clnt.mailing_list='1' and  itm.Store_id='$_SESSION[store_id]'";
$result=mysql_query($query) or die(mysql_error());


?>


<table border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="778" border="0" cellspacing="0" cellpadding="0">
			   <tr> 
				  <td> 
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              		  <tr>
              		    <td>&nbsp;</td>
              		    <td align="right" valign="middle" >&nbsp;</td>
           		      </tr>
              		  <tr>
              		    <td colspan="2">Reports &amp; Statistics: <strong>Mailing List  </strong>
                          <hr size="1" /></td>
           		      </tr>
              		  
              		  <tr> 
						<td width="57%"><H5>&nbsp;</H5></td>
						<td width="43%" align="right" valign="middle" ><A HREF='welcome.php?val=confmail&store_id=<?php echo $_SESSION[store_id]; ?>&to=all' class="link"><B>Mail to all</B></A></td>
					  </tr>
					</table>
				  </td>
				</tr>
				<tr>
					<td align="center" valign="top">
					
					   <TABLE  width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#565656">
						  	<TR  class="adminnavileft1">
							    <TD height="19" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Action</FONT></B></TD>
								<!--<TD align=center><B><FONT COLOR="#FFFFFF">Name</FONT></B></TD>-->
								<!--<TD align=center><B><FONT COLOR="#FFFFFF">Purchased Clip</FONT></B></TD>-->
								<TD align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Email</FONT></B></TD>
							</tr>
							<?php 
							while($row=mysql_fetch_array($result))
							{
								
							?>
							<tr>
								<TD align=center><A HREF="welcome.php?val=confmail&client_id=<? echo $row['id'];?>" class="WhiteLink">[SEND MAIL]</A> <!--/ <A HREF="welcome.php?act=deletepackage&val=delete&package_id=<?php echo $row['package_id']?>" onclick="return window.confirm('Are you sure want to delete this product')" class="alink">[DELETE]</A>--></TD>
								<!--<TD align=center><?php echo $row['first_name']." ".$row['last_name']?></TD>-->
								<!--<TD align=center><?php echo $row['item_name'];?></TD>-->
								<TD align=center><?php echo $row['email'];?></TD>
								
							</tr>
							<?php }?>						
				      </TABLE>
			
					</td>
				</tr>
			
	   	</table>
	  </td>
  </tr>
</table>

