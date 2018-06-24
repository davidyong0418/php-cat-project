<?php session_start();
include("includes/connect.php");
include("include/password_on.php");
if(empty($_SESSION['account_number']))
{
header("location:prepaid_login_form.php");
}
else{

}


$id=$_REQUEST['cart'];
$_SESSION['store_id']=$id;
$amount1="";
$fullamount1="";
$tamount="";
$query3="select vid.title,vid.description,vid.price,vid.image_file,soi.store_name,soi.transaction_fee,crt.vedioclipid from vedio_clip as vid, cart as crt,store_owner_information as soi where crt.vedioclipid=vid.id and crt.sessid='$_REQUEST[PHPSESSID]' and crt.store_id=soi.store_id";
$result4transactionfee=mysql_query($query3) or die(mysql_error());
$row4transactionfee=mysql_fetch_array($result4transactionfee);
$result4fulltotal=mysql_query($query3);
while($row4fulltotal=mysql_fetch_array($result4fulltotal))
{
	$fullamount1+=$row4fulltotal['price'];
}
$fullamount1+=$row4transactionfee['transaction_fee'];
$query4fund="select Prefund_amount,Life_total from clients where account_number='$_SESSION[account_number]'";
$res4fund=mysql_query($query4fund)or die(mysql_error());
$rec4fund=mysql_fetch_array($res4fund);
if($rec4fund['Prefund_amount']!="")
{
	$amount1=$rec4fund['Prefund_amount'];
}
else{
$amount1=$rec4fund['Prefund_amount'];
}
$lifetotal1=($amount1-$fullamount1);

