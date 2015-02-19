<?php
/*
author:Luc Pitre<pitreluc@gmail.com>
created: 8 December 2014
purpose: success page for enrollment in dazzling discoveries database
*/

session_start();
include("connect.php");
if(!isset($_SESSION["sess_user"])){
	header("location:home.php");
} else {
?>

<!DOCTYPE html>
<html>

<head>

<title>Enrollment Success</title>

</head>

<body>

<h1>!!!ENROLLMENT SUCCESSFUL!!!</h1>

</body>

</html>
<?php
}
?>