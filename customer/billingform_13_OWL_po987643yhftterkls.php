<?php session_start();
include("../includes/connect.php");
if(empty($_SESSION['account_number']))
{
  header("location:index.php");
  //echo "<meta http-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}
else{

}

?>
<html>
<head>
<title><? echo $site_name ?> - Fund by Credit Card</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../style_main/style.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.bodyfont {	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: normal;
}
.titlefont {	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style9 {color: #333333; font-weight: bold; }
.style10 {color: #000000}
-->
</style>

<script language="javascript" type="text/javascript">
<!--

var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=yes,menubar=no,toolbar=yes,resizable=yes, scrollbars=yes';
win=window.open(mypage,myname,settings);}
// -->
</script>

</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="1004">
<tr><td align="center">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="left" valign="top"><?php include("../header.php"); ?></td>
  </tr>
<tr>
          <td align="right" valign="top" background="../images/GRAYBKG.gif"> <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" class="whitetxtcolor">&nbsp;</td>
              </tr>
              <tr> 
                <td align="left" class="whitetxtcolor"><strong>Fund By Credit 
                  Card</strong></td>
              </tr>
              <tr> 
                <td><img src="/images/spacer.gif" width="10" height="10"></td>
              </tr>
              <tr> 
                <td><div class="border2" style="padding:5px">
    <div align="center"><span class="style9">Account Funding options <br>
      </span>    </div>
    <div align="left">
      <table width="422" border="0" align="center" bordercolor="#000000" bgcolor="#FDE884">
          <tr>
            <td width="257" class="style10"><div align="center"><strong>Package 1 - $10.00 Credit</span></span></strong></div></td>
            <td width="289" class="style10"><div align="center"><strong>Price: $10.00</strong></div></td>
          </tr>
          <tr>
            <td class="style10"><div align="center"><strong>Package 2 - $20.00 Credit </span></span></strong></div></td>
            <td class="style10"><div align="center"><strong>Price: $20.00</strong></div></td>
          </tr>
          <tr>
            <td class="style10"><div align="center"><strong>Package 3 - $30.00 Credit</span></span></strong></div></td>
            <td class="style10"><div align="center"><strong>Price: $30.00</span></span></strong></div></td>
          </tr>
          <tr>
            <td class="style10"><div align="center"><strong>Package 4 - $40.00 Credit</span></span></strong></div></td>
            <td class="style10"><div align="center"><strong>Price: $40.00</strong></div></td>
          </tr>
          <tr>
            <td class="style10"><div align="center"><strong>Package 5 - $50.00 Credit</span></span></strong></div></td>
            <td class="style10"><div align="center"><strong>Price: $50.00</strong></div></td>
          </tr>
          </table>
      <br>
      <div align="center"><span class="style9"><br>
You will receive a confirmation e-mail 
      notifying you when your funds have been credited to your account.                   Funds could take up to 4 hour to be added to your account <br>
      <br>
      Billing will Appear as &ldquo;H Visions&rdquo;<br>
      <br>
          To fund your account </span>
          <br>  
        <div id="BalanceBox" style="width:120px" align="center"> 
      <div align="center"><a href="http://66.71.251.130/~stomppro/cart/owl_13_DJMKOISGSH8730KJzs_CFZ.html" rel="noreferrer" onClick="NewWindow(this.href,'mywin','950','800','no','center');return false" onFocus="this.blur()">Click Here</a>	  </div>
    </div><br>
    </div></div>
    <div align="center"><span class="style9"><br>
    </span><br>
      <br>
    </div>
                </div></td>
              </tr>
            </table>
            <br>
            <br> 
            <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td>&lt;&lt; <a href="javascript:history.back();" class="WhiteLinks">Return 
                  to My Account </a></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <div align="center" class="bodyfont"><br>
              <br>
              <a href="javascript:history.back();" class="bodyfont style1"></a></div>
            <div align="center"></div>
<br></td></tr>
<tr>
    <td align="left" valign="top"><?php include("../footer.php"); ?></td>
  </tr>
</table>
</td></tr>
</table>

</body>
</html>
