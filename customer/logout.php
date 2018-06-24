<?php session_start();

?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php 
session_unset();
session_destroy();

echo "<meta http-equiv='refresh' content='0 url=../index.php'>";
?>
</body>
</html>
