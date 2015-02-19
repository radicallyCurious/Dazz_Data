<?php 
session_start();
include("connect.php");
if(!isset($_SESSION["sess_user"])){
	header("location:home.php");
} else {
?>



<!DOCTYPE>
<html>

<head>

<title>Class Enrollment</title>

<head>

<body>

<center>
<h2>Available and Upcoming Class Information</h2>
<em>*dates are in year-month-day format*</em>
<em>|||**tables follow this format:**</em><!--MAKE DIFFERENT COLOR___TO POP---->
</center>

<?php

	//display class info
	
	//create mysql query variables
	$sql3="SELECT * FROM awesome_classes";
	$result3=mysql_query($sql3);
	$num=mysql_num_rows($result3);
	
	//setup class list legend
	echo"<center>
		<table border=1>
			<tr><td>Class Name</td><td>Class Location</td><td>Start Time</td><td>End Time</td><td>Class Day</td><td>Start Date</td><td>End Date</td></tr>
		</table><br/>
		</center>
	";

	//loop through mysql rows and display data
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
	//end class info display

?>

<br/><hr/>

<?php

	//class enrollment options
	
	$user=$_SESSION["sess_user"];
	
	$sql1="SELECT * FROM awesome_table WHERE username='$user'";
	$sql2="SELECT * FROM awesome_kids WHERE parent_username='$user'";
	$result1=mysql_query($sql1);
	$resultKid=mysql_query($sql2);
	$numKid=mysql_num_rows($resultKid);
	
	
	$sql3="SELECT * FROM awesome_classes";
	$resultClass=mysql_query($sql3);
	$numClass=mysql_num_rows($resultClass);
	//format to center
	echo"<center>";
	//create section heading
	echo "<h2>*Select The Child You Wish To Enroll*</h2>";
	//display kids FIRST names with checkboxes to select
	if($numKid > 0){
		echo"<form method='get' action='confirm_enroll.php'>";
		$x=0;
		while($x < $numKid){
	
			$kfName=mysql_result($resultKid, $x, "kid_firstName");
			echo"
			<input type='checkbox' name='kids[]' value='$kfName' checked>$kfName
			";
		$x++;
		}//end while...kids display
		echo"</form>";
	}
	
	/*!!!!!!NEED TO STORE SELECTED KID IN COOKIES AS WELL!!!!!!*/
	
	
	//create class section heading
	echo "<h2>*Select The Class You Wish To Enroll In*</h2>";
	//display the class name with checkboxes next to each name
	if($numClass > 0){
		$y=0;//row count variable for query selection and display
		echo"<form method='post' action='confirm_enroll.php'>";
		while($y < $numClass){//changed from $y < numClass
	
			$className=mysql_result($resultClass, $y, "class_name");
			echo"<br/>
			<input type='checkbox' name='classes[]' value='$className' checked>$className</input>
			<br/>
			";
			echo"</form>";
		$y++;
		}//end while...class display with checkboxes
		echo"</center>";//end center
	}//end class display
?>



<center>
<form method="post" action="">
<br/><br/><br/>
<input type="submit" value="ENROLL" name="enroll"><br/>
<em>*you will be redirected to a confirmation page and NOT enrolled just yet*</em>
</form>
</center>

<?php
if(isset($_POST["enroll"])){
	//send to confirmation page
	header("location:confirm_enroll.php");
}//end isset if
?>

<br/><hr/>
<center>
<a href="parent_home.php">Return</a><br/>
<em>Go back to YOUR parent page.</em>
</center>

</body>

</html>
<?php
}
?>