<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1%" height="133" align="left" valign="top">&nbsp;</td>
        <td width="36%" align="left" valign="bottom"><img src="../images/logo.jpg" width="359" height="123" /></td>
        <td width="63%" align="left" valign="bottom"><img src="../images/logo-1.jpg" width="435" height="92" /></td>
      </tr>
      <tr>
        <td height="32" colspan="3" align="left" valign="middle" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="nav">
          <tr>
            <td align="center">
			
			 <a href="../index2.php" >Home</a>&nbsp;&nbsp;
			      
			| &nbsp;<a href="#" >SUPPORT</a>&nbsp; 
			    
			<?php if(empty($_SESSION['client_id'])){ ?>  |&nbsp;<a href="../store_login.php" >STORE
			LOGIN</a>&nbsp; <? }
			      else{}?>
			<?php if(empty($_SESSION['client_id'])){ ?>|&nbsp;<a href="../store_registration.php" >Open
			a Store </a>&nbsp; <? }
			      else { } ?>
			<?php if(empty($_SESSION['client_id'])){ ?>|&nbsp;<a href="../customer/prepaid_login_form.php">PRE-PAID
			LOGIN</a>&nbsp; <? }
			   	  else {} ?>
			<?php if(empty($_SESSION['client_id'])){ ?> | &nbsp; <a href="../prepaid_registration_form.php" >PRE-PAID
			REGISTRATION</a> &nbsp;<? }
				  else {} ?>
		    <?php if($_SESSION['client_id']!=""){ ?> | &nbsp; <a href="option.php" >MY
		    ACCOUNT</a> &nbsp;<? }
				  else {} ?>
			<?php if($_SESSION['client_id']!=""){ ?> | &nbsp; <a href="../shoppingcart.php" >SHOPPING
			CART</a> &nbsp;<? }
				  else {} ?>
		   	<?php if($_SESSION['client_id']!=""){ ?> | &nbsp; <a href="../customer/logout.php">LOG
		   	OUT</a> &nbsp;<? }
				  else {} ?>
			
			</td>
          </tr>
        </table></td>
        </tr>
 </table>