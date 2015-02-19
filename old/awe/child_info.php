<!DOCTYPE>
<html>

<head>

<title>Dazzling Child Information Page</title>
<link type ="text/css" rel="stylesheet" href="childHome_style.css">

</head>

<body>

<?php

	define('DB_NAME', 'awesome');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	$user=$_SESSION['sess_user'];

	$con=mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("cannot select database");

	
	/*CHANGE $sql VARIABLE TO WORK BASED ON THE CHILD SELECTED*/
	/*CHANGE!!!!!!*/$sql="SELECT * FROM awesome_table WHERE username='$user'";//CHANGE!!!!!!!!!
	$result=mysql_query($sql);
	
	if($row=mysql_fetch_array($result)){
	
		$fName=$row['kid_firstName'];
		$lName=$row['kid_lastName'];
		$nName=$row['nickname'];
		$dob=$row['kid_date_of_birth'];
		$age=$row['kid_age'];
		$gender=$row['kid_gender'];
		$allergies=$row['kid_allergies'];
		$school=$row['kid_school'];
		
		echo "
		
			<h3>Child Information</h3>
			
			<table border=1>
				<tr><td>First Name</td><td$fName</td></tr>
				<tr><td>Last Name</td><td$lName</td></tr>
				<tr><td>Nickname</td><td$nName</td></tr>
				<tr><td>Date of Birth</td><td$dob</td></tr>
				<tr><td>Age</td><td$age</td></tr>
				<tr><td>Gender</td><td$gender</td></tr>
				<tr><td>Allergies</td><td$allergies</td></tr>
				<tr><td>School</td><td$school</td></tr>
			</table>
			<br/><br/>
			<hr/>
		
		";
		
	}//end if

	//create while loop to print out child's classes...
	
	/*<h3>Classes Enrolled In</h3>
			
			<table border=1>
				<tr></tr>
			</table>
			
			*/
?>

</body>

</html>