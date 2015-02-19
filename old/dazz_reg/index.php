<!DOCTYPE html>

<html>

<head>

<title>Dazzling Login</title>
<link type ="text/css" rel="stylesheet" href="style.css">

</head>

<body>

<center><img src="dazzLogo.jpg"></center>
<center><h1>Parent Login</h1></center>

<form method="post" action="">
	<center><p>Username<br/><input type="text" name="username" size="20" /></p>
	<p>Password<br/><input type="password" name="password" size="20" /></p>
	<p><input type="submit" value="Login" name="login" /></p>
	<a href="parentRegister.php">Register</a>
	</center>
</form>

<?php
if(isset($_POST["Login"])){
	if(!empty($_POST['user']) && !empty($_POST['pass'])) {
		$user=$_POST['user'];
		$pass=$_POST['pass'];

		$con=mysql_connect('localhost','root','') or die(mysql_error());
		mysql_select_db('test') or die("cannot select DB");

		$query=mysql_query("SELECT * FROM parents WHERE username='".$user."' AND password='".$pass."'");
		$numrows=mysql_num_rows($query);
			if($numrows!=0)
			{
				while($row=mysql_fetch_assoc($query))
				{
					$dbusername=$row['username'];
					$dbpassword=$row['password'];
				}

				if($user == $dbusername && $pass == $dbpassword)
				{
					session_start();
					$_SESSION['sess_user']=$user;
					/* Redirect browser */
					header("Location: parentHome.php");
				}
			} else {
				echo "Invalid username or password!";
			}

} 	else {
		echo "All fields are required!";
	}
}
?>

</body>

</html>