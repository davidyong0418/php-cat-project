<?php session_start();
include("includes/connect.php"); 
$time=time();
$msg="";
if(isset($_POST['submit']))
{
	$query="update store_owner_information set
			company_rec='$_POST[company_rec]',
			name_rec='$_POST[name_rec]',
			address_rec='$_POST[address_rec]',
			city_rec='$_POST[city_rec]',
			state_rec='$_POST[state_rec]',
			zip_rec='$_POST[zip_rec]',
			country_rec='$_POST[country_rec]'			
			where store_id='$_SESSION[store_id]'";
	$result=mysql_query($query) or die(mysql_error());
	//$qu="update store_owner_information set
		 //updated_date='$time'
		 //where store_id='$_SESSION[store_id]'";
	//$rr=mysql_query($qu) or die(mysql_error());
	$msg="Your changes has been saved";
}
$query="select company_rec,name_rec,address_rec,city_rec,state_rec,zip_rec,country_rec from store_owner_information where store_id='$_SESSION[store_id]'";
$result=mysql_query($query) or die(mysql_query());
$row=mysql_fetch_array($result);


?>

<form name="cus_shop" method="post" action="">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td height="5" align="left"></td>
      </tr>
          
      <tr>
        <td align="center" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td></td>
            <td height="20" align="left"><font color="#FFFFCC"><strong><?php echo $msg; ?></strong></font></td>
          </tr>
          <tr>
            <td></td>
            <td align="left">Store Setup: <strong>2257 Compliance Record-Keeping</strong>
                <hr size="1" /></td>
          </tr>
          <tr>
            <td width="17"></td>
            <td width="100%" height="20" align="left">&nbsp;</td>
          </tr>
        </table>
          <table width="90%" border="1" cellpadding="3" cellspacing="0" bordercolor="#666666">
            <tr>
              <td align="center" bgcolor="#07183F"><table width="80%" border="0" cellspacing="0" cellpadding="3" id="padding-left">
                <tr>
                  <td align="center" colspan="3"></td>
                </tr>
                <tr>
                  <td align="center" valign="top" id="padding-left" colspan="3" ></td>
                </tr>
                <tr>
                  <td width="11%" align="right" valign="top" id="padding-left">&nbsp;</td>
                  <td width="26%" align="left" valign="top" id="padding-left"><strong>Company Name:</strong></td>
                  <td width="63%" align="left" valign="top"><input name="company_rec" type="text" class="input_field" id="company_rec" value="<? echo $row['company_rec']; ?>" /></td>
                </tr>
                <tr>
                  <td width="11%" align="right" valign="top" id="padding-left">&nbsp;</td>
                  <td width="26%" align="left" valign="top" id="padding-left"><strong>Name:</strong></td>
                  <td width="63%" align="left" valign="top"><input name="name_rec" type="text" class="input_field" id="name_rec" value="<? echo $row['name_rec']; ?>" /></td>
                </tr>
                <tr>
                  <td align="right" valign="top" id="padding-left">&nbsp;</td>
                  <td align="left" valign="top" id="padding-left"><strong>Address:</strong></td>
                  <td align="left" valign="top"><input name="address_rec" type="text" class="input_field" id="address_rec" 
			value="<? echo $row['address_rec']; ?>"/></td>
                </tr>
                <tr>
                  <td align="right" id="padding-left">&nbsp;</td>
                  <td align="left" id="padding-left"><strong>City:</strong></td>
                  <td align="left" valign="top"><input name="city_rec" type="text" id="city_rec" value="<? echo $row['city_rec']; ?>" class="input_field"/></td>
                </tr>
                <tr>
                  <td align="right" valign="middle" id="padding-left">&nbsp;</td>
                  <td align="left" valign="middle" id="padding-left"><strong>State:</strong></td>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="13%"><input name="state_rec" type="text" id="state_rec" value="<? echo $row['state_rec']; ?>" class="input_field"/></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="right" valign="middle" id="padding-left">&nbsp;</td>
                  <td align="left" valign="middle" id="padding-left"><strong>Zip Code:</strong></td>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="13%"><input name="zip_rec" type="text" id="zip_rec" value="<? echo $row['zip_rec']; ?>" class="input_field"/></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="right" valign="middle" id="padding-left">&nbsp;</td>
                  <td align="left" valign="middle" id="padding-left"><strong>Country:</strong></td>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="13%"><input name="country_rec" type="text" id="country_rec" value="<? echo $row['country_rec']; ?>" class="input_field" /></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="left" id="padding-left">&nbsp;</td>
                  <td align="left" id="padding-left">&nbsp;</td>
                  <td height="25" align="left"><input type="submit" name="submit" value="Save" class="input_btn"/></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
      </tr>
</table>
</form>