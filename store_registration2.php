<?php
//ini_set("display_errors","1");
include("object.php");
 $per=$obj4sitepermission->sitepermission();
 if($per=='1')
 {
include("includes/connect.php");
$msg="";
$storename="";
$storeid="";

if(isset($_POST['submit']))
{	
	$time=time();
	$fname=$_POST['s_first_name'];
	$lname=$_POST['s_last_name'];
	$storename=$fname." ".$lname;
	
	$_SESSION['success_prepaid_reg']="";
	
	$sql_select ="select * from store_owner_information where s_user_name='".$_POST['s_user_name']."' ";
	$user_row = mysql_num_rows(mysql_query($sql_select));
	
	if($user_row =="0"){
		$query="insert into store_owner_information set
			account_type='$_POST[account_type]',
			s_user_name='$_POST[s_user_name]',
			s_password='$_POST[s_password]',
			user_type='store_owner',
			s_first_name='$fname',
			s_last_name='$lname',
			s_add='$_POST[s_add]',
			s_city='$_POST[s_city]',
			s_state='$_POST[s_state]',
			s_zip='$_POST[s_zip]',
			s_country='$_POST[s_country]',
			s_phone='$_POST[s_phone]',
			s_fax='$_POST[s_fax]',
			s_email='$_POST[s_email]',
			busigness_tax_id='$_POST[s_busigness_tax]',
			paypal='$_POST[paypal]',
			paypalemail='$_POST[paypalemail]',
			checkpayableto='$_POST[checkpayableto]',
			cheques_payable='$_POST[s_cheques_payable]',
			payoutnwt='$_POST[payoutnwt]',
			bankName='$_POST[bankName]',
			bankAccountNo='$_POST[bankAccountNo]',
			bankRoughting='$_POST[bankRoughting]',
			swift='$_POST[SWIFT]',
			time_loged='$time',
			approved='0'";			
		
	$result=mysql_query($query) or die(mysql_error());
	
	$storeid = mysql_insert_id();
	
	//Comment by devendra pal 05-12-08
	/*
	$query2="select store_id from store_owner_information
				where s_user_name='$_POST[s_user_name]' and s_password='$_POST[s_password]'";
	$result2=mysql_query($query2) or die(mysql_error());
	$row=mysql_fetch_array($result2);
	$storeid=$row['store_id'];
	*/
	
	$query3="insert into font set store_id='$storeid'";
	$result3=mysql_query($query3) or die(mysql_error());	
	$file=getcwd();
	$newfolder = $storename;
               $file = $file."/storeowner/".$storeid;
				if(!file_exists($file)) {
							
				             mkdir($file,0777);
							 chmod($file,0777);
							 
                               }
                $file1 = $file."/image/";
                   if(!file_exists($file1)) {
                             
							 mkdir($file1,0777);
							 chmod($file1,0777);
                               }
				$file2 = $file."/video/";
                   if(!file_exists($file2)) {
                          
						     mkdir($file2,0777);
							 chmod($file2,0777);
                               }
				$file3 = $file."/preview/";
                   if(!file_exists($file3)) {
                           
						     mkdir($file3,0777);
							 chmod($file3,0777);
                               }
				$file4 = $file."/banner/";
                   if(!file_exists($file4)) {
                       		
					         mkdir($file4,0777);
							 chmod($file4,0777);
                               }
		
		

	$to="admin@sc-media-group.com";
	$from ="admin@sc-media-group.com";
	$subject="CFZ STORE PENDING APPROVAL ";
	$message="Store waiting to be approved";

                    $headers = 'From: admin@sc-media-group.com' . "\r\n".
                   'Reply-To: admin@sc-media-group.com'. "\r\n".
                   'Return-Path:admin@sc-media-group.com' . "\r\n".
                    'X-Mailer: PHP/' . phpversion();

                   mail($to, $subject, $message, $headers, "-f $from");

	header("location:account_confirm.php");
	exit();
					   
		
		/***************************/
		
		setcookie("account_type", "", time()-3600);
		setcookie("s_user_name", "", time()-3600);
		setcookie("store_owner", "", time()-3600);
		setcookie("s_first_name", "", time()-3600);
		setcookie("s_last_name", "", time()-3600);
		setcookie("s_add", "", time()-3600);
		setcookie("s_city", "", time()-3600);
		setcookie("s_state", "", time()-3600);
		setcookie("s_zip", "", time()-3600);
		setcookie("s_country", "", time()-3600);
		setcookie("s_phone", "", time()-3600);
		setcookie("s_fax", "", time()-3600);
		setcookie("s_email", "", time()-3600);
		setcookie("s_busigness_tax", "", time()-3600);
		setcookie("paypal", "", time()-3600);
		setcookie("paypalemail", "", time()-3600);
		setcookie("checkpayableto", "", time()-3600);
		setcookie("s_cheques_payable", "", time()-3600);
		setcookie("payoutnwt", "", time()-3600);
		setcookie("bankName", "", time()-3600);
		setcookie("bankAccountNo", "", time()-3600);
		setcookie("bankRoughting", "", time()-3600);
		setcookie("SWIFT", "", time()-3600);	
		
		/**************************/
		
		header("location:account_confirm.php");
		exit;
	}
	else{
		setcookie("account_type", $_POST['account_type'], time()+3600);
		setcookie("s_user_name", $_POST['s_user_name'], time()+3600);
		setcookie("store_owner", $_POST['store_owner'], time()+3600);
		setcookie("s_first_name", $_POST['s_first_name'], time()+3600);
		setcookie("s_last_name", $_POST['s_last_name'], time()+3600);
		setcookie("s_add", $_POST['s_add'], time()+3600);
		setcookie("s_city", $_POST['s_city'], time()+3600);
		setcookie("s_state", $_POST['s_state'], time()+3600);
		setcookie("s_zip", $_POST['s_zip'], time()+3600);
		setcookie("s_country", $_POST['s_country'], time()+3600);
		setcookie("s_phone", $_POST['s_phone'], time()+3600);
		setcookie("s_fax", $_POST['s_fax'], time()+3600);
		setcookie("s_email", $_POST['s_email'], time()+3600);
		setcookie("s_busigness_tax", $_POST['s_busigness_tax'], time()+3600);
		setcookie("paypal", $_POST['paypal'], time()+3600);
		setcookie("paypalemail", $_POST['paypalemail'], time()+3600);
		setcookie("checkpayableto", $_POST['checkpayableto'], time()+3600);
		setcookie("s_cheques_payable", $_POST['s_cheques_payable'], time()+3600);
		setcookie("payoutnwt", $_POST['payoutnwt'], time()+3600);
		setcookie("bankName", $_POST['bankName'], time()+3600);
		setcookie("bankAccountNo", $_POST['bankAccountNo'], time()+3600);
		setcookie("bankRoughting", $_POST['bankRoughting'], time()+3600);
		setcookie("SWIFT", $_POST['SWIFT'], time()+3600);	
		
		$_SESSION['success_prepaid_reg'] ="Sorry! The username <b>".$_POST['s_user_name']."</b> already exists.";
		header("location: store_registration.php");
		exit;
	}
}
?>
<html>
<head>
<title><? echo $site_name ?> - Sell Your Video Clips </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style_main/style.css" type="text/css" />

<script language="JavaScript">

function PayP() {
   PayPalEmail.style.display="block";
   CheckPayableTo.style.display="none";
   WireTransfer.style.display="none";
}

function Chk() {
   PayPalEmail.style.display="none";
   CheckPayableTo.style.display="block";
   WireTransfer.style.display="none";
}
function WT() {
   PayPalEmail.style.display="none";
   CheckPayableTo.style.display="none";
   WireTransfer.style.display="block";
}

function checkvalidation()
{
	if(document.s_registration.account_type.value=="")
	{
		alert("Please select a account type");
		document.s_registration.account_type.focus();
		return false;
	}
	if(document.s_registration.s_user_name.value=="")
	{
		alert("Please select a user name");
		document.s_registration.s_user_name.focus();
		return false;
	}
	if(document.s_registration.s_password.value=="")
	{
		alert("Please chose a password");
		document.s_registration.s_password.focus();
		return false;
	}
	if(document.s_registration.s_cpassword.value=="")
	{
		alert("Please confirm your password");
		document.s_registration.s_cpassword.focus();
		return false;
	}
	if(document.s_registration.s_cpassword.value!=document.s_registration.s_password.value)
	{
		alert("Confirm password did not match");
		document.s_registration.s_cpassword.focus();
		return false;
	}
	if(document.s_registration.s_first_name.value=="")
	{
		alert("Please enter your first name");
		document.s_registration.s_first_name.focus();
		return false;
	}
	if(document.s_registration.s_last_name.value=="")
	{
		alert("Please enter your last name");
		document.s_registration.s_last_name.focus();
		return false;
	}
	if(document.s_registration.s_add.value=="")
	{
		alert("Please enter your address");
		document.s_registration.s_add.focus();
		return false;
	}
	if(document.s_registration.s_city.value=="")
	{
		alert("Please enter your city name");
		document.s_registration.s_city.focus();
		return false;
	}
	if(document.s_registration.s_state.value=="")
	{
		alert("Please enter your state name");
		document.s_registration.s_state.focus();
		return false;
	}
	if(document.s_registration.s_zip.value=="")
	{
		alert("Please enter your zip code");
		document.s_registration.s_zip.focus();
		return false;
	}
	if(document.s_registration.s_country.value=="")
	{
		alert("Please enter your country name");
		document.s_registration.s_country.focus();
		return false;
	}
	if(document.s_registration.s_phone.value=="")
	{
		alert("Please enter your phone number");
		document.s_registration.s_phone.focus();
		return false;
	}

	if(document.s_registration.s_email.value=="")
	{
		alert("Please enter your mail id");
		document.prepaid_login_form.s_email.focus();
		return false;
	}
	if(document.s_registration.s_email.value!="")
	{
	var x = document.s_registration.s_email.value;
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(x))
	{return true;}
	else alert('NO! Incorrect email address');
	return false;
	}
	if(document.s_registration.s_busigness_tax.value=="")
	{
		alert("Please enter your Busigness tax id or ss id");
		document.s_registration.s_busigness_tax.focus();
		return false;
	}
	if(document.s_registration.paypalemail.value!="")
	{
	var x = document.s_registration.paypalemail.value;
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(x))
	{return true;}
	else alert('NO! Incorrect email address');
	return false;
	}
	if(document.s_registration.s_cheques_payable.value=="")
	{
		alert("Please enter your cheques payable name to");
		document.s_registration.s_cheques_payable.focus();
		return false;
	}
	return true;
}

