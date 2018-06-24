<?php session_start(); ?><style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="65" align="left" valign="top" background="/images/CFZLogo_PS3.png"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td width="46" align="right"><a href="/shoppingcart.php"><img src="/images/shopping_cart.gif" alt="Shopping Cart" width="15" height="15" border="0" /></a></td>
        <td width="139" align="right"><a href="/shoppingcart.php" class="WhiteLinks"><strong>View Shopping Cart </strong></a></td>
        <td width="15" align="right">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="nav">
      <tr>
        <td height="30" align="center"><div align="center">
		<a href="/index2.php" >Home</a> &nbsp;
              <?php if(empty($_SESSION['client_id'])){ ?>
              | &nbsp; <a href="/registration_new_account.php" >Open an Account</a>&nbsp;
              <? }
			      else{}?>
              <?php if(empty($_SESSION['client_id'])){ ?>
              | &nbsp; <a href="/customer/prepaid_login_form.php" >Account Login</a>&nbsp;
              <? }
			      else { } ?>
              <?php if(empty($_SESSION['client_id'])){ ?>
              | &nbsp; <a href="/store_registration.php">Open a Store</a>&nbsp;
              <? }
			   	  else {} ?>
				  
              <?php if(empty($_SESSION['client_id'])){ ?>
              | &nbsp; <a href="/store_login.php" >Store Login</a> &nbsp;
              <? }
				  else {} ?>
              <?php if($_SESSION['client_id']!=""){ ?>
              | &nbsp; <a href="/customer/option.php" >My Account </a> &nbsp;
              <? }
				  else {} ?>
              <?php if($_SESSION['client_id']!=""){ ?>
              | &nbsp; <a href="/shoppingcart.php" >Shopping Cart </a> &nbsp;
              <? }

				  else {} ?>
<?php if($_SESSION['client_id']!=""){ ?>
              | &nbsp; <a href="/customer/logout.php">Logout</a>&nbsp;
               <? }

                                                                                else {} ?>
<?php if($_SESSION['client_id']!=""){ ?>
              | &nbsp; <a href="/store_login.php">Store Owner Login</a>&nbsp;
               <? }
				  else {} ?>

        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
