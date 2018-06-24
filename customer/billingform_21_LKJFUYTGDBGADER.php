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
.style2 {
	color: #FF0000;
	font-weight: bold;
}
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
.style7 {color: #333333}
.style9 {color: #333333; font-weight: bold; }
.style3 {color: #FF0000}
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
    <span class="style9">To fund your account by Credit Card: </span>
    <div id="BalanceBox" style="width:120px" align="center"> <a href="http://66.71.251.130/~comicboo/cart/21_JHUYEHDGHYERPLKBCGDTS_CFZ_mer21.html" onClick="NewWindow(this.href,'mywin','750','600','no','center');return false" onFocus="this.blur()">Click Here</a></div>
    <p><span class="style9">You will receive a confirmation e-mail 
          notifying you when your funds have been credited to your account.                   </span><br>
          <br>
      <span class="style9">Funds could take up to 4 hours to be added</span><br>
      <br>
      <span class="style9">Purchase will be billed as </span><span class="style2">&quot;<span class="style3"><b>Maso Productions "</b>.</span></span></p>
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
