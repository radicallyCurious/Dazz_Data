<!--
/*
author:Luc Pitre<pitreluc@gmail.com>
created: 8 December 2014
purpose:login/home screen for dazzling discoveries registration database
*/
-->
<!DOCTYPE html>

<html>

<head>

<title>Dazzling Login</title>
<link type ="text/css" rel="stylesheet" href="home_style.css">

</head>

<body>

<fieldset id="login field">
<center><img src="dazzLogo.jpg"></center>
<center><h1>Parent Login</h1></center>

<form method="post" action="">
	<center><p>Username<br/><input type="text" name="user" size="20" /></p>
	<p>Password<br/><input type="password" name="pass" size="20" /></p>
	<p><input type="submit" value="Login" name="login" /></p>
	<a href="parent_register.php">Register A New Account</a><br/>
	<em>^for new parents^</em>
	</center>
</form>
</fieldset>

<?php

include("connect.php");

if(isset($_POST['login'])){
	if(!empty($_POST['user']) && !empty($_POST['pass'])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$query=mysql_query("SELECT * FROM awesome_table WHERE username='$user' AND password='$pass'");
		$numrows=mysql_num_rows($query);
		
		if($numrows!=0){
			while($row=mysql_fetch_assoc($query)){
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
			}//end while
			
			if($user == $dbusername && $pass == $dbpassword){
				session_start();
				$_SESSION['sess_user']=$user;
				//send to parentHome page
				header("location:parent_home.php");
			//end username and password check
			}else{
				header("location:failure.php");
			}//end else from username and password check
			
		//end numrow check if
		}
		//end empty set check if
	}else{
		header("location:regFieldProb.php");
		}//end else from numrow check
		
}//end login if

?>

</body>

</html>