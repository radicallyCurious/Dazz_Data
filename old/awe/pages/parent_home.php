<?php
/*
author:Luc Pitre<pitreluc@gmail.com>
created: 8 December 2014
purpose: home page for logged in parents for dazzling discoveries databases
*/

session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:home.php");
} else {
?>


<!DOCTYPE html>
<html>

<head>

<title>Dazzling Parent Home Page</title>
<link type ="text/css" rel="stylesheet" href="parentHome_style.css">

</head>

<body>
<center>
<h2>Welcome, <?=$_SESSION['sess_user'];?>!</h2><hr/>
</center>
<br/><br/>

<center>

<p>

<?php
	include("connect.php");
	$user=$_SESSION['sess_user'];

	$sql="SELECT * FROM awesome_table WHERE username='$user'";
	$result=mysql_query($sql);
	
	if($row=mysql_fetch_array($result)){
		$username=$row["username"];
		$fName=$row["firstName"];
		$lName=$row["lastName"];
		$email=$row["email"];
		$homephone=$row["home_phone"];
		$workphone=$row["work_phone"];
		$cellphone=$row["cell_phone"];
		$bestnum=$row["best_num"];
		$address=$row["street_address"];
		$city=$row["city"];
		$state=$row["state"];
		$zip=$row["zipcode"];
		$emgContFName=$row["kid_emgContFirstName"];
		$emgContLName=$row["kid_emgContLastName"];
		$emgContRel=$row["kid_emgContRel"];
		$emgContNum=$row["kid_emgContNumber"];
		$altAdultFName=$row["altAdultFirstName"];
		$altAdultLName=$row["altAdultLastName"];
		$altAdultRel=$row["altAdultRelation"];
		$altAdultNum=$row["altAdultPhone"];
		
		echo "
		
		<h3>Your Information</h3>
		
		<table border=1>
			<tr><td>Username</td><td>$username</td></tr>
			<tr><td>First Name</td><td>$fName</td></tr>
			<tr><td>Last Name</td><td>$lName</td></tr>
			<tr><td>Email</td><td>$email</td></tr>
			<tr><td>Home Phone</td><td>$homephone</td></tr>
			<tr><td>Work Phone</td><td>$workphone</td></tr>
			<tr><td>Cell Phone</td><td>$cellphone</td></tr>
			<tr><td>Best Number To Reach You At</td><td>$bestnum</td></tr>
			<tr><td>Street Address</td><td>$address</td></tr>
			<tr><td>City</td><td>$city</td></tr>
			<tr><td>State</td><td>$state</td></tr>
			<tr><td>Zipcode</td><td>$zip</td></tr>
			<tr><td>Emergency Contact First Name</td><td>$emgContFName</td></tr>
			<tr><td>Emergency Contact Last Name</td><td>$emgContLName</td></tr>
			<tr><td>Emergency Contact Relationship</td><td>$emgContRel</td></tr>
			<tr><td>Emergency Contact Phone Number</td><td>$emgContNum</td></tr>
			<tr><td>Alternate Adult First Name</td><td>$altAdultFName</td></tr>
			<tr><td>Alternate Adult Last Name</td><td>$altAdultLName</td></tr>
			<tr><td>Alternate Adult Relationship</td><td>$altAdultRel</td></tr>
			<tr><td>Alternate Adult Phone Number</td><td>$altAdultNum</td></tr>
		</table>
		";
	}//end if
	
	
	
	
?>

</p>
<br/><br/><hr/>

<h3>Your Children</h3>

<?php

$sql2="SELECT * FROM awesome_kids WHERE parent_username='$user'";
$result2=mysql_query($sql2);
$kidNum=mysql_num_rows($result2);

$y=0;
while($y < $kidNum){

	$kfName=mysql_result($result2, $y, "kid_firstName");
	$klName=mysql_result($result2, $y, "kid_lastName");
	$kAllergies=mysql_result($result2, $y, "kid_allergies");
	$kDOB=mysql_result($result2, $y, "kid_date_of_birth");
	$kGender=mysql_result($result2, $y, "kid_gender");
	$kSchool=mysql_result($result2, $y, "kid_school");
	$child_count=($y+1);
	
	echo"
	<strong><em>Child Number $child_count</em></strong>
	<table border=1>
		<tr><td>Child First Name</td><td>$kfName</td></tr>
		<tr><td>Child Last Name</td><td>$klName</td></tr>
		<tr><td>Child Allergies</td><td>$kAllergies</td></tr>
		<tr><td>Child Date of Birth</td><td>$kDOB</td></tr>
		<tr><td>Child Gender</td><td>$kGender</td></tr>
		<tr><td>Child School</td><td>$kSchool</td></tr>
	</table>
	<br/>

	";

	$y++;
}//end while

?>
<br/>
<a href="child_register.php"><em>*Register Your Child*</em></a>
<br/><hr/>

<center>
<h2>Available and Upcoming Class Information</h2>
<em>*dates are in year-month-day format*</em>
<em>|||**tables follow this format:**</em><!--MAKE DIFFERENT COLOR___TO POP---->
</center>

<?php

	//display class info

	$sql3="SELECT * FROM awesome_classes";
	$result3=mysql_query($sql3);
	$num=mysql_num_rows($result3);
	
	echo"<center>
		<table border=1>
			<tr><td>Class Name</td><td>Class Location</td><td>Start Time</td><td>End Time</td><td>Class Day</td><td>Start Date</td><td>End Date</td></tr>
		</table><br/>
		</center>
	";

	$x=0;
	while($x < $num){
	
	$name=mysql_result($result3, $x, "class_name");
	$location=mysql_result($result3, $x, "class_location");
	$startTime=mysql_result($result3, $x, "class_startTime");
	$endTime=mysql_result($result3, $x, "class_endTime");
	$day=mysql_result($result3, $x, "class_day");
	$start=mysql_result($result3, $x, "start_date");
	$end=mysql_result($result3, $x, "end_date");
	
	echo"
		<center>
		<table border=1>
			<tr><td>$name</td><td>$location</td><td>$startTime</td><td>$endTime</td><td>$day</td><td>$start</td><td>$end</td></tr>
		</table><br/>
		</center>
	";
	
	$x++;
	}

?>
<br/>

<a href="class_enroll.php"><em>*Enroll Your Child In A Class*</em></a>
<br/><br/>

<br/><br/>
<a href="try_wufoo_enroll.php"><em>*Wufoo Enroll*</em></a>
<br/><br/>

</center>


<hr/>
<center>
<a href="logout.php">LOGOUT</a><br/>
<em>Logout and go back to the home screen.</em>
</center>

</body>

</html>
<?php
}
?>