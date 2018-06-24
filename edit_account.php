<?php session_start();
$msg="";
if(isset($_POST['submit']))
{	
	$query="update store_owner_information set
			account_type='$_POST[account_type]',
			s_first_name='$_POST[s_first_name]',
			s_last_name='$_POST[s_last_name]',
			s_add='$_POST[s_add]',
			s_city='$_POST[s_city]',
			s_state='$_POST[s_state]',
			s_zip='$_POST[s_zip]',
			s_country='$_POST[s_country]',
			s_phone='$_POST[s_phone]',
			s_fax='$_POST[s_fax]',
			s_email='$_POST[s_email]',
			cheques_payable='$_POST[s_cheques_payable]',
			category1='$_POST[category1]',
			category2='$_POST[category2]',
			category3='$_POST[category3]',
			category4='$_POST[category4]'
			where store_id='$_SESSION[store_id]'";
	$result=mysql_query($query) or die(mysql_error());
	$msg="Your changes has been saved";
}

$query="select * from  store_owner_information where store_id='$_SESSION[store_id]'";
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);

$sql="select * from category order by categoryname";
$res1=mysql_query($sql);
$res2=mysql_query($sql);
$res3=mysql_query($sql);
$res4=mysql_query($sql);
?>
<script language="JavaScript">
function checkvalidation()
{
	if(document.s_registration.account_type.value=="")
	{
		alert("Please select a account type");
		document.s_registration.account_type.focus();
		return false;
	}
	if(document.s_registration.s_country.value=="")
	{
		alert("Please enter your country name");
		document.s_registration.s_country.focus();
		return false;
	}
	return true;
}
</script>
<form name="s_registration" method="post" action="" style="margin:0px;" onSubmit="return checkvalidation();">
<table width="90%" border="0" align="center" cellpadding="6" cellspacing="0" class="border1">
              <tr>
                <td colspan="3" align="center"><font size="3" color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><? echo $msg; ?></font></td>
                
              </tr>
			  
              <tr>
                <td>&nbsp;</td>
				
      <td>Account Type</td>
				
      <td><select name="account_type">
	  		<option value="">Select account type</option>
			<option value="Busigness">Busigness</option>
			<option value="Individual">Individual</option>
	  </select></td>
			</tr>
		<tr>
	  <td>&nbsp;</td>
		
      <td>Fisrt Nmae</td>
		<td><input name="s_first_name" type="text" class="input_field" value="<? echo $row['s_first_name'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		
      <td>Last Name</td>
		<td><input name="s_last_name" type="text" class="input_field" value="<? echo $row['s_last_name'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		
      <td>Address</td>
		<td><input name="s_add" type="text" class="input_field" value="<? echo $row['s_add'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td>City</td>
		<td><input name="s_city" type="text" class="input_field" value="<? echo $row['s_city'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td>State/Province</td>
		<td><input name="s_state" type="text" class="input_field" value="<? echo $row['s_state'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td>Zip</td>
		<td><input name="s_zip" type="text" class="input_field" value="<? echo $row['s_zip'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td>Country</td>
		<td><select type="text" class="input_field"  name="s_country" >
                    <option value="">Choose a Country 
                    <option value="USA">United States of America 
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
                    <option value="PRK">Korea, Democratic Peoples Republic
                        of 
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
	  <td>&nbsp;</td>
		<td>Phone</td>
		<td><input name="s_phone" type="text" class="input_field" value="<? echo $row['s_phone'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td>Fax</td>
		<td><input name="s_fax" type="text" class="input_field" value="<? echo $row['s_fax'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td>E-mail</td>
		<td><input name="s_email" type="text" class="input_field" value="<? echo $row['s_email'];?>"></td>
	</tr>
	
	<tr>
	  <td>&nbsp;</td>
		<td>Cheques Payable To</td>
		<td><input name="s_cheques_payable" type="text" class="input_field" value="<? echo $row['cheques_payable'];?>"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td colspan="2" align="center">Pick up to 4 categories you want your store displayed in</td>
		
	</tr>
	<tr>
	  <td>&nbsp;</td>
		<td colspan="2" align="center">
			<select name="category1">
				<option value="">Category 1</option>
				<?php 
					while($row1=mysql_fetch_array($res1))
					{ ?>
						<option value="<?php echo $row1['id']; ?>"><?php echo $row1['categoryname']; ?></option>	
			  <?php }
				?>
			</select>
			<select name="category2">
				<option value="">Category 2</option>
				<?php 
					while($row2=mysql_fetch_array($res2))
					{ ?>
						<option value="<?php echo $row2['id']; ?>"><?php echo $row2['categoryname']; ?></option>	
			  <?php }
				?>
			</select>
			<select name="category3">
				<option value="">Category 3</option>
				<?php 
					while($row3=mysql_fetch_array($res3))
					{ ?>
						<option value="<?php echo $row3['id']; ?>"><?php echo $row3['categoryname']; ?></option>	
			  <?php }
				?>
			</select>
			<select name="category4">
				<option value="">Category 4</option>
				<?php 
					while($row4=mysql_fetch_array($res4))
					{ ?>
						<option value="<?php echo $row4['id']; ?>"><?php echo $row4['categoryname']; ?></option>	
			  <?php }
				?>
			</select>	
		</td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
	    <td align="center">&nbsp;</td>
	    <td align="left" valign="middle"><input name="submit" type="submit" class="input_btn" value="Save">&nbsp;<input name="reset" type="reset" class="input_btn" value="Reset"></td>
	</tr>
	<tr>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="left" valign="middle">&nbsp;</td>
	  </tr>
</table>
</form>