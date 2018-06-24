<?php session_start();
include("includes/connect.php");
$id=$_REQUEST['cart'];
$_SESSION['store_id']=$id;
if(isset($_POST['datele']))
{
$query4="DELETE from cart where vedioclipid='$_POST[clip_id]' and sessid='$_REQUEST[PHPSESSID]'";
mysql_query($query4) or die(mysql_error());
}

$query3="select vid.title,vid.description,vid.price,vid.image_file,soi.store_id,soi.store_name,soi.transaction_fee,crt.vedioclipid from vedio_clip as vid, cart as crt,store_owner_information as soi where crt.vedioclipid=vid.id and crt.sessid='$_REQUEST[PHPSESSID]' and crt.store_id=soi.store_id";
$result3=mysql_query($query3) or die(mysql_error());
$result4transactionfee=mysql_query($query3) or die(mysql_error());
$row4transactionfee=mysql_fetch_array($result4transactionfee);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><? echo $site_name ?> - Shopping Cart</title>
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="1004">
  <tr>
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top" background="images/GRAYBKG.gif"><br />
      <br />
	    <div align="center">
      <table width="70%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#666666" class="border1">
                    <tr>
                      <td width="14%" height="22" align="center" nowrap="nowrap" background="images/HdrBKG.gif"><font color="#FFFFFF" class="style1">Action</font> </td>
                      <td width="29%" align="center" background="images/HdrBKG.gif"><span class="style1"><font color="#FFFFFF">Clip 
                        Title</font></span></td>
                      <td width="29%" align="center" background="images/HdrBKG.gif"><font color="#FFFFFF" class="style1">Store
                      Name </font></td>
                      <td width="13%" align="center" background="images/HdrBKG.gif"><font color="#FFFFFF" class="style1">Clip
                          Image</font></td>
                      <td width="15%" align="center" nowrap="nowrap" background="images/HdrBKG.gif"><font color="#FFFFFF" class="style1">Clip 
                        Price</font> </td>
                    </tr>
                    <? $count=1; 
		  	 			$total="";
		  
		  while($row3=mysql_fetch_array($result3))
		  		{ ?>
                    <tr>
                      <td align="center" valign="middle"><form action="" method="post" name="f3" id="f3">
                          <input type="hidden" name="cart" value="<?php echo $id; ?>">
                          <input type="hidden" name="clip_id" value="<?php echo $row3['vedioclipid']; ?>" >
                          <input name="datele" type="submit" class="input_btn" onclick="return window.confirm('Do you want to delete this product?')" value="Remove">
                      </form></td>
                      <td align="center" valign="middle">
                      <?php echo $row3['title'];?></td>
                      <td align="center" valign="middle">
                      <?php echo $row3['store_name'];?></td>
                      <td align="center" valign="middle"><img src="<?php echo $row3['store_id']?>/clips/files/img_files/<?php echo $row3['image_file']?>" width="80" height="60" /></td>
                      <td align="center" valign="middle">
                      <?php echo "$".$row3['price'];?></td>
                      <?php $total += $row3['price']; ?>
                    </tr>
				<? 
				$count++;
			}?>
                    <tr>
                      <td align="center" valign="middle">&nbsp;</td>
                      <td align="center" valign="top"><br /></td>
                      <td align="center" valign="top"><br /></td>
                      <td align="center" valign="top" bgcolor="#FFFFCC" class="txt5"><strong>Total</strong></td>
                      <td align="center" valign="top" bgcolor="#FFFFCC" class="txt5">
					    <strong>
                        <?php if($total!=""){ echo "$".($total+$row4transactionfee['transaction_fee']);}else echo "$0"; ?></strong></td>
                      <?php $total += $row3['price']; ?>
                    </tr>
      </table></div>
      <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="72%" height="25" align="left">
            <?php if($total!=""){ echo "<a href=\"shop.php?store_id=$id\" class=\"WhiteLinks\">Continue Shopping</a>";}
			
	else echo "<a href=\"index2.php\" class=\"WhiteLinks\">Return to sc-media-group Home Page</a>"; ?></span></td>
          <td width="28%" align="right">
            <?php if($total!=""){ echo "<a href=\"confirmshopping.php?store_id=$id\" class=\"WhiteLinks\">Check Out</a></span";}
			else echo "<span class=\"txt4\">Your cart is empty.</span>"; ?></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
    <p></p></td>
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
