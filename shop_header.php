<?php
include("object.php");
include("include/password_on.php");
include("Pagination.php");

	$per=$obj4sitepermission->sitepermission();
	$bypassgeturl=array("start");
	$geturl="";
	foreach($_REQUEST as $key=>$val){
		if(in_array($key,$bypassgeturl)) continue;
		else {
			if(stristr($key,'store_id')) continue;			  	 
			if(stristr($key,'page')) continue;
			$geturl.="$key=$val&";									
		}
	}
	if($per=='1'){
		session_start();
		include("includes/connect.php");
		//include("class/class.php");
		
		$id=$_REQUEST['store_id'];
		$clipid=$_POST['clipid'];

		$date=date('Y-m-d');
		$time=time();
		$deltime=time()+time(24*60*60);
		$currtime=time(date("F j, Y, g:i a"));

		$query="select * from font as f,store_owner_information as soi where soi.store_id=f.store_id and soi.store_id='$id'";
		$result=mysql_query($query) or die(mysql_error());
		$row=mysql_fetch_array($result);

		if(!$row['approved']) { 
			echo "This Shop Is Currently Unavailable"; exit; 
		};
		
		$result2=mysql_query($query) or die(mysql_error());
		$row2=mysql_fetch_array($result2);
		$def_page=abs(intval($_GET['page']));
		if($def_page<1) {$def_page=1;}; 
		
		$start = ($def_page-1)*20;


		if(isset($_REQUEST['search']) && $_REQUEST['search']!=""){
			if(($_POST['clipname']!="") && ($_POST['category']!="") && ($_POST['sortby']!="")){ 
				
				$perpage = 20;
				if($start=='')
					$start=0;
					$totrec = mysql_num_rows(
											mysql_query(
												"select * from vedio_clip as vid,store_owner_information as soi
												where soi.store_id=vid.store_id and soi.store_id='$id' and vid.available='1' order by title"
											)
										);
									
					$query3 = "select * from vedio_clip as vid,store_owner_information as soi,category as cat
							where soi.store_id=vid.store_id and soi.store_id='$id' and vid.available='1' and vid.status='1' and vid.category=cat.id 
							order by vid.id DESC limit $start,$perpage";
					$result3=mysql_query($query3) or die(mysql_error());
					$count=mysql_num_rows($result3);
					
					$result4=mysql_query($query3) or die(mysql_error());
				} else {
					$perpage = 20;
					if($start=='')
						$start=0;
					
					$totrec = mysql_num_rows(mysql_query("select * from vedio_clip as vid,store_owner_information as soi
											where soi.store_id=vid.store_id and soi.store_id='$id' and vid.available='1' order by title"));
					$query3="select * from vedio_clip as vid,store_owner_information as soi,category as cat where soi.store_id=vid.store_id and soi.store_id='$id' and vid.available='1' and vid.status='1' and vid.category=cat.id";
					
					if(!empty($_REQUEST['clipname'])){
						$query3.=" and vid.title='$_REQUEST[clipname]'";
					}
					
					if(!empty($_REQUEST['category'])){
						$query3.=" and vid.category='$_REQUEST[category]'";
					}
					if(!empty($_REQUEST['keyword'])){
						$query3.=" and vid.description like '%$_REQUEST[keyword]%'";
					}
					
					if($_REQUEST['sortby']=="title"){
						$query3.=" order by title";
					}
					
					if($_REQUEST['sortby']=="price"){
						$query3.=" ORDER BY price + 0 ASC";
					}
					
					if($_REQUEST['sortby']=="running_time"){
						$query3.=" order by running_time";
					}
					
					if($_REQUEST['sortby']=="size"){
						$query3.=" order by size ASC";
					}
					
					if($_REQUEST['sortby']=="vedio_format"){
						$query3.=" order by vedio_format";
					} else {}
					
					$result666=mysql_query($query3) or die(mysql_error());
					$totrec=mysql_num_rows($result666);
					
					$query3.=" limit $start,$perpage";
					$result3=mysql_query($query3) or die(mysql_error());
					$count=mysql_num_rows($result3);
					
				}	
				
			} else {
				$perpage = 20;
				if($start=='')
					$start=0;
				
				$totrec = mysql_num_rows(
								mysql_query("select * from vedio_clip as vid,store_owner_information as soi 
									where soi.store_id=vid.store_id and soi.store_id='$id' and vid.available='1' order by title")
							);
				if($clipid==""){
					$query3="select * from vedio_clip as vid,store_owner_information as soi,category 
					as cat where soi.store_id=vid.store_id and soi.store_id='$id' and vid.available='1' and vid.status='1'
					and vid.category=cat.id";
				
					if(!empty($_REQUEST['clipname'])){
						$query3.=" and vid.title='$_POST[clipname]'";
					} else if(!empty($_REQUEST['category'])) {
						$query3.=" and vid.category='$_POST[category]'";
					} else if(!empty($_REQUEST['keyword'])){
						$query3.=" and vid.description like '%$_REQUEST[keyword]%'";
					}else if($_REQUEST['sortby']=="title"){
						$query3.=" order by title";
					} else if($_REQUEST['sortby']=="price"){
						$query3.=" order by price";
					} else if($_REQUEST['sortby']=="running_time") {
						$query3.=" order by running_time";
					} else if($_REQUEST['sortby']=="size") {
						$query3.=" order by size ASC";
					} else if($_REQUEST['sortby']=="vedio_format") {
						$query3.=" order by vedio_format";
					} else {
						$query3.=" order by vid.id DESC";
					}
					$result = mysql_query($query3);
					$count = mysql_num_rows($result);
					$totrec = $count;
					$query3 .=" limit $start,$perpage";
				}
				
				if($clipid!="") {
					 $query3="select * from vedio_clip as vid,store_owner_information as soi, category as cat
							where soi.store_id=vid.store_id and soi.store_id='$id' and vid.id='$clipid' and vid.available='1' and vid.status='1' and vid.category=cat.id order by vid.id DESC";
					$result3=mysql_query($query3) or die(mysql_error());
					$count = mysql_num_rows($result3);
					$totrec = $count;
				}
				
				$result3=mysql_query($query3) or die(mysql_error());
				$count = mysql_num_rows($result3);
				
				$result4=mysql_query($query3) or die(mysql_error());
			}
			
			$query4="select * from vedio_clip as vid,store_owner_information as soi where soi.store_id=vid.store_id and soi.store_id='$id' and vid.available='1' order by vid.title";
			$result4=mysql_query($query4) or die(mysql_error());

			$query5="select * from category where store_id='$id' order by categoryname";
			$result5=mysql_query($query5);

			$msg="";
			if(isset($_POST['submitclip'])){
				$st=$_POST['status'];
		
				$query7="select * from cart where sessid='$_REQUEST[PHPSESSID]' and vedioclipid='$st'";
				$result7=mysql_query($query7);
				$counter=mysql_num_rows($result7);
				if($counter < 1){
					$query6="insert into cart set
						vedioclipid='$st',
						store_id='$id',
						sessid='$_REQUEST[PHPSESSID]',
						inserttime='$time',
						deltime='$deltime'";
				
					$result6=mysql_query($query6);
				} else {
					$msg="Clip already exists.";
				}					
			}

			$query9="select * from vedio_clip as vid, cart as crt where crt.vedioclipid=vid.id and crt.sessid='$_REQUEST[PHPSESSID]' and crt.store_id='$id'";
			$result9=mysql_query($query9) or die(mysql_error());
			$cont=mysql_num_rows($result9);
			
			$query4traffic="select * from traffic_details where session='$_REQUEST[PHPSESSID]'";
			$result=mysql_query($query4traffic);
			$num=mysql_num_rows($result);
			
			if($num==""){
	$query4hits="insert into traffic_details set 
				 store_id='$id',
				 hits='1',
				 session='$_REQUEST[PHPSESSID]',
				 date='$date'";
	$result4hits=mysql_query($query4hits) or die(mysql_error());
}

//$mostpopularclip="SELECT itm.item_name,vid.id,itm.Store_id FROM items as itm, vedio_clip as vid where itm.Store_id=vid.store_id and itm.item_name=vid.title GROUP BY itm.item_name HAVING itm.Store_id='$id' ORDER BY itm.total DESC LIMIT 0,5";
$mostpopularclip="select DISTINCT sold_time,id,title,Store_id from vedio_clip where Store_id='$id' order by sold_time DESC LIMIT 0,5";
$result4mostpopularclip=mysql_query($mostpopularclip);

?>

<html>
<head>
<title><?php echo $row['store_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript" type="text/javascript">

function popup2257(storeid) {
	url="http://sc-media-group.com/popup2257.php?storeid="+storeid;
	//alert(storeid);

	newwindow=window.open(url,'','height=200,width=250,top=150,left=220');
}

</script>

<link rel="stylesheet" href="js/thumbnailviewer.css" type="text/css" />

<script src="js/thumbnailviewer.js" type="text/javascript">

</script>

</script>

<link href="style_main/shopfront.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.SmallText {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<link href="shopfront.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="<? echo $row['background_color'];?>">
<div style="padding-top:5px; padding-bottom:5px;">

<!--######### header text ########--> 
?php echo $row['t_text']; ?> 
<!--######### header text ########--> 
</div>
<table width="98%" border="0" cellspacing="0" cellpadding="2" bgcolor="<? echo $row['background_color'];?>" align="center">
      
      <tr bgcolor="<? echo $row['table_color'];?>">
        <td align="center"><font color="<? echo $row['text_color'];?>" font face="Verdana, Arial, Helvetica, sans-serif" size="4"><strong><? echo $row['store_name']; ?></strong></font></td>
      </tr>
      
      <tr>
        <td height="10" align="left"></td>
      </tr>
	  <tr>
        <td align="center"><font color="<? echo $row['background_text_color'];?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2"><strong><?php echo $row['welcome_message']; ?></strong></font></td>
      </tr>
      <tr>
        <td align="center" valign="top">
		<div style="border: 1px solid <? echo $row['text_color']?>; width:650px;">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="<? echo $row['table_color'];?>">
          <tr>
            <td width="48%" height="22" align="center"><div align="center"><font color="<? echo $row['text_color']?>" class="txt1"><b>Most Popular Clips</b></font> </div></td>
            <td width="48%" align="center"><div align="center"><font color="<? echo $row['text_color']?>" class="txt1"><b>Cart Contents</b></font> </div></td>
          </tr>
          <tr>
            <td align="center" valign="top" style="padding-left:1px;">
			        <font color="<? echo $row['text_color']?>" face="<?php echo $row['t_font_face'];?>">
			        <div align="center">
			          <?php 
				while($row4mostpopularclip=mysql_fetch_array($result4mostpopularclip))
				{ ?>
		            </div>
					</font>
			        <form name="f1" action="shop.php?store_id=<?php echo $_REQUEST['store_id']; ?>" method="post" style="margin:0px;">
						<div align="center">
						  <font color="<? echo $row['text_color']?>" face="<?php echo $row['t_font_face'];?>">
						  <input type="hidden" name="clipid" value="<?php echo $row4mostpopularclip['id']; ?>" >
						  <input name="submitclipid" type="submit" class="clipbutton" style="background-color:<? echo $row['table_color'];?>; text-align:center; cursor:hand; border:0px; color:<? echo $row['text_color']?>;" value="<? echo $row4mostpopularclip['title'] ;?>"<? echo $row['text_color']?>"; font-size:11px; width:30px;">
				      </font></div>
					</form>
			        <div align="center"><font color="<? echo $row['text_color']?>" face="<?php echo $row['t_font_face'];?>">
		            <?php   }	
			?>
                    </font></div></td>
            
			 <td align="left" valign="top">
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<?php
						while($row9=mysql_fetch_array($result9))
						{ ?>
							<tr>
									
								<td align="center"><div align="center"><font color="<? echo $row['text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2"><?php echo "&nbsp;&nbsp;".$row9['title'];?></font></div></td>
							</tr>
					<? }
					?>
					<?php 
						if($cont > '0')
						{ ?>
							<tr>
								<td align="center">
									<form name="f3" method="POST" action="shoppingcart.php">
										<div align="center">
										  <input type="hidden" name="cart" value="<?php echo $id; ?>" >
										  <input name="continue" type="submit" class="button" value="Check Out">
									      </div>
									</form>								</td>
							</tr>
					<? }?>
				</table>			</td>
          </tr>
        </table>
		</div></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      
	  <tr>
			<td align="center" valign="top">
			<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="265" align="left" valign="middle"><font color="<? echo $row['background_text_color']?>" class="SmallText">Select a clip by title:</font></td>
				<td width="233" align="left" valign="middle">
					<font color="<? echo $row['background_text_color']?>" class="SmallText">Search Keyword:</font>				</td>
			<td width="152" align="left" valign="middle"><font color="<? echo $row['background_text_color']?>" class="SmallText">Select a category:</font></td>
				<td width="141" colspan="3" align="left" valign="middle"><font color="<? echo $row['background_text_color']?>" class="SmallText">Sort by:</font></td>
            </tr>
          <tr>
            <td colspan="2" align="left" valign="middle">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="226">
								
								
								<form name="f1a" action="shop.php?store_id=<? echo $row['store_id']; ?>" method="post">
									<table>
										<tr>
											<td>
												<select name="clipname" class="list" style=" width:220px">
													<option value="">All Clips</option>
													<?php 
														while($row4=mysql_fetch_array($result4)){ 
													?>
														<option value="<? echo $row4['title'];?>" <?php if($_REQUEST['clipname']==$row4['title']) echo "selected"; ?>><? echo $row4['title'];?></option>
													<?php 
														} 
													?>
												</select>											</td>
											<td width="78" align="center">
												<input name="search2" type="submit" class="button" id="search2" value="Go">											</td>
										</tr>
									</table>
								</form>							</td>
							
							<td>
								<form name="f1a" action="shop.php?store_id=<? echo $row['store_id']; ?>" method="post" class="list3">
									<table>
										<tr>
											<td width="226">
												<input name = "keyword" type = "text" class="list3" placeholder = "Keyword Search">											</td>
											<td width="78" align="center">
												<input name="search2" type="submit" class="button" id="search2" value="Search">											</td>
										</tr>
									</table>
								</form>							</td>
							
							<td width="20" align="center" style = "vertical-align: top;padding-top: 10px;" nowrap>&nbsp;</td>
							<td width="40" align="center" style = "vertical-align: top;padding-top: 10px;" nowrap>&nbsp;</td>
							<td width="20" align="center" style = "vertical-align: top;padding-top: 10px;" nowrap>&nbsp;</td>
						</tr>
			</table>			</td>
            <td colspan="4" align="left">
			 <form name="f1" action="shop.php?store_id=<? echo $row['store_id']; ?>" method="post">
				<table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="120"><select name="category" style="width:150px" class="list">
                  <option value="">All Categories</option>
                  <? while($row5=mysql_fetch_array($result5))
					{ ?>
                  <option value="<? echo $row5['id'];?>" <?php if($_REQUEST['category']==$row5['id']) echo "selected"; ?>><? echo $row5['categoryname'];?></option>
                  <?  } 
				?>
                </select></td>
                <td width="10">&nbsp;</td>
                <td width="81"><select name="sortby" class="list">
                  <option value="" selected>Default</option>
                  <option value="title" <?php if($_REQUEST['sortby']=="title") echo "selected"; ?>>Name</option>
                  <option value="price" <?php if($_REQUEST['sortby']=="price") echo "selected"; ?>>Price</option>
                  <option value="running_time" <?php if($_REQUEST['sortby']=="running_time") echo "selected"; ?>>Runtime</option>
                  <option value="size" <?php if($_REQUEST['sortby']=="size") echo "selected"; ?>>File Size</option>
                  <option value="vedio_format" <?php if($_REQUEST['sortby']=="vedio_format") echo "selected"; ?>>Format</option>
                </select></td>
                <td width="62" align="center"><input name="search" type="submit" class="button" id="search" value="Search"></td>
              </tr>
            </table></form></td>
            </tr>
        </table></td><tr>
        <td>
			<? if($count > 0)
			{ ?>
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td align="left" valign="top" style="padding-left:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           	<!--<td width="48%" align="left"><input name="Add clip22" type="image" id="Selected" value="Add Selected"  src="images/selected.gif" align="left" /></td>-->
            <td align="center">
			              <!--#########content start here ########-->    
						<?php if($_REQUEST['clipname']=="" and $_REQUEST['category']=="" and $_REQUEST['keyword']=="")
								{ 
								?>
								<table cellpadding="0" cellspacing="0" border="0">
								<tr>
                      			<td colspan="3"> 
                        		<?						
								$prev=$start-$perpage;
								if($prev<0)
								$prev=0;
								?>
                        		<table  class='paging' width='100%' border="0">
                          		<tr>
                                  <td align="center"><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b> <span class="txt1">Showing
                                          Page</span>
                                          <?php 
									echo $def_page.'<br/>';
										require("pager.class.php");
									$Pager2 = new Pager($totrec, $def_page,20,20);
									$p_array=$Pager2->getInfo($_SERVER[PHP_SELF].'?store_id='.$id.'&page=%s&'.$geturl.'&search='.$_POST['search']);
									//print_r($p_array);							
									if($p_array['totalPages']>1)

									{
										if(strlen($p_array['firstUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['firstUrl'].'" style="color:'.$row['background_text_color'].'">&lt;&lt; First</a>';
										};

										if(strlen($p_array['prevUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['prevUrl'].'" style="color:'.$row['background_text_color'].'">&lt; Prev</a>';
										};
										
										foreach($p_array['urls'] as $key=>$value)
										{
											if(strlen($key)>0)
											{
												echo '&nbsp;<a href="'.$key.'"  style="color:'.$row['background_text_color'].'">'.$value.'</a>';
											}
											else
											{
												echo '&nbsp;'.$value;
											};														

										};

										if(strlen($p_array['nextUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['nextUrl'].'"  style="color:'.$row['background_text_color'].'">Next &gt;</a>';
										};


										if(strlen($p_array['lastUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['lastUrl'].'"  style="color:'.$row['background_text_color'].'">Last &gt;&gt;</a>';
										};

										
									};
							


									?>
                                  </b></font></td>
                        		  </tr>
						  		<!-- <tr> 
								  <td align='left' nowrap> 
									<? if($start==0){?><span class='thispage'><font color="<? echo $row['background_text_color']?>">&laquo;</font></span> 
									<? }else{?>
									<a href="<?=$_SERVER[PHP_SELF].$geturl."start=0"?>"><font color="<? echo $row['background_text_color']?>">&laquo;</font></a> 
									<? }?>
									<? if($start==0){?>
									<span class='thispage'><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Prev</font></span> 
									<? }else{?>
									<a href="<?=$_SERVER[PHP_SELF].$geturl."start=$prev"?>"><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Prev</font></a> 
									<? }?>								  
									<?

								  for($disp=1,$loop=0;$loop<=$totrec-1;$loop+=$perpage,$disp++)
								  {

									if($start==$loop)
									echo "&nbsp;<font face= Verdana, Arial, Helvetica, sans-serif size= 2 font color= $row[background_text_color]>$disp</font>";
									else
									echo "&nbsp;<a href='$_SERVER[PHP_SELF]".$geturl."start=$loop'><font face= Verdana, Arial, Helvetica, sans-serif size= 2 font color= $row[background_text_color]>$disp</font></a>";
								  }
								  $next=$start+$perpage;
								  if($next>$totrec-1) $next=$loop-$perpage;
								?>								
								    <? if($next>$start){?>
								    <a href="<?=$_SERVER[PHP_SELF].$geturl."start=".$next?>"><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Next</font></a> 
								    <? }else{?>
								    <span class='thispage'><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Next </font></span><? }?>
								    <? if($loop-$perpage>$start){?>
								    <a href="<?=$_SERVER[PHP_SELF].$geturl."start=".($loop-$perpage)?>"><font color="<? echo $row['background_text_color']?>">&raquo;</font></a> 
								    <? }else{?>
								    <span class='thispage'><font color="<? echo $row['background_text_color']?>">&raquo;</font></span><? }?>							  </td>
								  </tr> -->
                        </table></td>
                    </tr>
				  </table>				
				  <?php }
							  else { ?>
							  	<div> <?php echo "<br><font color='$row[background_text_color]' font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>Showing Page ".$def_page."</b><br/><span class=\"txt1\">"; 
							    #########################################################

		require("pager.class.php");
									$Pager2 = new Pager($totrec, $def_page,20,20);
									$p_array=$Pager2->getInfo($_SERVER[PHP_SELF].'?store_id='.$id.'&page=%s&'.$geturl);

////									print_r($p_array);							
									if($p_array['totalPages']>1)

									{
										if(strlen($p_array['firstUrl'])>0)
										{
											echo '&nbsp;&nbsp;<a href="'.$p_array['firstUrl'].'" style="color:'.$row['background_text_color'].'">&lt;&lt; First</a>&nbsp;&nbsp;';
										};

										if(strlen($p_array['prevUrl'])>0)
										{
											echo '&nbsp;&nbsp;<a href="'.$p_array['prevUrl'].'" style="color:'.$row['background_text_color'].'">&lt; Prev</a>&nbsp;&nbsp;';
										};
										
										foreach($p_array['urls'] as $key=>$value)
										{
											if(strlen($key)>0)
											{
												echo '&nbsp;<a href="'.$key.'"  style="color:'.$row['background_text_color'].'">'.$value.'</a>';
											}
											else
											{
												echo '&nbsp;'.$value;
											};														

										};

										if(strlen($p_array['nextUrl'])>0)
										{
											echo '&nbsp;&nbsp;<a href="'.$p_array['nextUrl'].'"  style="color:'.$row['background_text_color'].'">Next &gt;</a>&nbsp;&nbsp;';
										};


										if(strlen($p_array['lastUrl'])>0)
										{
											echo '&nbsp;&nbsp;<a href="'.$p_array['lastUrl'].'"  style="color:'.$row['background_text_color'].'">Last &gt;&gt;</a>&nbsp;&nbsp;';
										};

										
									};
							

							  ########################################################
							  
							  
							  ?>

								<?php }
							   ?>
							 <!--#########content end here ########-->   
			                 <table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="76%" height="25" align="left" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;">
	<!-- NEW CODE -->
	<img src="images/home2.gif" alt="Home" width="17" height="15" hspace="3" vspace="0" align="left">
	<form name="Home" action="shop.php?store_id=<? echo $row['store_id']; ?>" method="post" style="margin:0px;">
<input type="hidden" name="" value="" >
<input name="Home" type="submit" class="clipbutton" style="background-color:<? echo $row['background_color']?>; width:115px; text-align:left; cursor:hand; border:0px; color:<? echo $row['background_text_color']?>;" value="Store Home Page"<? echo $row['text_color']?>"; font-size:11px;"></form>
<!--END NEW CODE -->


	</td>
    <td width="24%" align="right" valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;">
	<!-- NEW CODE -->
<table width="140" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20" align="right"><img src="images/Shopping_Cart2.gif" alt="Shopping Cart" width="17" height="15" hspace="3"></td>
    <td width="120">	
	<form name="Cart" action="shoppingcart.php" method="post" style="margin:0px;">
<input type="hidden" name="cart" value="<?php echo $id; ?>" >
<input name="Home" type="submit" class="clipbutton" style="background-color:<? echo $row['background_color']?>; text-align:left; width:120px; cursor:hand; border:0px; color:<? echo $row['background_text_color']?>;" value="View Shopping Cart"<? echo $row['text_color']?>"; font-size:11px;"></form></td>
  </tr>
</table>

	<!--END NEW CODE -->	</td>
  </tr>
</table>
</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">
		<table border="0" cellpadding="0" cellspacing="0" width="98%" align="center" bgcolor="<? echo $row['table_color'];?>">
		
		<?php
			$i=1;
 			while($row3=mysql_fetch_array($result3))
			{ 
				$actdate=date("F j Y g:i a",$row3['activation_date']);
				
			?>
				<form name="f2" method="post" action="">
				<tr>
					
                  <td align="center" width="160"> <input name="submitclip" type="submit" class="button" value="Add to Cart"> 
                    <input type="hidden" name="status" value="<? echo $row3[0];?>">
					<!--<input type="checkbox" name="status[]" value="<? echo $row3['id'];?>" <?php if(!empty($arr[$i])){echo  "checked";  }?>>-->
				  </td>
					<td width="76%" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td colspan="2" style="padding-top:5px; padding-bottom:10px;"  align="center"><font color="<? echo $row['text_color'];?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2"><strong><? echo $row3['title'];?></strong></font><br>
								<font color="<? echo $row['text_color'];?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2"><? echo $row3[4]; ?></font></td>
							</tr>
							<tr>
								<td align="center">
							<font size="2" color="<? echo $row['text_color']?>" face="Verdana, Arial, Helvetica, sans-serif"><b>
									<? echo "Price: ".$row3['price'];?><br>
									<? echo "Run Time: ".$row3['running_time']." minutes";?><br>
									<? echo "File Size: ".$row3['size']." MB";?>
									</b>
									</font>
								</td>
								<td align="center">
							<font size="2" color="<? echo $row['text_color']?>" face="Verdana, Arial, Helvetica, sans-serif"><b>
									<? echo "Format: ".$row3['vedio_format'];?><br>
									<? echo "Category: ".$row3['categoryname'];?><br>
									<? echo "Updated: ".$actdate;?>
									</b>
									</font>
								</td>
							</tr>
						</table>
					
					</td>
					
					<td width="189" >
					<a href="<?php echo $row3['store_id'];?>/clips/files/preview_files/<?php echo $row3[pre_image] ?>" rel="thumbnail">
					<img src="<?php echo $row3['store_id'];?>/clips/files/img_files/<?php echo $row3['image_file']; ?>" width="160" height="120" border="0"></a></td>
						
				</tr>
				<tr bgcolor="<? echo $row['background_color'];?>"><td colspan="6"><div style="padding: 3px; border-top-width: 1px; border-bottom-style: none; border-right-style: none; border-top-style: solid; border-left-style: none; border-top-color: <? echo $row['text_color']?>;">&nbsp;</div></td></tr>
				</form>
			<? $i++;}		
		?>
		</table>
		</td>
      </tr>
	  
      <tr>
        <td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <!--<td width="15%" align="left"><input name="add_clip" type="image" value="Add Selected"  src="images/selected.gif" align="left" /> </td>
            <td width="28%" align="left"><input name="Add clip2222" type="image" id="Add clip222" value="Top"  src="images/to.gif" align="left" /></td>-->
            
            <td align="center">
			<!--#########content start here ########-->    
						<?php if($_REQUEST['clipname']=="" and $_REQUEST['category']=="")
								{ ?>
						<table cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td colspan="3"><?
								$bypassgeturl=array("start");
								$geturl="";
								foreach($_REQUEST as $key=>$val)
								{
								 if(in_array($key,$bypassgeturl)) continue;
									 else 
									{
///									 print_r($key);
									  if(stristr($key,'store_id')) continue;			  	 
									  if(stristr($key,'page')) continue;
										  $geturl.="$key=$val&";									
									};
								}
								$prev=$start-$perpage;
								if($prev<0)
								$prev=0;
								?>
                                <table  class='paging' width='100%' border="0">
                                  <tr>
                                    <td align="center"><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b> <span class="txt1">Showing
                                            Page</span>
                                            <?php 
							
									$def_page=abs(intval($_GET['page']));
									if($def_page<1) {$def_page=1;}; 
									echo $def_page.'<br/>';
									$Pager = new Pager($totrec, $def_page,20,20);
									$p_array=$Pager->getInfo($_SERVER[PHP_SELF].'?store_id='.$id.'&page=%s&'.$geturl);
									//print_r($p_array);							
									if($p_array['totalPages']>1)

									{
										if(strlen($p_array['firstUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['firstUrl'].'" style="color:'.$row['background_text_color'].'">&lt;&lt; First</a>';
										};

										if(strlen($p_array['prevUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['prevUrl'].'" style="color:'.$row['background_text_color'].'">&lt; Prev</a>';
										};
										
										foreach($p_array['urls'] as $key=>$value)
										{
											if(strlen($key)>0)
											{
												echo '&nbsp;<a href="'.$key.'"  style="color:'.$row['background_text_color'].'">'.$value.'</a>';
											}
											else
											{
												echo '&nbsp;'.$value;
											};														

										};

										if(strlen($p_array['nextUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['nextUrl'].'"  style="color:'.$row['background_text_color'].'">Next &gt;</a>';
										};


										if(strlen($p_array['lastUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['lastUrl'].'"  style="color:'.$row['background_text_color'].'">Last &gt;&gt;</a>';
										};

										
									};
							


									?>
                                    </b></font></td>
                                  </tr>
                               <!--   <tr>
                                    <td align='left' nowrap><? if($start==0){?>
                                        <span class='thispage'><font color="<? echo $row['background_text_color']?>">&laquo;</font></span>
                                        <? }else{?>
                                        <a href="<?=$_SERVER[PHP_SELF].$geturl."start=0"?>"><font color="<? echo $row['background_text_color']?>">&laquo;</font></a>
                                        <? }?>
                                        <? if($start==0){?>
                                        <span class='thispage'><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Prev</font></span>
                                        <? }else{?>
                                        <a href="<?=$_SERVER[PHP_SELF].$geturl."start=$prev"?>"><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Prev</font></a>
                                        <? }?>
                                        <?

								  for($disp=1,$loop=0;$loop<=$totrec-1;$loop+=$perpage,$disp++)
								  {
						
									if($start==$loop)
									echo "&nbsp;<font face= Verdana, Arial, Helvetica, sans-serif size= 2 font color= $row[background_text_color]>$disp</font>";
									else
									echo "&nbsp;<a href='$_SERVER[PHP_SELF]".$geturl."start=$loop'><font face= Verdana, Arial, Helvetica, sans-serif size= 2 font color= $row[background_text_color]>$disp</font></a>";									
								  }
								  $next=$start+$perpage;
								  if($next>$totrec-1) $next=$loop-$perpage;
								?>
                                        <? if($next>$start){?>
                                        <a href="<?=$_SERVER[PHP_SELF].$geturl."start=".$next?>"><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Next</font></a>
                                        <? }else{?>
                                        <span class='thispage'><font color="<? echo $row['background_text_color']?>" font face="Verdana, Arial, Helvetica, sans-serif" size="2">Next </font></span>
                                      <? }?>
                                        <? if($loop-$perpage>$start){?>
                                        <a href="<?=$_SERVER[PHP_SELF].$geturl."start=".($loop-$perpage)?>"><font color="<? echo $row['background_text_color']?>">&raquo;</font></a>
                                        <? }else{?>
                                        <span class='thispage'><font color="<? echo $row['background_text_color']?>">&raquo;</font></span>
                                      <? }?>
                                    </td>
                                  </tr>-->
                              </table></td>
                          </tr>
                        </table>
						<?php }
							  else { ?>
							  	<div style="padding-bottom:10px;"> <?php echo "<br><font color='$row[background_text_color]' font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>Showing Page ".$def_page."</b><Br/>";
							     #########################################################

									$Pager4 = new Pager($totrec, $def_page,20,20);
									$p_array=$Pager4->getInfo($_SERVER[PHP_SELF].'?store_id='.$id.'&page=%s&'.$geturl);

////									print_r($p_array);							
									if($p_array['totalPages']>1)

									{
										if(strlen($p_array['firstUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['firstUrl'].'" style="color:'.$row['background_text_color'].'">&lt;&lt; First</a>';
										};

										if(strlen($p_array['prevUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['prevUrl'].'" style="color:'.$row['background_text_color'].'">&lt; Prev</a>';
										};
										
										foreach($p_array['urls'] as $key=>$value)
										{
											if(strlen($key)>0)
											{
												echo '&nbsp;<a href="'.$key.'"  style="color:'.$row['background_text_color'].'">'.$value.'</a>';
											}
											else
											{
												echo '&nbsp;'.$value;
											};														

										};

										if(strlen($p_array['nextUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['nextUrl'].'"  style="color:'.$row['background_text_color'].'">Next &gt;</a>';
										};


										if(strlen($p_array['lastUrl'])>0)
										{
											echo '&nbsp;<a href="'.$p_array['lastUrl'].'"  style="color:'.$row['background_text_color'].'">Last &gt;&gt;</a>';
										};

										
									};
							

							  ########################################################
							  
							  
							  ?>
								<?php } 
							  
							  
							  
							  ?>
							 <!--#########content end here ########-->   
			</td>
          </tr> 
        </table></td>
				</tr>
			</table>
			<? }
			else echo "<br><div align=center><font color='$row[background_text_color]'<b>Sorry No Records Found.</b></font></div>";?>	
			
<form name="Home" action="shop_search.php?store_id=<? echo $row['store_id']; ?>" method="post" style="margin:0px;">
              <div align="center">
  <input type="hidden" name="" value="" >
  <input name="Home" type="submit" class="clipbutton" style="background-color:<? echo $row['background_color']?>; width:160px; text-align:left; cursor:hand; border:0px; color:<? echo $row['background_text_color']?>;" value="Return to Store Home Page"<? echo $row['text_color']?>"; font-size:11px;">
              </div>
</form><br>
<br>
<br>
<br>
		</td>
	  </tr>
	  
	  <!--
	  <?php if($row4banner2['banner_file']!="")
		  { ?>
		  <tr>
            <td width="80%" align="center" valign="middle" style="padding-top:5px;"><a href="<?php echo $row4banner2['url']; ?>"><img src="banner/<?php echo $row4banner2['banner_file']; ?>" width="50%" height="50" alt="<? echo $row4banner2['alt_text'];?>" border="0"></a></td> 
          </tr>
		 <? }?>
	  <tr>
	  -->
        
    <td height="10" align="center" style="padding-top:10px;"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><strong><a href="index.php" style="color:<? echo $row['background_text_color']?>">NicheClips 
      Home</a> <font color="<? echo $row['background_text_color']?>" face="<?php echo $row['t_font_face'];?>">|</font> 
      <a href="#" onClick="return popup2257(<?php echo $id; ?>);" style="color:<? echo $row['background_text_color']?>">18 
      U.S.C. 2257 </a><br>
      <br>
      </strong></font><font color="<? echo $row['background_text_color']?>" class="txt1"><b>sc-media-group.com 
      offers Video Clip Download Service and 24 hour Customer Support. <br>
      <br>
      Nicheclips Does NOT offer DVD sales or provide subscription services. We 
      do not own or produce any of the content available on sc-media-group.com <br>
      Any purchases made outside of sc-media-group.com website are at your sole discretion.</b></font> 
      <br>
    </td>
      </tr>
      <tr>
        <td align="left" valign="top"></td>
      </tr>
</table>
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" style="padding-top:10px;"><font color="<? echo $row['background_text_color']?>" face="<?php echo $row['t_font_face'];?>"><a href="http://sc-media-group.com/index2.php"><img src="/banner1.gif" alt="sc-media-group.com" width="468" height="60" border="0"></a><br>
            <br>
            </font></td>
    </tr>
        </table>
</div>
<div>
<?php //echo $row['b_text']; ?>

</div>
</body>
</html>
<?php } 
else {
echo "This Shop Is Currently Unavailable";// Not Permited
exit;
}
?>