</script>
<style type="text/css">
<!--
.style1 {font-size: 10px}
-->
</style>
</head>
<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr> 
    <td height="856" align="center" valign="top" background="images/GRAYBKG.gif"> 
<!--#########wright your code here#########-->
   <form name="s_registration" method="post" action="" onSubmit="return checkvalidation();">
        <table width="70%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="whitetxtcolor">&nbsp;</td>
          </tr>
          <tr> 
            <td class="whitetxtcolor"><strong>SELL YOUR VIDEO CLIPS </strong></td>
          </tr>
          <tr> 
            <td><img src="images/spacer.gif" width="10" height="10"></td>
          </tr>
        </table>
        <br>
        <table width="74%" border="0" align="center" cellpadding="3" cellspacing="0" class="border1">
          <tr> 
            <td colspan="3" align="center" class="ErrorText"><? echo $msg; ?></td>
          </tr>
          <?php if(@$_SESSION['success_prepaid_reg']!=""){?>
          <tr> 
            <td colspan="3" align="center" class="whitetxtcolor"><? echo $_SESSION['success_prepaid_reg'];?></td>
          </tr>
          <?php }?>
          <tr> 
            <td width="9%">&nbsp;</td>
            <td><strong>Account Type:</strong></td>
            <td width="62%"><select name="account_type" class="input_field">
                <option value="">Select One</option>
                <option value="business" <?php if($_COOKIE['account_type']=="business") {echo "selected"; }?> >Business</option>
                <option value="individual" <?php if($_COOKIE['account_type']=="individual") {echo "selected"; }?>>Individual</option>
            </select></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>User Name:</strong></td>
            <td><input name="s_user_name" type="text" class="input_field" value=""></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Password:</strong></td>
            <td><input name="s_password" type="password" class="input_field" value=""></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Confirm Password:</strong></td>
            <td><input name="s_cpassword" type="password" class="input_field" value=""></td>
          </tr>
          <!--<tr>
	  <td>&nbsp;</td>
		<td>Store Nmae</td>
		<td><input name="store_name" type="text" class="input_field" value=""></td>
	</tr>-->
          <tr> 
            <td colspan="3" background="images/HdrBKG.gif"><img src="images/spacer.gif" width="1" height="19"></td>
            <!--<td colspan="2" style="padding-top:10px; padding-bottom:8px;"><strong>Shop Name - This would create an URL http://stompproductions.com/shop_name </strong></td>-->
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>First Name:</strong></td>
            <td><input name="s_first_name" type="text" class="input_field" value="<?php echo $_COOKIE['s_first_name'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Last Name:</strong></td>
            <td><input name="s_last_name" type="text" class="input_field" value="<?php echo $_COOKIE['s_last_name'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Address:</strong></td>
            <td><input name="s_add" type="text" class="input_field" value="<?php echo $_COOKIE['s_add'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>City:</strong></td>
            <td><input name="s_city" type="text" class="input_field" value="<?php echo $_COOKIE['s_city'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>State/Province:</strong></td>
            <td>
			<select name="s_state" class="input_field" value="<?php echo $_COOKIE['s_state'];?>">
                <option value="default" selected>-- Select State --</option>
                <option value="AK">Alaska</option>
                <option value="AL">Alabama</option>
                <option value="AR">Arkansas</option>
                <option value="AZ">Arizona</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DC">Dist. of Columbia</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="IA">Iowa</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="MA">Massachusetts</option>
                <option value="MD">Maryland</option>
                <option value="ME">Maine</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MO">Missouri</option>
                <option value="MS">Mississippi</option>
                <option value="MT">Montana</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="NE">Nebraska</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NV">Nevada</option>
                <option value="NY">New York</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VA">Virginia</option>
                <option value="VT">Vermont</option>
                <option value="WA">Washington</option>
                <option value="WI">Wisconsin</option>
                <option value="WV">West Virginia</option>
                <option value="WY">Wyoming</option>
              </select>
			
			
			
			
			</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Zip:</strong></td>
            <td><input name="s_zip" type="text" class="input_field" value="<?php echo $_COOKIE['s_zip'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Country:</strong></td>
            <td><select type="text" class="input_field"  name="s_country" >
                <option selected value="">Choose a Country 
                <option value="USA" selected>United States of America 
                <option value="CAN">Canada 
                <option value="DEU">Germany 
                <option value="FRA">France 
                <option value="GBR">United Kingdom 
                <option value="IND">India 
                <option value="">--------------------- 
                <option value="AFG">Afghanistan 
                <option value="ALB">Albania 
                <option value="DZA">Algeria 
                <option value="ASM">American Samoa 
                <option value="AND">Andorra 
                <option value="AGO">Angola 
                <option value="AIA">Anguilla 
                <option value="ATA">Antarctica 
                <option value="ATG">Antigua and Barbuda 
                <option value="ARG">Argentina 
                <option value="ARM">Armenia 
                <option value="ABW">Aruba 
                <option value="AUS">Australia 
                <option value="AUT">Austria 
                <option value="AZE">Azerbaijan 
                <option value="BHS">Bahamas 
                <option value="BHR">Bahrain 
                <option value="BGD">Bangladesh 
                <option value="BRB">Barbados 
                <option value="BLR">Belarus 
                <option value="BEL">Belgium 
                <option value="BLZ">Belize 
                <option value="BEN">Benin 
                <option value="BMU">Bermuda 
                <option value="BTN">Bhutan 
                <option value="BOL">Bolivia 
                <option value="BIH">Bosnia and Herzegowina 
                <option value="BWA">Botswana 
                <option value="BVT">Bouvet Island 
                <option value="BRA">Brazil 
                <option value="IOT">British Indian Ocean Territory 
                <option value="BRN">Brunei Darussalam 
                <option value="BGR">Bulgaria 
                <option value="BFA">Burkina Faso 
                <option value="BDI">Burundi 
                <option value="KHM">Cambodia 
                <option value="CMR">Cameroon 
                <option value="CPV">Cape Verde 
                <option value="CYM">Cayman Islands 
                <option value="CAF">Central African Republic 
                <option value="TCD">Chad 
                <option value="CHL">Chile 
                <option value="CHN">China 
                <option value="CXR">Christmas Island 
                <option value="CCK">Cocoa (Keeling) Islands 
                <option value="COL">Colombia 
                <option value="COM">Comoros 
                <option value="COG">Congo 
                <option value="COK">Cook Islands 
                <option value="CRI">Costa Rica 
                <option value="CIV">Cote Divoire 
                <option value="HRV">Croatia (local name: Hrvatska) 
                <option value="CUB">Cuba 
                <option value="CYP">Cyprus 
                <option value="CZE">Czech Republic 
                <option value="DNK">Denmark 
                <option value="DJI">Djibouti 
                <option value="DMA">Dominica 
                <option value="DOM">Dominican Republic 
                <option value="TMP">East Timor 
                <option value="ECU">Ecuador 
                <option value="EGY">Egypt 
                <option value="SLV">El Salvador 
                <option value="GNQ">Equatorial Guinea 
                <option value="ERI">Eritrea 
                <option value="EST">Estonia 
                <option value="ETH">Ethiopia 
                <option value="FLK">Falkland Islands (Malvinas) 
                <option value="FRO">Faroe Islands 
                <option value="FJI">Fiji 
                <option value="FIN">Finland 
                <option value="FXX">France, Metropolitan 
                <option value="GUF">French Guiana 
                <option value="PYF">French Polynesia 
                <option value="ATF">French Southern Territories 
                <option value="GAB">Gabon 
                <option value="GMB">Gambia 
                <option value="GEO">Georgia 
                <option value="GHA">Ghana 
                <option value="GIB">Gibraltar 
                <option value="GRC">Greece 
                <option value="GRL">Greenland 
                <option value="GRD">Grenada 
                <option value="GLP">>Guadeloupe 
                <option value="GUM">Guam 
                <option value="GTM">Guatemala 
                <option value="GIN">Guinea 
                <option value="GNB">Guinea-Bissau 
                <option value="GUY">Guyana 
                <option value="HTI">Haiti 
                <option value="HMD">Heard and Mc Donald Islands 
                <option value="HND">Honduras 
                <option value="HKG">Hong Kong 
                <option value="HUN">Hungary 
                <option value="ISL">Iceland 
                <option value="IDN">Indonesia 
                <option value="IRN">Iran (Islamic Republic of) 
                <option value="IRQ">Iraq 
                <option value="IRL">Ireland 
                <option value="ISR">Israel 
                <option value="ITA">Italy 
                <option value="JAM">Jamaica 
                <option value="JPN">Japan 
                <option value="JOR">Jordan 
                <option value="KAZ">Kazakhstan 
                <option value="KEN">Kenya 
                <option value="KIR">Kiribati 
                <option value="PRK">Korea, Democratic Peoples Republic of 
                <option value="KOR">Korea, Republic of 
                <option value="KWT">Kuwait 
                <option value="KGZ">Kyrgyzstan 
                <option value="LAO">Lao Peoples Democratic Republic 
                <option value="LVA">Latvia 
                <option value="LBN">Lebanon 
                <option value="LSO">Lesotho 
                <option value="LBR">Liberia 
                <option value="LBY">Libyan Arab Jamahiriya 
                <option value="LIE">Liechtenstein 
                <option value="LTU">Lithuania 
                <option value="LUX">Luxembourg 
                <option value="MAC">Macau 
                <option value="MKD">Macedonia, The Former Yugoslav Republic of 
                <option value="MDG">Madagascar 
                <option value="MWI">Malawi 
                <option value="MYS">Malaysia 
                <option value="MDV">Maldives 
                <option value="MLI">Mali 
                <option value="MLT">Malta 
                <option value="MHL">Marshall Islands 
                <option value="MTQ">Martinique 
                <option value="MRT">Mauritania 
                <option value="MVS">Mauritius 
                <option value="MYT">Mayotte 
                <option value="MEX">Mexico 
                <option value="FSM">Micronesia, Federated States of 
                <option value="MDA">Moldova, Republic of 
                <option value="MCO">Monaco 
                <option value="MNG">Mongolia 
                <option value="MSR">Montserrat 
                <option value="MAR">Morocco 
                <option value="MOZ">Mozambique 
                <option value="MMR">Myanmar 
                <option value="NAM">Namibia 
                <option value="NRU">Nauru 
                <option value="NPL">Nepal 
                <option value="NLD">Netherlands 
                <option value="ANT">Netherlands Antilles 
                <option value="NCL">New Caledonia 
                <option value="NZL">New Zealand 
                <option value="NIC">Nicaragua 
                <option value="NER">Niger 
                <option value="NGA">Nigeria 
                <option value="NIU">Niue 
                <option value="NFK">Norfolk Island 
                <option value="MNP">Northern Mariana Islands 
                <option value="MOR">Norway 
                <option value="OMN">Oman 
                <option value="PAK">Pakistan 
                <option value="PLW">Palau 
                <option value="PAN">Panama 
                <option value="PNG">Papua New Guinea 
                <option value="PRY">Paraguay 
                <option value="PER">Peru 
                <option value="PHL">Philippines 
                <option value="PCN">Pitcairn 
                <option value="POL">Poland 
                <option value="PRT">Portugal 
                <option value="PRI">Puerto Rico 
                <option value="QAT">Qatar 
                <option value="REU">Reunion 
                <option value="ROM">Romania 
                <option value="RUS">Russian Federation 
                <option value="RWA">Rwanda 
                <option value="KNA">Saint Kitts and Nevis 
                <option value="LCA">Saint Lucia 
                <option value="VCT">Saint Vincent and the Grenadines 
                <option value="WSM">Samoa 
                <option value="SMR">San Marino 
                <option value="STP">Sao Tome and Principe 
                <option value="SAU">Saudi Arabia 
                <option value="SEN">Senegal 
                <option value="SYC">Seychelles 
                <option value="SLE">Sierra Leone 
                <option value="SGP">Singapore 
                <option value="SVK">Slovakia (Slovak Republic) 
                <option value="SVN">Slovenia 
                <option value="SLB">Solomon Islands 
                <option value="SOM">Somalia 
                <option value="ZAF">South Africa 
                <option value="SGS">South Georgia and the South Sandwich Islands 
                <option value="ESP">Spain 
                <option value="LKA">Sri Lanka 
                <option value="SHN">St. Helena 
                <option value="SPM">St. Pierre and Miquelon 
                <option value="SDN">Sudan 
                <option value="SUR">Suriname 
                <option value="SJM">Svalbard and Jan Mayen Islands 
                <option value="SWZ">Swaziland 
                <option value="SWE">Sweden 
                <option value="CHE">Switzerland 
                <option value="SYR">Syrian Arab Republic 
                <option value="TWN">Taiwan 
                <option value="TJK">Tajikistan 
                <option value="TZA">Tanzania, United Republic of 
                <option value="THA">Thailand 
                <option value="TGO">Togo 
                <option value="TKL">Tokelau 
                <option value="TON">Tonga 
                <option value="TTO">Trinidad and Tobago 
                <option value="TUN">Tunisia 
                <option value="TUR">Turkey 
                <option value="TKM">Turkmenistan 
                <option value="TCA">Turks and Caicos Islands 
                <option value="TUV">Tuvalu 
                <option value="UGA">Uganda 
                <option value="UKR">Ukraine 
                <option value="ARE">United Arab Emirates 
                <option value="UMI">United States Minor Outlying Islands 
                <option value="URY">Uruguay 
                <option value="UZB">Uzbekistan 
                <option value="VUT">Vanuatu 
                <option value="VAT">Vatican City State (Holy See) 
                <option value="VEN">Venezuela 
                <option value="VNM">Viet Nam 
                <option value="VGB">Virgin Islands (British) 
                <option value="VIR">Virgin Islands (U.S.) 
                <option value="WLF">Wallisw and Futuna Islands 
                <option value="ESH">Western Sahara 
                <option value="YEM">Yeman 
                <option value="YUG">Yugoslavia 
                <option value="ZAR">Zaire 
                <option value="ZMB">Zambia 
                <option value="ZWE">Zimbabwe 
                <option value="UNK">Not Listed___________________________ </select></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Phone:</strong></td>
            <td><input name="s_phone" type="text" class="input_field" value="<?php echo $_COOKIE['s_phone'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Fax:</strong></td>
            <td><input name="s_fax" type="text" class="input_field" value="<?php echo $_COOKIE['s_fax'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>E-mail:</strong></td>
            <td><input name="s_email" type="text" class="input_field" value="<?php echo $_COOKIE['s_email'];?>"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><strong>Business Tax ID# or SS#:</strong></td>
            <td><input name="s_busigness_tax" type="text" class="input_field" value="<?php echo $_COOKIE['s_busigness_tax'];?>"></td>
          </tr>
          <tr> 
            <td background="images/HdrBKG.gif" bgcolor="#000000"><img src="images/spacer.gif" width="1" height="19"></td>
            <td colspan="2" background="images/HdrBKG.gif" bgcolor="#000000"><strong>Payout 
              Options <span class="style1">(Please choose your payout option)</span></strong></td>
          </tr>
          <tr> 
            <td align="right"><input name="PmtType" type="radio" value="PayPal" onClick="PayP()"></td>
            <td><strong>Paypal</strong> <span class="style1">(international only) 
              </span></td>
            <td><div id="PayPalEmail" style="display:none"><input name="paypalemail" type="text" class="input_field" value="<?php echo $_COOKIE['paypalemail'];?>" size="40"> 
              <span class="style1">(enter your PayPal e-mail address)</span></div></td>
          </tr>
          <tr> 
            <td align="right"><input name="PmtType" type="radio" value="Check" onClick="Chk()"></td>
            <td><strong>Check</strong></td>
            <td><div id="CheckPayableTo" style="display:none"><input name="s_cheques_payable" type="text" class="input_field" value="<?php echo $_COOKIE['s_cheques_payable'];?>" size="40">
            <span class="style1">(Enter Check Payable To)</span></div></td>
          </tr>
          <tr> 
            <td align="right"><input name="PmtType" type="radio" value="WireTransfer" onClick="WT()"></td>
            <td><strong>Wire Transfer </strong><span class="style1">(international 
              only) </span></td>
            <td><span class="style1">A $40.00 fee will apply per international 
              wire transfer.</span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2" align="center">
			<div id="WireTransfer" style="display:none"><table width="503" border="0" cellpadding="2" cellspacing="0">
              <tr>
                <td width="133" align="left"><strong>Bank Name:</strong></td>
                <td width="362"><input name="bankName" type="text" class="input_field" value="<?php echo $_COOKIE['bankName'];?>" size="40"></td>
              </tr>
              <tr>
                <td align="left"><strong>Bank Account #:</strong></td>
                <td><input name="bankAccountNo" type="text" class="input_field" value="<?php echo $_COOKIE['bankAccountNo'];?>" size="40"></td>
              </tr>
              <tr>
                <td align="left"><strong>Bank Routing #:</strong></td>
                <td><input name="bankRoughting" type="text" class="input_field" value="<?php echo $_COOKIE['bankRoughting'];?>" size="40"></td>
              </tr>
              <tr>
                <td align="left"><strong>SWIFT Code:</strong></td>
                <td><input name="SWIFT" type="text" class="input_field" value="<?php echo $_COOKIE['SWIFT'];?>" size="40"></td>
              </tr>
              
            </table></div></td>
          </tr>
          
          <tr> 
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle"><input name="submit" type="submit" class="input_btn" value="Submit">
              &nbsp;
              <input name="reset" type="reset" class="input_btn" value="Reset"></td>
          </tr>
          <tr> 
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </form>   
<!--end your code here-->
    </td>
  </tr>
  <tr> 
    <td align="left" valign="top">
      <?php include("footer.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php } 
else {
echo "Not Permited";
}
?>