if($_POST['submit'])
{
	if($_REQUEST['option']=='0')
	{
		  header("location:index2.php");
	}
	else{

	$sql="select vid.title,vid.price,vid.id,crt.store_id from vedio_clip as vid, cart as crt,store_owner_information as soi where crt.vedioclipid=vid.id and crt.sessid='$_REQUEST[PHPSESSID]' and crt.store_id=soi.store_id";
	$res=mysql_query($sql);
	$sqlres=mysql_query($sql);
	$res4email=mysql_fetch_array($sqlres);
	$toResult4ClipRecord=mysql_query($sql);
	$mm=mysql_num_rows($toResult4ClipRecord);
	$date=date('Y-m-d');

	//######################### QUERY FOR TOTAL SOLD CLIP ON A DAY #######################
	
	$query4SoldClip="select * from items where Store_id='$_REQUEST[store_id]' and Date='$date'";
	$result4SoldClip=mysql_query($query4SoldClip);
	$totalSoldClip=mysql_num_rows($result4SoldClip);
		
	//######################### QUERY FOR TOTAL SOLD CLIP ON A DAY #######################
	$tatalclip=$mm+$totalSoldClip;
	$i=$tatalclip;

	while($rec=mysql_fetch_array($res))
		{
			$rec['title'] = mysql_real_escape_string($rec['title']);
			if($i == 0)
			{
				$query="insert into items set
						client_id='$_SESSION[client_id]',
						item_name='$rec[title]',
						Date='$date',
						Download_Date='$date',
						Store_id='$rec[store_id]',
						price='$rec[price]',
						shopownerprice='$rec[price]',
						total='$rec[price]',
						vedioclipid=$rec[id]";
			}
			else
				{
				$query="insert into items set
						client_id='$_SESSION[client_id]',
						item_name='$rec[title]',
						Date='$date',
						Download_Date='$date',
						Store_id='$rec[store_id]',
						price='$rec[price]',
						shopownerprice='$rec[price]',
						total='$rec[price]',
						vedioclipid=$rec[id]";
				}
				
							
			$result=mysql_query($query);
			$query3="select tr_id from items order by tr_id DESC LIMIT 0,1";
			$result3=mysql_query($query3);
			$row3=mysql_fetch_array($result3);
            $query4="insert into items set
					 tran='$row3[tr_id]'";
			$result4=mysql_query($query4);
			$query5="update clients set
					 Prefund_amount='$lifetotal1'
					 where account_number='$_SESSION[account_number]'";
			$result5=mysql_query($query5);
			$query4TotalSoldClip="select sold_time,id from vedio_clip where title='$rec[title]' and store_id='$rec[store_id]'";
			$result4TotalSoldClip=mysql_query($query4TotalSoldClip);
			$row4TotalSoldClip=mysql_fetch_array($result4TotalSoldClip);
			$soldtime=$row4TotalSoldClip['sold_time'];
			$soldtime+=1;
			$query4ClipSold="update vedio_clip set
							 sold_time='$soldtime'
							 where id='$row4TotalSoldClip[id]'";
			$result4ClipSold=mysql_query($query4ClipSold);
	
		}


	#################
	
				$sendallquery='select * from cart where sessid="'.$_REQUEST[PHPSESSID].'" order by store_id';			
				$allres=mysql_query($sendallquery) or die(mysql_error());
				$shopid=0;
				$em=0;
				$fm=0;

				$subject	="You Have a New Sale";
				$from = "admin@sc-media-group.com";
				$headers = "From: $from";
				$note="Please Login to your account for full details.";

				$messages=array();
				$message='';
				$price=0;

				while($rd=mysql_fetch_assoc($allres))
					{
					
					if($em==0)
						{
								$shop=$rd['store_id'];		
								$query4EmailIdOfShopOwner="select s_email from store_owner_information where store_id='".$shop."'";							
								$result4SendingMail=mysql_query($query4EmailIdOfShopOwner) or die(mysql_error());
								$row4SendingMail=mysql_fetch_assoc($result4SendingMail);	
								$query4trans="select transaction_fee from store_owner_information where store_id='".$shop."'";							
								$result4query4transl=mysql_query($query4trans) or die(mysql_error());
								$row4trans=mysql_fetch_assoc($result4query4transl);
								$query4ClientName="select id,last_name,email from clients where id='$_SESSION[client_id]'";
								$result4ClientName=mysql_query($query4ClientName);
								$row4ClientNmae=mysql_fetch_assoc($result4ClientName);		
								$em++;
								$messages[$em]['store_id']=$shop;
								$messages[$em]['to']=$row4SendingMail['s_email'];
								$messages[$em]['fee']=$row4trans['transaction_fee'];
								$messages[$em]['id']=$row4ClientNmae['id'];
								$messages[$em]['last_name']=$row4ClientNmae['last_name'];
								$messages[$em]['email']=$row4ClientNmae['email'];
								$shop=$rd['store_id'];
								$price=0;

						}
						else
						{
							if($shop!=$rd['store_id'])
							{								
								$messages[$em]['price']=$price;
								$shop=$rd['store_id'];
								$query4EmailIdOfShopOwner="select s_email from store_owner_information where store_id='".$shop."'";							
								$result4SendingMail=mysql_query($query4EmailIdOfShopOwner) or die(mysql_error());
								$row4SendingMail=mysql_fetch_array($result4SendingMail);		
								$query4trans="select transaction_fee from store_owner_information where store_id='".$shop."'";							
								$result4query4transl=mysql_query($query4trans) or die(mysql_error());
								$row4trans=mysql_fetch_array($result4query4transl);	

								$query4ClientName="select id,last_name,email from clients where id='$_SESSION[client_id]'";
								$result4ClientName=mysql_query($query4ClientName);
								$row4ClientNmae=mysql_fetch_array($result4ClientName);		
								$em++;
								$messages[$em]['store_id']=$shop;
								$messages[$em]['to']=$row4SendingMail['s_email'];
								$messages[$em]['fee']=$row4trans['transaction_fee'];
								$messages[$em]['id']=$row4ClientNmae['id'];
								$messages[$em]['email']=$row4ClientNmae['email'];
								$fm=0;
								$price=0;
							}

						};
								$fm++;
								$query4clip="select * from vedio_clip where id=".$rd['vedioclipid'];							
								$result4clip=mysql_query($query4clip) or die(mysql_error());
								$row4clip=mysql_fetch_assoc($result4clip);	
								$price=$price+$row4clip['price'];
								$messages[$em]['files'][$fm]=$row4clip['title'];
					
					};
				$messages[$em]['price']=$price;
				$toadmin="admin@sc-media-group.com";			

				
				$i=0;
				while($toRow4ClipRecord=mysql_fetch_array($toResult4ClipRecord))
				{
					$i++;
					if($i==$mm){
					$clipTitle.=$toRow4ClipRecord['title'];
					}else{
					$clipTitle.=$toRow4ClipRecord['title'].",";
					}
				}
				

				foreach($messages as $key=>$values)
				{
					$clipTitle=implode(", ",$values['files']);
					$message="Shop ID: ".$values['store_id']."\nSale Amount: $".($values['price']-$values['transaction_fee'])."\nClient ID: ".$values['id']." ".$values['']."\nOrdered: ".$clipTitle;

				$s= round($i/10)-($i/10);
						if($s!=0)
							{

								mail($values['to'], $subject, $message, $headers);
							}
							else
							{
								 mail($values['to'], $subject, $message, $headers);
							};


				};

			/*	$message="Shop ID: ".$res4email['store_id']."\n 
				Customer Name: ".$row4ClientNmae['id']." ".$row4ClientNmae['last_name']."
				Customer Email: ".$row4ClientNmae['email']."\n
				".$note;*/

			#################

			
			$query2="DELETE from cart where sessid='$_REQUEST[PHPSESSID]'";		
			mysql_query($query2);
			
			
			header("location:customer/downloadclips.php");
			exit;

	}
		
}

