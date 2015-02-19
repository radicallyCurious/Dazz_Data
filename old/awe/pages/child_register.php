<?php
/*
author:Luc Pitre<pitreluc@gmail.com>
created: 8 December 2014
purpose: child registration form for dazzling discoveries database
*/
 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:home.php");
} else {
?>



<!DOCTYPE html>
<html>

<head>

<title>Dazzling Child Registration</title>
<link type ="text/css" rel="stylesheet" href="childRegister_style.css">

</head>

<body>

<center>
<form method="POST" action="">
<h3>CHILD INFORMATION</h3>

Child's First Name <input type="text" name="kid_firstName"><br/><br/>
Child's Last Name <input type="text" name="kid_lastName"><br/><br/>
Child's Preferred Nickname <input type="text" name="nickname"><br/><br/>
Child's Date of Birth <input type="date" name = "kid_dateOfBirth"><br/><br/>
Child's Gender <select name="kid_gender">
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select><br/><br/>
Child's Allergies <input type="text" name="kid_allergies"></br>
<em>Please type in any and all allergies. Separate each allergy with a comma.</em>
<br/><br/>
<label>Name of School That Child Attends</label>
<input type="text" name="kid_school"><br/><br/>


<hr/>
<input type="submit" value="Register" name="submit">
</form>

<!--home message-->
<br/><br/><br/>
<a href="parent_home.php">Home</a><br/>
<em>Cancel registration and go back to your parent information page.</em>

</center>

<?php

include("connect.php");

//add in check field is not empty if statement
if(isset($_POST['submit'])){


$firstName=$_POST['kid_firstName'];
$lastName=$_POST['kid_lastName'];
$nickname=$_POST['nickname'];
$DOB=$_POST['kid_dateOfBirth'];
$age=$_POST['kid_age'];
$gender=$_POST['kid_gender'];
$allergies=$_POST['kid_allergies'];
$school=$_POST['kid_school'];
$grade=$_POST['grade'];
$parent_username=$_SESSION["sess_user"];

$query=("INSERT INTO awesome_kids (kid_firstName, kid_lastName, nickname, kid_date_of_birth, kid_gender, kid_allergies, kid_school, parent_username) VALUES ('$firstName','$lastName','$nickname', '$DOB', '$gender', '$allergies', '$school', '$parent_username')");
$result=mysql_query($query);

if($result){
	header("location:child_success.php");
}else{
	header("location:failure.php");
	die("injection error!!!!");
}

}//end if

?>



</body>

</html>

<?php
}
?>
