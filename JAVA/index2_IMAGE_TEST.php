<?php session_start();
include("includes/connect.php");
include("object.php");
include("include/password_on.php");

$per=$obj4sitepermission->sitepermission();
 if($per=='1')
 {
 
$querynumber="";
$count="";
$time=time();
$previous10daystime=time() - (10 * 24 * 60 * 60);
$previous30daystime=time() - (30 * 24 * 60 * 60);
if(isset($_POST['search1']) && $_POST['search1']!="")
{
	if($_POST['category']!="")
	{
	$query5="select * from store_owner_information as soi where soi.category1='$_POST[category]' or soi.category2='$_POST[category]' or soi.category3='$_POST[category]' or soi.category4='$_POST[category]' and soi.approved='1'";
	$result5=mysql_query($query5) or die(mysql_error());
	$count=mysql_num_rows($result5);
	$querynumber="5";
	}
}
else if(isset($_POST['go']) && $_POST['go']!="")
{
	if($_POST['storename']!="")
	{
	$query6="select * from store_owner_information where store_name='$_POST[storename]' and approved='1'";
	$result6=mysql_query($query6) or die(mysql_error());
	$count=mysql_num_rows($result6);
	$querynumber="6";
	}

}
else if(isset($_POST['keyword']) && $_POST['keyword']!="")
{
	$query7="select * from store_owner_information where store_name like '%$_POST[keyword]%' or s_first_name like '%$_POST[keyword]%' or s_last_name like '%$_POST[keyword]%' 
			or s_add like '%$_POST[keyword]%' or s_city like '%$_POST[keyword]%' or s_state like '%$_POST[keyword]%' or s_zip like '%$_POST[keyword]%' or s_country like '%$_POST[keyword]%'
			or s_phone like '%$_POST[keyword]%' or s_fax like '%$_POST[keyword]%' or s_email like '%$_POST[keyword]%'";
	$result7=mysql_query($query7) or die(mysql_error());
	$count=mysql_num_rows($result7);
	$querynumber="7";
}
else{}
//$query="select store_id,store_name,updated_date from store_owner_information where approved='1' and updated_date > '$previous10daystime' order by updated_date DESC LIMIT 0,20";
$query="SELECT DISTINCT(str.store_name),str.store_id from store_owner_information as str,items as itm where itm.`Store_id`=str.store_id and str.approved='1' and str.updated_date > '$previous30daystime' group by itm.item_name order by itm.item_name DESC LIMIT 0,20";
$result=mysql_query($query) or die(mysql_error());
mysql_close($query);

$queryfor8='SELECT store_owner_information.store_id, store_owner_information.store_name, sum(total)as \'best_sales\' FROM items, store_owner_information where store_owner_information.store_id=items.store_id and abs(datediff(Date,now()))<15 group by items.store_id order by best_sales desc limit 0,25';
$result8=mysql_query($queryfor8) or die(mysql_error());
mysql_close($queryfor8);

$query2="select store_id,store_name from store_owner_information where approved='1' and updated_date > '$previous30daystime' order by updated_date DESC LIMIT 0,50";
$result2=mysql_query($query2) or die(mysql_error());
mysql_close($query2); 

$query3="select * from category where store_id='0' order by categoryname";
$result3=mysql_query($query3) or die(mysql_error());
mysql_close($query3); 

$query4="SELECT * FROM store_owner_information  store_id WHERE approved = '1' AND `store_name` <> '' ORDER BY store_name";
$result4=mysql_query($query4) or die(mysql_error());
mysql_close($query4); 

$query9="DELETE from cart where deltime < $time";
$result9=mysql_query($query9);
mysql_close($query9); 


$query10="select * from banner_details order by rand()";
$result10=mysql_query($query10) or die(mysql_error());
$row10=mysql_fetch_array($result10);
mysql_close($query10); 

$query4banner2="select * from banner_details order by rand()";
$result4banner2=mysql_query($query4banner2) or die(mysql_error());
$row4banner2=mysql_fetch_array($result4banner2);
mysql_close($query4banner2); 

$query11="select store_id,title,id, image_file from vedio_clip order by rand()";
$result11=mysql_query($query11) or die(mysql_error());
// edited by mick
$k=array();
$i=0;
$FSIZE=200000;
 while($row11=mysql_fetch_array($result11))
	 {
		$ffile=$row11['store_id']."/clips/files/img_files/".$row11['image_file'];
		
		if(file_exists($ffile))
		 {
			if(filesize($ffile)<$FSIZE)
			 {
					array_push($k,$row11);
					$i++;
			 };
		 };
	if($i>9) break;
	 };
mysql_close($query11); 

//
$query12="select store_id,title,id, image_file from vedio_clip order by rand()";
$result12=mysql_query($query12) or die(mysql_error());
$k2=array();
$i=0;
 while($row12=mysql_fetch_array($result12))
	 {
		$ffile=$row12['store_id']."/clips/files/img_files/".$row12['image_file'];
		
		if(file_exists($ffile))
		 {
			if(filesize($ffile)<$FSIZE)
			 {
					array_push($k2,$row12);
					$i++;
			 };
		 };
	if($i>9) break;
	 };
mysql_close($query12); 
//

$query13="select store_id,store_name from store_owner_information where approved='1' and open_date order by open_date DESC LIMIT 0,16";
$result13=mysql_query($query13) or die(mysql_error());
mysql_close($query13); 
mysql_close($query13); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? echo $site_name ?> - Home</title>
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript" src="overlib/overlib.js"></script>
</head>

<body>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="220" align="left" valign="top" bgcolor="#500000" style="border-bottom:1px solid #666; border-right:1px solid #666;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25" align="left" valign="middle" background="images/HdrBKG.gif"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" height="17"><img src="images/arrow.gif" width="17" height="11" hspace="4" align="absmiddle" /><strong>Recently Updated Stores</strong></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" id="left-nav">
                <tr>
                  <td width="5%" align="left"></td>
                  <td width="5%" align="left"></td>
                  <td width="90%" align="left"></td>
                </tr>
                <?
					$i=1; 
					while($row2=mysql_fetch_array($result2))
					{ ?>
                <tr>
                      <td align="left"><img src="images/spacer.gif" width="10" height="10" /></td>
                  <td colspan="2" align="left" style="padding:1.1px"><img src="images/icon4.gif" width="7" height="7" />
                    <?php 				 
							$queryClip="select vid.*,str.updated_date,image_file from vedio_clip as vid, store_owner_information as str where vid.store_id='$row2[store_id]' and vid.store_id=str.store_id";
							$resultClip=mysql_query($queryClip) or die(mysql_error());
							$countClip=mysql_num_rows($resultClip);
							$rowclip=mysql_fetch_array($resultClip);
							$update=date("m/d/Y",$rowclip['updated_date']);
							mysql_close($resultClip); 
						?>

                    <a href="shop.php?store_id=<? echo $row2['store_id']; ?>" onmouseover="return overlib(' <?php echo "Total Clips: ".$countClip."<br>"."Updated: ".$update; ?> <?php <IMG SRC=../clips/files/img_files/ echo $row2['image_file']width="32" height="32"/>; ?> ');" onmouseout="nd();" target="_blank"><? echo $row2['store_name']; ?></a></td>
					

                  </tr>
                <? $i++; }
				?>
              </table>
                <input name="hidden" type="hidden" id="rec" value="<? echo $i; ?>" /></td>
          </tr>
        </table></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="900" align="left" valign="top" background="images/GRAYBKG.gif"><table width="468" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td><img src="images/spacer.gif" width="10" height="10" /></td>
                    </tr>
					    <? if($row10['banner_file']!="")
					{ 
					$path= "/".$row10['store_id']."/clips/files/banner/";
					?>
                    <tr> 
                      <td align="center"><a href="shop.php?store_id=<?php echo $row10['store_id']?>" target="_blank"><img src="<?php echo $path.$row10['banner_file']; ?>" border="0" alt="<?php echo $row10['alt_text']; ?>" width="468" height="60"></a></td>
                    </tr>
                    <? } ?>
					 <tr> 
                      <td><img src="images/spacer.gif" width="10" height="10" /></td>
                    </tr>
					<tr> 
                      <td><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0"><tr><form name="f1" action="" method="post">
<td align="center" valign="top">
<input type="hidden" name="search1" value="search1">
<span class="style1">Category Search </span><br>
<select name="category" class="txtbox" style="width:165px">
<option value="">Select a Category</option><? while($row3=mysql_fetch_array($result3)){ ?>
<option value="<? echo $row3['id']; ?>"><? echo $row3['categoryname']; ?>
</option>
<? }?>
</select>
<input name="Submit2" type="submit" class="input_btn" value="Submit" />
</td></form>



                 <form name="f2" id="f2">
                      <td align="center" valign="top">
                          <span class="style1">Go to Your Favorite Store  </span><br>
                          <select name="storename" class="txtbox" style="width:185px">
                            <option value="">Select a Store</option>
                            <? while($row4=mysql_fetch_array($result4)){ ?>
                            <option value="shop.php?store_id=<? echo $row4['store_id'];?>"><? echo $row4['store_name']; ?> </option>
                            <? } ?>
                          </select>
						  <input type="button" class="input_btn" value="Go" onClick="gone()"/>
                      </td>
                  </form>
				  <script language="javascript">
<!--

var displaymode=1

function gone(){
var selectedurl=document.f2.storename.options[document.f2.storename.selectedIndex].value
if (document.getElementById&&displaymode==0)
document.getElementById("external").src=selectedurl
else if (document.all&&displaymode==0)
document.all.external.src=selectedurl
else{
if (!window.win2||win2.closed)
win2=window.open(selectedurl)
//else if win2 already exists
else{
win2.location=selectedurl
win2.focus()
}
}
}
//-->
</script>

<form name="f3" action="" method="post"><input type="hidden" name="keywordsearch" value="keywordsearch"></form></tr></table></td>
                    </tr>
                   
                 
                    <tr> 
                      <td height="19" align="center" valign="middle"> 
                        <?php 
				  	if($count > 0)
					{ ?>
                        <strong>Results:</strong> 
                        <?  }
					else if($count =="0")
					{
				  	?>
                        <span class="style2">Sorry. No Records Found.</span> 
                        <? }
					else 
					{ ?>
                        <? } ?>                      </td>
                    </tr>
                    <tr> 
                      <td align="center" valign="top"><div align="center" style="border:#999999 solid 1px;"><table width="100%"border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#000000"  id="mid"> 
                            <? if($querynumber=="5")
						  		{
									while($row5=mysql_fetch_array($result5))
									{ ?>
                           
                            <tr> 
                              <td align="center" valign="top" colspan="3">
					<!--RESULTS FOR CATEGORY SEARCH APPEAR HERE -->
							  <table width="450" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="55" align="right"><img src="images/icon.gif" width="7" height="7" hspace="4" vspace="2" /></td>
    <td width="395" align="left"><a href="shop.php?store_id=<? echo $row5['store_id']; ?>" class="WhiteLinks" target="_blank"><? echo $row5['store_name'];?></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" class="yellowText"><? echo date("F j, Y, g:i a",$row5['updated_date']);?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" class="DescTxt"><? echo $row5['store_description'];?></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><img src="images/spacer.gif" width="10" height="15" /></td>
    </tr>
</table>
							  <!--END RESULTS FOR CATEGORY SEARCH--></td>
</tr>

                            <?  }
								}
								
								else if($querynumber=="6")
						  		{
									while($row6=mysql_fetch_array($result6))
									{ ?>
                            <tr> 
                              <td align="center" valign="top" colspan="3">
							  <!--RESULTS FOR STORE NAME SEARCH APPEAR HERE -->
							  <table width="450" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="55" align="right"><img src="images/icon.gif" width="7" height="7" hspace="4" vspace="2" /></td>
    <td width="395" align="left"><a href="shop.php?store_id=<? echo $row6['store_id']; ?>" class="WhiteLinks" target="_blank"><? echo $row6['store_name'];?></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" class="yellowText"><? echo date("F j, Y, g:i a",$row6['updated_date']);?></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td align="left" class="DescTxt"><? echo $row6['store_description'];?></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><img src="images/spacer.gif" width="10" height="15" /></td>
    </tr>
</table><!-- END STORE NAME SEARCH RESULTS--></td></tr>
 <?  }
								}
								else 
						  		{ ?>
                            <tr> 
                              <td width="50%" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                                  <tr> 
                                    <td colspan="2" align="left" bgcolor="#666666"><div align="center" class="style1"><font size="2">Top 25 Stores</font></div></td>
                                  </tr>
                                  <tr> 
                                    <td colspan="2"><img src="images/spacer.gif" width="5" height="8" /></td>
                                  </tr>
                                  <?php
									//SELECT Store_id, sum(total)as 'best_sales' FROM `items` group by `Store_id` order by best_sales desc
								
								
								while($row8=mysql_fetch_array($result8))
													{ ?>
                                  <tr> 
                                    <td width="10%" align="right" valign="middle"><img src="images/AwardBullet.gif" width="12" height="11" hspace="2" /></td>
                                    <td width="90%" align="left" valign="top"><div align="left" style="width:200px; overflow:hidden">
									<?php 				 
							$queryClip="select vid.*,str.updated_date from vedio_clip as vid, store_owner_information as str where vid.store_id='$row8[store_id]' and vid.store_id=str.store_id";
							$resultClip=mysql_query($queryClip) or die(mysql_error());
							$countClip=mysql_num_rows($resultClip);
							$rowclip=mysql_fetch_array($resultClip);
							$update=date("m/d/Y",$rowclip['updated_date']);
							mysql_close($resultClip);
						?>        
									<a href="shop.php?store_id=<? echo $row8['store_id']; ?>" onmouseover="return overlib(' <?php echo "Total Clips: ".$countClip."<br>"."Updated: ".$update; ?> ');" onmouseout="nd();" target="_blank"><? echo $row8['store_name'];?></a></div></td>
                                  </tr>
                                  <?php } ?>
                                </table>
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="center"><div align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#666666" class="style1">New Stores</td>
    </tr>
	<tr>
       <td colspan="2" align="right"><img src="images/spacer.gif" width="10" height="10" /></td>
       </tr
	 ><?
					$i=1; 
					while($row13=mysql_fetch_array($result13))
					{ ?>
     
     <tr>
    <td width="10%" align="right"><img src="images/icon.gif" width="7" height="7" hspace="4" vspace="2" /></td>
    <td width="90%" align="left"><div style="width:200px; overflow:hidden"><?php 				 
							$queryClip="select vid.*,str.updated_date from vedio_clip as vid, store_owner_information as str where vid.store_id='$row13[store_id]' and vid.store_id=str.store_id";
							$resultClip=mysql_query($queryClip) or die(mysql_error());
							$countClip=mysql_num_rows($resultClip);
							$rowclip=mysql_fetch_array($resultClip);
							$update=date("m/d/Y",$rowclip['updated_date']);
							mysql_close($resultClip);
						?>                    <a href="shop.php?store_id=<? echo $row13['store_id']; ?>" onmouseover="return overlib(' <?php echo "Total Clips: ".$countClip."<br>"."Updated: ".$update; ?> ');" onmouseout="nd();" target="_blank"><? echo $row13['store_name']; ?></a></div></td>
                </tr>
                <? $i++; }
				?>
<tr>
       <td colspan="2" align="right"><img src="images/spacer.gif" width="10" height="10" /></td>
       </tr>
	   </table>
<input name="hidden2" type="hidden" id="hidden" value="<? echo $i; ?>" />
</div></td>
                                  </tr>
                                </table></td>
                              <td width="5" valign="top" background="images/linebg.gif"><table width="5" border="0" cellpadding="0" cellspacing="0">
                                  <tr> 
                                    <td bgcolor="#000000"><img src="images/spacer.gif" width="5" height="20" /></td>
                                  </tr>
                                </table></td>
                              <td width="50%" align="right"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                  <tr> 
                                    <td colspan="2" align="left" bgcolor="#666666"> 
                                      <div align="center" class="style1"><font size="2"> 
                                        Cool Clips</font></div></td>
                                  </tr>
                                  <tr> 
                                    <td colspan="2"><img src="images/spacer.gif" width="5" height="8" /></td>
                                  <tr> 
                                    <td align="center" valign="top" class="redtxt"> 
                                      <?php 

											foreach ($k as $key=>$value)
													{ 
														$row11=$value;
												?>
												
                                      <form name="f1" action="shop.php?store_id=<? echo $row11['store_id']; ?>" method="post" target="_blank" style="margin:5px;">
                                        <div align="center"> 
                                          <input type="hidden" name="clipid" value="<?php echo $row11['id']; ?>" />
										  <input type="image" src="../<?php echo $row11['store_id']; ?>/clips/files/img_files/<?php echo $row11['image_file']; ?>" width="90" height="65" alt="<?php echo $row11['title']; ?>" title="<?php echo $row11['title']; ?>" ></div>
                                      </form>
                                      <?php } ?></td>
                                    <td align="center" valign="top" class="redtxt"> 
                                      <?php 	foreach ($k2 as $key=>$value)
													{ 
														$row12=$value;
												?>
                                      <form name="f1" action="shop.php?store_id=<? echo $row12['store_id']; ?>" method="post" target="_blank" style="margin:5px;">
                                        <div align="center"> 
                                          <input type="hidden" name="clipid" value="<?php echo $row12['id']; ?>" />
                                          <input type="image" src="<?php echo $row12['store_id']; ?>/clips/files/img_files/<?php echo $row12['image_file']; ?>" width="90" height="65" alt="<?php echo $row12['title']; ?>" title="<?php echo $row12['title']; ?>" ></div>
                                      </form>
                                      <?php } ?><p></p></td>
                                  </tr>
                                </table></td>
                            </tr>
                            <? }
						  ?>
                          </table>
                        </div>
                         </td>
                    </tr>
                    <? if($row4banner2['banner_file']!="")
					{ 
					$path="/".$row4banner2['store_id']."/clips/files/banner/";
					?>
                    <tr> 
                      <td align="center"><a href="shop.php?store_id=<?php echo $row4banner2['store_id']?>"target="_blank"><img src="<?php echo $path.$row4banner2['banner_file']; ?>" border="0" alt="<?php echo $row4banner2['alt_text']?>" width="468" height="60"></a></td>
                    </tr>
                    <? } ?>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
        <td width="220" align="left" valign="top" bgcolor="#500000" style="border-bottom:1px solid #666; border-left:1px solid #666;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25" align="left" valign="middle" background="images/HdrBKG.gif"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                      <td align="left" height="17"><img src="images/arrow.gif" width="17" height="11" hspace="4" align="absmiddle" /><strong>Daily 
                        Top Selling Clips</strong></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="0" id="left-nav">
                <tr>
                  <td width="5%" align="left"></td>
                  <td width="5%" align="left"></td>
                  <td width="90%" align="left"></td>
                </tr>
                <?
						$queryfor14='SELECT store_owner_information.store_id, store_owner_information.store_name, item_name, vedioclipid, sum(total)as \'best_sales\' FROM items, store_owner_information where store_owner_information.store_id=items.store_id and abs(datediff(Date,now()))<2 group by items.vedioclipid order by best_sales desc limit 0,55';
$result14=mysql_query($queryfor14) or die(mysql_error());
mysql_close($queryfor14);

					$i=1; 
					while($row14=mysql_fetch_array($result14))
					{ ?>
                <tr>
                  <td align="left"><img src="images/spacer.gif" width="10" height="10" /></td>
				  <td valign="middle"><span style="padding:1px"><img src="images/icon4.gif" width="7" height="7" /></span></td>
                  <td align="left" valign="middle" style="padding:1px"><form style="margin: 0px;" method="post" action="shop.php?store_id=<? echo $row14['store_id']; ?>"  target="_blank" name="f1">
						<div align="left">
					<input type="hidden" value="<?php echo $row14['vedioclipid'] ?>" name="clipid"/>
					<input type="submit" value="<? echo $row14['item_name']; ?>" class="RedClipButton" style="width:190px" name="submitclipid" onmouseover="return overlib(' <?php  echo "Store: ".$row14['store_name'];?>', this.style.color='#FFFFCC')" onmouseout="nd(); this.style.color='#FFFFFF'"/></div>
					</form>
				  </td>
                </tr>
                <? $i++; }
				?>
              </table>
                <input name="hidden2" type="hidden" id="hidden" value="<? echo $i; ?>" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php include("footer.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#000000" height="5"></td>
  </tr>
</table>
</body>
</html>
<?php } 
else{
 	echo "Site Not Permited";

 
} ?>