$fullamount="";
$amount="";
$query3="select vid.title,vid.description,vid.price,vid.image_file,soi.store_name,soi.transaction_fee,crt.vedioclipid from vedio_clip as vid, cart as crt,store_owner_information as soi where crt.vedioclipid=vid.id and crt.sessid='$_REQUEST[PHPSESSID]' and crt.store_id=soi.store_id";
$result3=mysql_query($query3) or die(mysql_error());
$result4=mysql_query($query3) or die(mysql_error());
while($row4=mysql_fetch_array($result4))
{
	$fullamount+=$row4['price'];
}
$fullamount+$fullamount+$row4['transaction_fee'];
$sql="select Prefund_amount,Life_total from clients where account_number='$_SESSION[account_number]'";
$res=mysql_query($sql)or die(mysql_error());
$rec=mysql_fetch_array($res);
if($rec['Prefund_amount']!="")
{
	$amount=$rec['Prefund_amount'];
}
else{
$amount=$rec['Prefund_amount'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? echo $site_name ?> - Confirm Your Order</title>
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {	font-family: Verdana;
	font-size: 12px;
	font-weight: bold;
    font-family: Verdana; font-size: 12px; font-weight: bold; color: #FFFFFF; 
}
.style2 {
	color: #000000;
	font-weight: bold;
}
-->
</style></head>

<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <td align="center" valign="top" background="../images/GRAYBKG.gif"><?php if($fullamount > $amount)
				{
										echo "<br><br>";
										echo "<div style='width:600px; padding:5px' class='border2'>";
										echo "<span class='txt5'>Your account balance is insufficient for purchasing these clips, you will need to <a href='/customer/option.php' class='txt5'><strong>add credit to your account</strong></a> or you may try removing some clips from your shopping cart.";
					echo "<br><br>"; 
					echo "</span></div><p></p><p></p>"; 
				}
			  else 
			  { ?>
		 <br />
		 <table width="70%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="left" class="whitetxtcolor"><strong>Confirm Your Order </strong></td>
          </tr>
          <tr>
            <td colspan="2"><img src="/images/spacer.gif" width="10" height="10" /></td>
          </tr>
          <tr>
            <td width="42%" align="left"><strong>Your current account balance is: </strong></td>
            <td width="58%" align="left"><div id="BalanceBox" style="width:100px"><?php echo "$".number_format($amount, 2, '.', ' '); ?></div></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td align="left"><p><strong>Your  balance after this order will be: </strong></p>                </td>
            <td align="left"><div id="BalanceBox2" style="width:100px"><?php echo "$".($amount-$fullamount1); ?></div></td>
          </tr>
        </table>
		 <br />
		 <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
            <td width="91%" align="center" valign="top"><form name="confirmshopping" action="" method="post"><table width="100%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#666666" class="border1" style="border:1px solid #000000;">
                    <tr> 
                      <td width="6%"  height="22" align="center" bgcolor="#333333"><font color="#FFFFFF" class="style1">Item</font></td>
                      <td width="30%" align="center" bgcolor="#333333"><font color="#FFFFFF" class="style1">Clip 
                        Title</font></td>
                      <td align="center" bgcolor="#333333" width="39%"><font color="#FFFFFF" class="style1">Store
                          Name </font></td>
                      
                      <td width="25%" align="center" bgcolor="#333333"><font color="#FFFFFF" class="style1">Clip 
                        Price</font> </td>
                    </tr>
                    <? $count=1; 
		  $total="";
		  
		  while($row3=mysql_fetch_array($result3))
		  		{ ?>
                    <tr> 
                      <td align="center" valign="top"><?php echo $count; ?></td>
                      <td align="center" valign="top"><?php echo $row3['title'];?></td>
                      <td align="center" valign="top"><?php echo $row3['store_name'];?></td>
                      
                      <td align="center" valign="top"><?php echo "$".$row3['price'];?>
                      <?php $total += $row3['price']; ?>
					  <input type="hidden" name="cart" value="<?php echo $id; ?>" />
                      <input type="hidden" name="clip_id" value="<?php echo $row3['vedioclipid']; ?>" />
                    </td></tr>
                    <? 
				$count++;
			}?>
                    <tr> 
                      <td colspan="2">&nbsp;</td>
                        <td align="center" colspan="1">&nbsp;</td>
                      <td align="left" bgcolor="#FFFFCC" class="txt5"><strong>                        Sub Total: <?php echo "$".$total; ?>                      </strong></td>
                      </tr>
					<tr> 
                      <td colspan="2">&nbsp;</td>
                        <td align="center" colspan="1">&nbsp;</td>
                      <td align="left" bgcolor="#FFFFCC">&nbsp;</td>
                      </tr>
					<tr> 
                        <td height="20" colspan="2">&nbsp;</td>
                      <td align="center" colspan="1">&nbsp;</td>
                      <td align="left" bgcolor="#FFFFCC">
                        <span class="style2">Total: 
                        <?php if($total!=""){ echo "$".($tamout=$total+$row4transactionfee['transaction_fee']);}else echo "$0"; ?>                          
                        </span></td>
                      </tr>
                  </table>
				 <br>
				  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#5E5E5E">
					  <tr><td colspan="3" align="center"><input name="option" type="radio" value="1" align="middle" />
                          <span class="style1"> YES I agree</span>
                          &nbsp;&nbsp;&nbsp;
                          <input name="option" type="radio" value="0" checked="checked" align="middle" />
                          <span class="style1">NO I want to quit</span></td>
					  </tr>
				  </table>
				  <br>
				  <input type="submit" name="submit" value="Submit" class="input_btn">
				  </form>			    </td>
            </tr>
        </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        <? } ?>
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
