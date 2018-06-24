<?php session_start();
include("includes/connect.php");
$storeid=$_REQUEST['storeid']; 
$query="select company_rec,name_rec,address_rec,city_rec,state_rec,zip_rec,country_rec from store_owner_information where store_id='$storeid'";
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);
?>
<div><font size="4">CUSTODIAN OF RECORDS</font><br></div>
<div align="center"><font size="2"><b>U.S.C. TITLE 18, SECTION 2257<br>COMPLIANCE</b></font></div>
<br>
<div align="center">
<?php 
echo $row['company_rec']."<br>".$row['name_rec']."<br>".$row['address_rec']."<br>".$row['city_rec'].", ".$row['state_rec']." ".$row['zip_rec']."<br>".$row['country_rec'];
?>
</div>
