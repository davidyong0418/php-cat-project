<?php session_start();
include("includes/connect.php");
include("object.php");
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
$query="select store_id,store_name,updated_date from store_owner_information where approved='1' and updated_date > '$previous10daystime' order by updated_date DESC LIMIT 0,20";
$result=mysql_query($query) or die(mysql_error());
$result8=mysql_query($query) or die(mysql_error());

$query2="select store_id,store_name from store_owner_information where approved='1' and updated_date > '$previous10daystime'";
$result2=mysql_query($query2) or die(mysql_error());

$query3="select * from category where store_id='0' order by categoryname";
$result3=mysql_query($query3) or die(mysql_error());

$query4="SELECT * FROM store_owner_information WHERE approved = '1' AND `store_name` <> '' ORDER BY store_name";
$result4=mysql_query($query4) or die(mysql_error());

$query9="DELETE from cart where deltime < '$time'";
$result9=mysql_query($query9);

$query10="select * from banner_details order by rand()";
$result10=mysql_query($query10) or die(mysql_error());
$row10=mysql_fetch_array($result10);

$query4banner2="select * from banner_details order by rand()";
$result4banner2=mysql_query($query4banner2) or die(mysql_error());
$row4banner2=mysql_fetch_array($result4banner2);

$query11="select store_id,title,id from vedio_clip order by rand() LIMIT 0,20";
$result11=mysql_query($query11) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>StompProductions.com</title>
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script language="JavaScript" src="js/prototype.js"></script>
<script language="JavaScript" src="js/main.js"></script>
</head>

