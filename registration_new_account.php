<?php
session_start(); 
include("includes/connect.php");
$mes="";
if(isset($_POST['B2']))
{
	$sql="select * from store_owner_information where store_id='$_POST[account]' and s_user_name ='$_POST[username]' and s_password='$_POST[password]' and user_type='store_owner'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	$row=mysql_fetch_array($result);
	$approved=$row['approved'];	
		if($count > '0' && $approved=='1') 
		{ 
		$_SESSION["store_id"]=$row["store_id"];
		$_SESSION["user_type"]=$row["user_type"];
		$_SESSION["name"]=$row["s_user_name"];
		$_SESSION["email"]=$row["s_email"];
		$_SESSION["phone"]=$row["s_phone"];
		$_SESSION["pay_to"]=$row["cheques_payable"];
		$_SESSION["store_name"]=$row["store_name"];

		header("location:account_summary.php");
		exit();
		} 
		if($count > '0' && $approved=='0')
		{
	   	$mes = "Your account is out of service. Please contact your administrator.";
	 	}
		if($count=='0')
		{
	   	$mes = "Wrong user id or user name or password";
	 	}	
}
if(isset($_POST['reg_submit']))
{	
	if($_POST['paymentgatway']=="")
	{
		$paymentgatway='0';
	}
	else
	{
		$paymentgatway=$_POST['paymentgatway'];
	}
	$accountnumber=rand();
	$firstname=$_POST['FirstName'];
 	$lastname=$_POST['LastName'];
	$streetaddress=$_POST['Address'];
	$city=$_POST['City'];
	$state=$_POST['State'];
	$zipcode=$_POST['Zip'];
	$country=$_POST['Country'];
	$email=$_POST['Email'];
	$password=$_POST['password'];
    $ip=$_POST['ip'];
	$ip=$_SERVER['REMOTE_ADDR']; 
	$time=time();
	$date=$_POST['Notes'];
	$date=date("Y-m-d");
	
	
	$query="insert into clients set
			account_number='$accountnumber',
			first_name='$firstname',
			last_name='$lastname',
			street_address='$streetaddress',
			city='$city',
			state='$state',
			zip_code='$zipcode',
			country='$country',
			email='$email',
			password='$password',
            ip='$ip',
			Notes='$date',
			approved='$paymentgatway'";
			
	$result=mysql_query($query) or die(mysql_error());
		
	$to=$email;
	$from ="admin@sc-media-group.com";
	$subject="sc-media-group Account Activation";
	$message="Thank You for opening an account at sc-media-group. 

Please reply to this email to activate your account. 
We will send you your Account number and Password.

-------------------------------------------------------- 
Name: $firstname $lastname 
Email: $email
-------------------------------------------------------- 

Thank You
sc-media-group.com";

                    $headers = 'From: admin@sc-media-group.com' . "\r\n".
                   'Reply-To: admin@sc-media-group.com'. "\r\n".
                   'Return-Path:admin@sc-media-group.com' . "\r\n".
                    'X-Mailer: PHP/' . phpversion();

                   mail($to, $subject, $message, $headers, "-f $from");

	header("location:account_comfirmation_activation.php");
	exit();
	
}
?>
<?php require_once("microProtector2.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><? echo $site_name ?> - Open an Account</title>
<link rel="stylesheet" href="style_main/style.css" type="text/css" />
<script language="JavaScript">
function checkvalidation()
{
	if(document.prepaid_login_form.FirstName.value=="")
	{
		alert("Please enter your first name");
		document.prepaid_login_form.FirstName.focus();
		return false;
	}
	if(document.prepaid_login_form.LastName.value=="")
	{
		alert("Please enter your last name");
		document.prepaid_login_form.LastName.focus();
		return false;
	}
	if(document.prepaid_login_form.Address.value=="")
	{
		alert("Please enter your address ");
		document.prepaid_login_form.Address.focus();
		return false;
	}
	if(document.prepaid_login_form.City.value=="")
	{
		alert("Please enter your city name");
		document.prepaid_login_form.City.focus();
		return false;
	}
	if(document.prepaid_login_form.State.value=="")
	{
		alert("Please enter your state name");
		document.prepaid_login_form.State.focus();
		return false;
	}
	if(document.prepaid_login_form.Zip.value=="")
	{
		alert("Please enter your zip code");
		document.prepaid_login_form.Zip.focus();
		return false;
	}
	if(document.prepaid_login_form.Country.value=="")
	{
		alert("Please choose your country name");
		document.prepaid_login_form.Country.focus();
		return false;
	}
	
	if(document.prepaid_login_form.password.value=="")
	{
		alert("Please enter your password");
		document.prepaid_login_form.password.focus();
		return false;
	}
	if(document.prepaid_login_form.cpassword.value=="")
	{
		alert("Please re-enter your password");
		document.prepaid_login_form.cpassword.focus();
		return false;
	}
	if(document.prepaid_login_form.password.value!=document.prepaid_login_form.cpassword.value)
	{
		alert("Password field and confirm password field do not match");
		return false;
	}
	if(document.prepaid_login_form.Email.value=="")
	{
		alert("Please enter your e-mail address");
		document.prepaid_login_form.Email.focus();
		return false;
	}
	if(document.prepaid_login_form.Email.value!="")
	{
	var x = document.prepaid_login_form.Email.value;
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(x))
	{return true;}
	else alert('NO! Incorrect email address');
	return false;
	}
	return true;
}
</script></head>
<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr> 
    <td align="center" valign="top" background="images/GRAYBKG.gif"> 
      <!--wright your code here-->
      <table width="70%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="whitetxtcolor">&nbsp;</td>
        </tr>
        <tr> 
          <td class="whitetxtcolor"><strong>Open an Account</strong></td>
        </tr>
        <tr> 
          <td><img src="images/spacer.gif" width="10" height="10"></td>
        </tr>
        <tr> 
          <td><p>Welcome to sc-media-group  Open an account
            today <br>
            <br>
              </p>
          </td>
        </tr>
      </table>
      <br> <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" class="border1">
        <tr> 
          <th height="307" align="left" valign="top" scope="col"><form name='prepaid_login_form' method="POST" action="" onSubmit="return checkvalidation();">
              <table border="0" align="center" cellpadding="6" cellspacing="0" bordercolor="#666666" id="table1">
                <tr>
                  <td colspan="2" align="right" valign="middle"><div align="center">
                      <DIV>Any accounts opened with false information will   automatically be deleted from our system.</DIV>
                  </div></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>First Name:</strong>                  </td>
                  <td align="left" valign="middle"><input name="FirstName" type="text" class="input_field" size="20"></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>Last Name:</strong>                  </td>
                  <td align="left" valign="middle" ><input type="text" class="input_field"  name="LastName" size="20"></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>Street Address:</strong></td>
                  <td align="left" valign="middle" style="color: #FFFFFF"><input type="text"  class="input_field"  name="Address" size="69"></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>City:</strong></td>
                  <td align="left" valign="middle" style="color: #FFFFFF"><input type="text" class="input_field"  name="City" size="20"></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>State:</strong></td>
                  <td align="left" valign="middle" style="color: #FFFFFF"><select type="text" class="input_field"  name="State" >
