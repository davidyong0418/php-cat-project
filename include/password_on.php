<?php
if(empty($_SESSION['account_number']))
{
  header("location:index_login.php");
  echo "<meta https-equiv='refresh' content='0 url=prepaid_login_form.php'>";
}

else{

}
?>  