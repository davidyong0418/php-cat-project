<?php
include("object.php");
 $per=$obj4sitepermission->sitepermission();
 if($per=='1')
 {
include("includes/connect.php");

?>
<html>
<head>
<title><? echo $site_name ?> - Title 2257</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="style_main/style.css" type="text/css" /></head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr><td valign="top" background="images/GRAYBKG.gif">
    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="20" align="left" class="whitetxtcolor">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" class="whitetxtcolor"><strong>CUSTODIAN OF RECORDS UNITED STATES CODE, TITLE 18, SECTION 2257 COMPLIANCE</strong></td>
    </tr>
    <tr>
      <td><img src="/images/spacer.gif" width="10" height="10"></td>
    </tr>
  </table>
  <br>
  <table width="70%" border="0" align="center" cellpadding="6" cellspacing="0" class="border1">
    <tr>
      <td align="left"></td>
    </tr>
    <tr>
      <td align="left" valign="top"><p>In compliance with 18 U.S.C. 2257, all models,   actors, actresses, and other persons who appear in any visual depiction   appearing or otherwise contained in this website, whether of sexually explicit   conduct or otherwise, were eighteen (18) years of age or older at the time of   the creation of such depictions.<BR>
            <BR>
        Some visual depictions contained in this   website are exempt from the requirements of 18 U.S.C. 2257 and 28 C.F.R. 75   because such depictions were produced prior to July 3, 1995 or do not consist of   depictions of conduct as specifically listed in 18 U.S.C 2256 (2)   (A)-(E).<BR>
        <BR>
        The owners and operators of this website are not the "primary   producer," as such term is defined in 18 U.S.C. 2257 or subsequent case law, of   any of the visual content contained in this website.<BR>
        <BR>
        The date of   reproduction or republication of any non-exempt visual depictions of sexually   explicit conduct or otherwise is current as of the date of the visitor's entry   into this website. Today's date is 2005-01-29. Actual production dates are   contained in the records held by the Custodian of Records maintained pursuant to <BR>
        18 U.S.C. 2257 and 28 C.F.R. 75.<BR>
        <BR>
        The original records and   documentation required to be maintained pursuant to 18 U.S.C. 2257 and 28 C.F.R.   75 for all non-exempt visual depictions of sexually explicit conduct contained   in this website are kept at the following locations by the respective Custodian   of Records:<BR>
        <BR>
                    Store Producer records are available upon request,<BR>
        All models are 18 years or older. </p></td>
    </tr>
  </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
</table>
</td></tr>
</table>
    <td align="left" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</body>
</html>
<?php } 
else {
echo "Not Permited";
}
?>