<?php session_start(); ?><style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="left" valign="top"><img src="images/nichelogo2.gif" width="525" height="42" /></td>
  </tr>
  <tr>
    <td height="38" align="left" valign="middle" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="nav">
      <tr>
        <td align="center"><div align="left"><a href="index.php" >HOME</a> &nbsp;&nbsp;| &nbsp;<a href="#" >SUPPORT</a>&nbsp;
                  <?php if(empty($_SESSION['client_id'])){ ?>
          |&nbsp;<a href="store_login.php" >STORE LOGIN</a>&nbsp;
          <? }
			      else{}?>
          <?php if(empty($_SESSION['client_id'])){ ?>
          |&nbsp;<a href="store_registration.php" >OPEN A STORE</a>&nbsp;
          <? }
			      else { } ?>
          <?php if(empty($_SESSION['client_id'])){ ?>
          |&nbsp;<a href="customer/prepaid_login_form.php">PRE-PAID LOGIN</a>&nbsp;
          <? }
			   	  else {} ?>
          <?php if(empty($_SESSION['client_id'])){ ?>
          | &nbsp; <a href="prepaid_registration_form.php" >PRE-PAID REGISTRATION</a> &nbsp;
          <? }
				  else {} ?>
          <?php if($_SESSION['client_id']!=""){ ?>
          | &nbsp; <a href="customer/option.php" >MY ACCOUNT</a> &nbsp;
          <? }
				  else {} ?>
          <?php if($_SESSION['client_id']!=""){ ?>
          | &nbsp; <a href="shoppingcart.php" >SHOPPING CART</a> &nbsp;
          <? }
				  else {} ?>
          <?php if($_SESSION['client_id']!=""){ ?>
          | &nbsp; <a href="customer/logout.php">LOG OUT</a> &nbsp;
          <? }
				  else {} ?>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
