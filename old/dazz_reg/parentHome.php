<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:index.php");
} else {
?>

<!DOCTYPE html>

<html>

<head>

<title>Dazzling Discoveries Parent Account Home</title>

</head>

<body>

<center><h1>Dazzling Parent Account Home</h1></center>

<section>
<h2>Your Children</h2>
<ul>
	<li><a href="child1.php">Child 1</a>
	<li><a href="child2.php">Child 2</a>
	<li><a href="childRegister.php">Register Another Child</a>
</ul>

</section>

<!--home message-->
<br/><br/><br/>
<center>
<?=$_SESSION['sess_user'];?>! <a href="logout.php">Logout</a>
<em>...or...</em>
<br/><br/>
<a href="index.php">Home</a><br/>
<em> Go back to the Log In screen</em>
</center>

</body>

</html>
<?php
}
?>