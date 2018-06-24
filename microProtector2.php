<?php

/**
 * ****************************************************************************
 * Micro Protector
 * 
 * Version: 1.0
 * Release date: 2007-09-10
 * 
 * USAGE:
 *   Define your requested password below and inset the following code
 *   at the beginning of your page:
 *   <?php require_once("microProtector.php"); ?>
 * 
 *   See the attached example.php.
 * 
 ******************************************************************************/


$Password = 'access'; // Set your password here



/******************************************************************************/
   if (isset($_POST['submit_pwd'])){
      $pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
      
      if ($pass != $Password) {
         showForm("Wrong password");
         exit();     
      }
   } else {
      showForm();
      exit();
   }
   
function showForm($error="LOGIN TO OPEN A NEW ACCOUNT"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>sc-media-group - Open an Account</title>
   <link href="style_main/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="65" align="left" valign="top" background="/images/CFZLogo_PS3.png"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
      </tr></table>
  </tr>
  <tr> 
    <td align="center" valign="center" height="400" background="images/GRAYBKG.gif"> 

    <div id="main">
      <div class="caption"><span style="color:#C00; font-weight:bold"><?php echo $error; ?></span></div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="pwd">
        Please enter the password "access" to prove you are human:<br />
        <h1 style="color:#FC0">access</h1>
        <table>
          <tr><td><input class="text" name="passwd" type="password"/></td></tr>
          <tr><td align="center"><br/>
             <input class="input_btn" type="submit" name="submit_pwd" value="Login"/>
          </td></tr>
        </table>  
      </form>
      <div id="source"></div>
   </div>
   </td></tr>
   <tr><td align="center">  <?php include("footer.php"); ?></td>
   </tr>
   </table>
</body>       

<?php   
}
?>