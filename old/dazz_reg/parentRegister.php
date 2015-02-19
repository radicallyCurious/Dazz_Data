<!DOCTYPE html>

<html>

<head>

<title>Dazzling Registration</title>
<link type ="text/css" rel="stylesheet" href="style.css">

</head>

<body>

<center><h1>New Parent Account Registration</h1></center><br/>

<form id="form1"name="registration">
<center>

<fieldset>
<label>New Username:</label><br/>
<input type="text" name="parent_username"><br/>
<label>New Password:</label><br/>
<input type="password" name="parent_password"><br/>
</fieldset>

<h3>PARENT INFORMATION</h3>

<label>Parent's First Name:</label>
<input type="text" name="parent_firstName"><br/><br/>
<label>Parent's Last Name:</label>
<input type="text" name="parent_lastName"><br/><br/>
<label>Parent's Email:</label>
<input type="text" name="parent_email"><br/><br/>
<label>Parent's Phone Number:</label>
<input type="text" name="parent_phone"><br/><br/>

<hr/>
<input type="submit" value="Register">

</center>	
</form>

<?php
if(isset($_POST["Register"])){

if(!empty($_POST['parent_username']) && !empty($_POST['parent_password'])) {
	$user=$_POST['parent_username'];
	$pass=$_POST['parent_password'];
	$firstName=$_POST['parent_firstName'];
	$lastName=$_POST['parent_lastName'];
	$email=$_POST['parent_email'];
	$phone=$_POST['parent_phone'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('test') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM parents WHERE username='".$user."'");
	$numrows=mysql_num_rows($query);
	/*if($numrows==0)
	{*/
	$sql="INSERT INTO parents(parent_firstName, parent_lastname, parent_email, parent_phone, parent_username, parent_password) VALUES('$firstName','$lastName','$email','$phone','$user','$pass')";

	$result=mysql_query($sql);


	if($result){
	echo "Account Successfully Created";
	} else {
	echo "Failure!";
	}

	/*} else {
	echo "That username already exists! Please try again with another.";
	}*/

} else {
	echo "All fields are required!";
}
}
?>

	
<!--home message-->
<br/><br/><br/>
<center>
<a href="index.php">Home</a><br/>
<em>Cancel registration and Go back to the Log In screen</em>
</center>

</body>

</html>