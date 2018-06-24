<?php session_start();
include("includes/connect.php");

$query="select DISTINCT(email),id, first_name, last_name from clients as clnt,items as itm where itm.client_id=clnt.id and clnt.mailing_list='1' and  itm.Store_id='$_SESSION[store_id]'";
$result=mysql_query($query) or die(mysql_error());


?>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>



<link href="style_main/style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			   <tr> 
				  <td> 
					<table width="67%" border="0" align="center" cellpadding="0" cellspacing="0">
              		  <tr>
              		    <td>&nbsp;</td>
              		    <td align="right" valign="middle" >&nbsp;</td>
           		      </tr>
              		  <tr>
              		    <td colspan="2">Reports &amp; Statistics: <strong>Mailing List</strong>
              		      <div><br />
           		          This email form is to Only Promote Your store at  sc-media-group.com. Please do not use any external links, emails or any links to photos or videos when using this form. All emails will be validated by admin before being sent.</div>
              		      <strong><br />
              		      </strong>
                        <hr size="1" /></td>
           		      </tr>
              		  
              		  <tr>
              		    <td align="left"><a href="welcome.php?val=confmail&amp;store_id=<?php echo $_SESSION[store_id]; ?>&amp;to=all" class="WhiteLinks">Mail to all Customers </a></td>
              		    <td align="right" valign="middle" ></td>
           		      </tr>
              		  <tr> 
						<td width="57%"></td>
						<td width="43%" align="right" valign="middle" >&nbsp;</td>
					  </tr>
					</table>
				  </td>
			  </tr>
				<tr>
				  <td align="center" valign="top">
					
					   <TABLE  width="67%" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#565656">
						  	<TR  class="adminnavileft1">
						  	  <TD width="52%" height="19" align=center background="images/HdrBKG.gif"><div>Customer That will receive promotional email<br />
						  	    <br /> 
						  	    <a href="welcome.php?val=confmail&amp;store_id=<?php echo $_SESSION[store_id]; ?>&amp;to=all" class="WhiteLinks">CLICK HERE to e-mail all Customers </a><br />
						  	    <br />
						  	    <br />
						  	  </div></TD>
							</tr>
							<?php 
							while($row=mysql_fetch_array($result))
							{
								
							?>

							<?php }?>						
			        </TABLE>
			
					   <a href="mailto:" class="WhiteLinks">
					   <?php $row['email'];?>
				    </a></td>
				</tr>
			
	   	</table>
	  </td>
  </tr>
</table>