<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="5" rowspan="5" align="left" valign="top" bgcolor="#000000">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#000000" height="5"></td>
    <td rowspan="5" align="left" valign="top" bgcolor="#000000" width="5"></td>
  </tr>
  <tr>
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="207" align="left" valign="top" bgcolor="#828282" style="border-bottom:1px solid #000; border-right:2px solid #000;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="33" align="left" valign="middle" class="bg-left"><table width="100%" height="33" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="10" align="left"></td>
                      <td width="19" align="left"><img src="images/aero.gif" width="15" height="11" /></td>
                      <td width="176" align="left">Recently Updated Stores</td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0" id="left-nav">
                    <tr> 
                      <td width="10" align="left"></td>
                      <td width="19" align="left"></td>
                      <td width="176" align="left"></td>
                    </tr>
                    <?
					$i=1; 
					while($row=mysql_fetch_array($result))
					{ ?>
                    <tr> 
                      <td width="10" align="left"></td>
                      <td width="19" align="left"><img src="images/icon.gif" width="7" height="7" /></td>
                      <td width="176" align="left"> <a href="shop.php?store_id=<? echo $row['store_id']; ?>" target="_blank" id="store" onmouseover="getTotalRecord(<? echo $row['store_id'] ?>,'<? echo $i; ?>')" onmouseout="getTotalRecordout()"><? echo $row['store_name']; ?></a>
					  <div id="a_record_<? echo $i; ?>" style="border:1px solid #000000;display:none;background-color:#A8A7A7;color:#000000;width:110px" align="center"></div>
                      </td>
                    </tr>
                    <? $i++; }
				?>
                  </table> <input type="hidden" id="rec" value="<? echo $i; ?>"></td>
              </tr>
            </table></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3%" align="left"></td>
            <td width="91%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="12" align="left"></td>
                </tr>
                <tr>
                  
				  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>
				  	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                       <form name="f1" action="" method="post">
						   <input type="hidden" name="search1" value="search1">
						<td width="161" align="center" valign="top">category search <br><select name="category" class="txtbox">
                          <option value="">Choice Your Store</option>
                          <? 
						  	while($row3=mysql_fetch_array($result3))
							{ ?>
								<option value="<? echo $row3['id']; ?>"><? echo $row3['categoryname']; ?></option>
							<? }
						  ?>     
                        </select><br><br><input type="image" src="images/search.gif" name="Submit2" value="Submit" /></td>
						</form>
						<form name="f2" action="" method="post">
							<input type="hidden" name="go" value="go">
                        <td width="181" align="center" valign="top">Store name search <br><select name="storename" class="txtbox">
                          <option value="">Choice Your Store</option>
                           <? 
						  	while($row4=mysql_fetch_array($result4))
							{ ?>
								<option value="<? echo $row4['store_name']; ?>"><? echo $row4['store_name']; ?></option>
							<? }
						  ?>  
                        </select><br><br><input type="image" src="images/go.gif" name="Submit" value="Submit" /></td>
						</form>
						<form name="f3" action="" method="post">
							<input type="hidden" name="keywordsearch" value="keywordsearch">
                        <td width="127" align="center" valign="middle">Keyword search<br><input name="keyword" type="text" class="field1" width="112" />
						<br><input type="image" src="images/search.gif" name="Submit2" value="Submit" /></td>
						</form>
                      </tr>
                  </table>
				
				  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
				<? if($row10['banner_file']!="")
					{ 
					$path="storeowner/".$row10['store_id']."/banner/";
					?>
				<tr>
                  <td align="center"><a href="shop.php?store_id=<?php echo $row10['store_id']?>"><img src="<?php echo $path.$row10['banner_file']; ?>" border="0" alt="<?php echo $row10['alt_text']; ?>" width="468" height="60"></a></td>
                </tr>
				<? } ?>
                <tr>
                  <td height="35" align="center" valign="middle">
				  <?php 
				  	if($count > 0)
					{ ?>
						<img src="images/search-result.gif"/>
				<?  }
					else if($count =="0")
					{
				  	?>
				  		<img src="images/no-records.gif"/>
                	<? }
					else 
					{ ?>
						<img src="images/recently.gif" width="258" height="25" />
				<? } ?>
				</td>
				</tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="12" align="left" valign="middle" bgcolor="#A8A7A7"></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle" bgcolor="#A8A7A7">
					  <div style="overflow:auto; height:263px; margin-bottom:10px">	
						<table width="97%" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#A8A7A7"  id="mid">
						  <? if($querynumber=="5")
						  		{
									while($row5=mysql_fetch_array($result5))
									{ ?>
										<tr>
							  				<td width="38%" align="center" valign="top"><a href="shop.php?store_id=<? echo $row5['store_id']; ?>"><? echo $row5['store_name'];?></a></td>
										</tr>
										<tr>
							  				<td width="38%" align="center" valign="top" class="redtxt"><? echo date("F j, Y, g:i a",$row5['updated_date']);?></td>
										</tr>
								<?  }
								}
								
								else if($querynumber=="6")
						  		{
									while($row6=mysql_fetch_array($result6))
									{ ?>
										<tr>
							  				<td width="38%" align="center" valign="top"><a href="shop.php?store_id=<? echo $row6['store_id']; ?>"><? echo $row6['store_name'];?></a></td>
										</tr>
										<tr>
							  				<td width="38%" align="center" valign="top" class="redtxt"><? echo date("F j, Y, g:i a",$row6['updated_date']);?></td>
										</tr>
								<?  }
								}
								
								else if($querynumber=="7")
						  		{
									while($row7=mysql_fetch_array($result7))
									{ ?>
										<tr>
							  				<td width="38%" align="center" valign="top"><a href="shop.php?store_id=<? echo $row7['store_id']; ?>"><? echo $row7['store_name'];?></a></td>
										</tr>
										<tr>
							  				<td width="38%" align="center" valign="top" class="redtxt"><? echo date("F j, Y, g:i a",$row7['updated_date']);?></td>
										</tr>
								<?  }
								}
								else 
						  		{ ?>
									<tr>
							  				<td valign="top">
												<table border="0" cellpadding="0" cellspacing="0" width="70%" align="center">
												<tr><td align="left"><font size="2" color="#000000"><b>Top 20 Stores</b></font></td></tr>
												<?php while($row8=mysql_fetch_array($result8))
													{ ?>
													<tr>
													<td width="38%" align="left" valign="top"><a href="shop.php?store_id=<? echo $row8['store_id']; ?>" target="_blank"><? echo $row8['store_name'];?></a></td>
													</tr>
													<?php } ?>
												</table>
												</td>
												<td align="right">
												<table border="0" cellpadding="0" cellspacing="0">
												<tr><td align="left"><font size="2" color="#000000"><b>Top 20 Clips</b></font></td></tr>
												<?php while($row11=mysql_fetch_array($result11))
													{ ?>	
													<tr>				
							  						<td width="62%" align="left" valign="top" class="redtxt">
													<form name="f1" action="shop.php?store_id=<? echo $row11['store_id']; ?>" method="post" style="margin:0px;">
														<input type="hidden" name="clipid" value="<?php echo $row11['id']; ?>" >
														<input type="submit" name="submitclipid" value="<? echo $row11['title'];?>" style="background-color:#A8A7A7; text-align:left; border:0px; color:#FFFFFF; font-size:13px; cursor:pointer;" onmouseover="this.style.color='#CC0000'" onmouseout="this.style.color='#FFFFFF'">
													</form>
													
													</td>
													</tr>
													<?php } ?>
												</table>
											</td>
										</tr>
								
								<? }
						  ?>
						 </table>
						 </div>
					  </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <? if($row4banner2['banner_file']!="")
					{ 
					$path="storeowner/".$row10['store_id']."/banner/";
					?>
                <tr>
                  <td align="center"><a href="shop.php?store_id=<?php echo $row4banner2['store_id']?>"><img src="<?php echo $path.$row4banner2['banner_file']; ?>" border="0" alt="<?php echo $row4banner2['alt_text']?>" width="468" height="60"></a></td>
                </tr>
				<? } ?>
				<tr>
                  <td>&nbsp;</td>
                </tr>
            </table></td>
            <td width="3%"></td>
          </tr>
        </table></td>
        <td width="201" align="left" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="1" align="left" valign="top"></td>
            <td width="127"></td>
            <td align="left" valign="top"></td>
          </tr>
          <tr>
            <td width="35" height="33" align="left" valign="top"><img src="images/cor1.gif" width="35" height="33" /></td>
            <td align="center" class="bg-right">New Stores</td>
            <td width="35" height="33" align="right" valign="top"><img src="images/cor2.gif" width="35" height="33" /></td>
          </tr>
          <tr>
            <td height="33" colspan="3" align="left" valign="top" bgcolor="#868686" style="border-left:2px solid #ABABAB; border-right:2px solid #ABABAB;">
				<table width="99%" border="0" align="center" cellpadding="1" cellspacing="0" id="right-nav">
					<?php 
						$i=0;
						while($row2=mysql_fetch_array($result2))
						{ 
						$i++;
						$r = $i%2;
						if($r==0){
						  echo '<tr bgcolor="#616161">';
						}else{
						  echo '<tr bgcolor="#828282">';
						}
							?>
							
								<td>&nbsp;</td>
								<td align="left"><a href="shop.php?store_id=<? echo $row2['store_id']; ?>" target="_blank"><? echo $row2['store_name']; ?></a></td>
              				</tr>
						<?	
											  			
					  }					
					?>
				</table>
			</td>
            </tr>
          <tr>
            <td height="33" align="left" valign="top"><img src="images/cor3.gif" width="35" height="33" /></td>
            <td bgcolor="#868686" style="border-bottom:2px solid #ABABAB;"><img src="images/spacer.gif" /></td>
            <td height="33" align="center" valign="top"><img src="images/cor4.gif" width="35" height="33" /></td>
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