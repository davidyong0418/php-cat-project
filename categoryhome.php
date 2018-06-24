<?php
session_start();
include("includes/connect.php");
$storeid=$_SESSION['store_id'];
if(isset($_REQUEST['value']) && $_REQUEST['value']=='delete'){
	$category_id = $_REQUEST['category_id'];
	 $del_sql = "DELETE FROM category WHERE id= $category_id and store_id='$storeid'";
	$result=mysql_query($del_sql);
	$deletefromvedioclip="DELETE FROM vedio_clip where category='$category_id' and store_id='$storeid'";
	mysql_query($deletefromvedioclip);
	
}

	 $sql="select * FROM category where store_id='$storeid' ORDER BY categoryname";
	 $result=mysql_query($sql);
	
?>
<link href="style/standard_admin_classes.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="right">
		   <A HREF='welcome.php?val=addcategory' class="style1"></A>		</td>
	</tr>
	<tr> 
    	<td valign="top" align="center">
    		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			   
				
				 
				<tr> 
				  <td> 
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
					    <td></td>
					    <td align="right"></td>
				      </tr>
					  <tr>
					    <td></td>
					    <td align="left">Manage Products: <strong>Manage Categories</strong>
				          <hr size="1" /></td>
				      </tr>
					  <tr>
					    <td></td>
					    <td height="20" align="left"><a href='welcome.php?val=addcategory' class="style1">Add New Category</a></td>
				      </tr>
					  <tr> 
						<td width="17"></td>
						<td width="100%" height="20" align="left">&nbsp;</td>
					  </tr>
					</table>
				  </td>
				</tr>
				<tr>
					<td width="90%" valign="top">
					   <TABLE  width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#999999" bgcolor="#07183F">
						   	<TR  class="adminnavileft1">
							    <TD height="19" align=center background="images/HdrBKG.gif" bgcolor="#000000"><B><FONT COLOR="#FFFFFF">Action</FONT></B></TD>
							    <TD height="19" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Category Name</FONT></B></TD>
							</tr>
						<?php 
							while($row=mysql_fetch_array($result))
							{ ?>
							<tr>
							<TD align=center><A HREF="welcome.php?val=addcategory&value=edit&category_id=<?=$row['id']?>" class="style1">[EDIT]</A> <!--/ <A HREF="welcome.php?val=categoryhome&value=delete&category_id=<?=$row['id']?>" onclick="return window.confirm('Are you sure want to delete this category')" class="alink">[DELETE]</A>--></TD>
							<TD align=center><?=$row['categoryname']?></TD>
							</tr>
					<?php   }
						?>
					  </TABLE>
					</td>
				</tr>
				
				 
			
      	</table>
	  </td>
  </tr>
</table>