<option selected value="">Select a State 
<option value="XX">--NONE--</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
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
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
</select></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>Zip Code:</strong></td>
                  <td align="left" valign="middle" style="color: #FFFFFF"><input type="text" class="input_field"  name="Zip" size="20"></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>Country:</strong></td>
                  <td align="left" valign="middle" style="color: #FFFFFF"><select type="text" class="input_field"  name="Country" >
                      <option selected value="">Select  a Country 
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
                      <option value="MKD">Macedonia, The Former Yugoslav Republic 
                      of 
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
                      <option value="SGS">South Georgia and the South Sandwich 
                      Islands 
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
                      <option value="UNK">Not Listed___________________________ 
                    </select></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>Password:</strong></td>
                  <td align="left" valign="middle" style="color: #FFFFFF"><input type="password" class="input_field"  name="password" size="20"></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle" style="color: #FFFFFF"><strong>Re 
                    Enter Password:</strong></td>
                  <td align="left" valign="middle" ><input type="password" class="input_field" name="cpassword" size="20"></td>
                </tr>
                <tr> 
                  <td align="right" valign="middle"><strong>E-mail:</strong></td>
                  <td align="left" valign="middle" style="color: #FFFFFF"><input type="text" class="input_field"   name="Email" size="20"></td>
                </tr>
                <!--<tr>
			    <td align="center" valign="middle" colspan="2">
				Chouse a payment getway through which you want to may payment.<br>
				Note: If you do not select any payment getway it will use the default payment getway.</td>
			    
		    </tr>-->
                <!--<tr>
			    <td align="right" valign="middle">Payment getway</td>
			    <td align="left" valign="middle" style="color: #FFFFFF">
				<input type="radio" name="paymentgatway" value="1"> USAEPAY <input type="radio" name="paymentgatway" value="2"> PLUGNPAY <input type="radio" name="paymentgatway" value="3"> LINKPOINT
				</td>
		    </tr>-->
                <tr> 
                  <td style="color: #FFFFFF">&nbsp;</td>
                  <td style="color: #FFFFFF"><input name="reg_submit" type="submit" class="input_btn" value="Submit"> 
                    <input name="B4" type="reset" class="input_btn" value="Reset"></td>
                </tr>
              </table>
            </form></th>
        </tr>
      </table>
      <p>&nbsp;</p>
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