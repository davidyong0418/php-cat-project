<?php session_start();
include("includes/connect.php");
//include("../includes/function.php");
if(isset($_REQUEST['act']) && $_REQUEST['act']=='delete'){
	$id = $_REQUEST['clip_id'];
	 $del_sql = "DELETE FROM vedio_clip WHERE id= '$id'";
	$result=mysql_query($del_sql);
	
}

if(isset($_REQUEST['clip']))
{
$sql="select vid.id,vid.title,vid.description,vid.vedio_file,vid.image_file,vid.pre_image,vid.vedio_format,vid.size,vid.running_time,vid.price,vid.available,vid.display_order,cat.categoryname FROM vedio_clip as vid,category as cat where vid.store_id='$_SESSION[store_id]' and vid.category=cat.id and vid.id='$_REQUEST[clip]' order by vid.id";
$result=mysql_query($sql);
}
else{
$sql="select vid.*,cat.categoryname FROM vedio_clip as vid,category as cat where vid.store_id='$_SESSION[store_id]' and vid.category=cat.id order by vid.title";
$result=mysql_query($sql);

}
$query4GettingClip="select id,title from vedio_clip where store_id='$_SESSION[store_id]' order by title";
$result4GettingClip=mysql_query($query4GettingClip);

?>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style2 {	font-family: Verdana;
	font-size: 12px;
	font-weight: bold;
}
.style2a {	font-family: Verdana;
	font-size: 12px;
}
.style3 {color: #FFFFFF}
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #FFFFFF;}
-->
</style>


<table border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
    	<td valign="top">
    		<table width="778" border="0" cellspacing="0" cellpadding="0">
			   <tr> 
				  <td> <form name="f1" action="" method="post" style="margin:0px;">
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><span class="style2a">Manage Products:</span> <span class="style2">Edit/Delete Clips</span>
                  <hr size="1" /></td>
                </tr>
              <tr>
                <td width="71%">&nbsp;</td>
                <td width="29%"  align="right" valign="middle" >&nbsp;</td>
              </tr>
              <tr>
                <td>EDIT/DELETE Clip&nbsp;
                    <select name="clip" onchange="form.submit();">
                      <option value="">Select Clip</option>
                      <?php 
									while($row4GettingClip=mysql_fetch_array($result4GettingClip))
									{ ?>
                      <option value="<?php echo $row4GettingClip['id'];?>"><?php echo $row4GettingClip['title'];?></option>
                      <?php   }
								?>
                    </select>
                </td>
                <td  align="right" valign="middle" ><a href='welcome.php?val=addclip' class="style1"><b>Add 
                  New Clip</b></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td  align="right" valign="middle" >&nbsp;</td>
              </tr>
					</table>
					</form>
				  </td>
			  </tr>
				<tr>
					<td align="center" valign="top">
					
					   <TABLE  width="90%"   border="1" cellpadding="3" cellspacing="0" bordercolor="#999999" bgcolor="#07183F">
						  	<TR  class="adminnavileft1">
							    
                				<TD height="19" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Action</FONT></B></TD>
								<TD height="20" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Clip Title</FONT></B></TD>
								<TD height="20" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Category</FONT></B></TD>
								<TD height="20" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Download File</FONT></B></TD>
								<TD height="20" align=center background="images/HdrBKG.gif"><B><FONT COLOR="#FFFFFF">Price</FONT></B></TD>
								
							</tr>
							<?php 
							
							while ($row=mysql_fetch_array($result))
							{ 
									
								?>
									<tr>
									<TD align=center><A HREF="welcome.php?val=editclip&vedioclip=<? echo $row['vedio_file'];?>&clip_id=<?php echo $row['id']?>&thimage=<?php echo $row['image_file']?>&preimage=<?php echo $row['pre_image']?>&action=edit" class="style1">[EDIT]</A> <span class="style3">/</span> <A HREF="welcome.php?val=showclip&act=delete&clip_id=<?php echo $row['id']?>" onclick="return window.confirm('Are you sure want to delete this product')" class="style1">[DELETE]</A></TD>
									<TD align=center><?php echo $row['title']; ?></TD>
									<TD align=center><?php echo $row['categoryname']; ?></TD>
									<TD align=center><?php echo $row['vedio_file']; ?></TD>
									<TD align=center><?php echo "$".$row['price']; ?></TD>
									
									</tr>
							
							   
							<? } ?>
							
							
				      </TABLE>
			
					</td>
				</tr>
			
	   	</table>
	  </td>
  </tr>
</table>

