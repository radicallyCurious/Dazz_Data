<!DOCTYPE>
<html>

<head>

<title>Dazzling Class List</title>

</head>

<body>

<?php
	define('DB_NAME', 'awesome');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');

	$con=mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die("cannot select database");

	$sql="SELECT * FROM awesome_classes";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	
	echo"<center><h3>Class Information</h3></center>";
	echo"<center>
		<table border=1>
			<tr><td>Class Name</td><td>Class Location</td><td>Class Time</td><td>Class Day</td></tr>
		</table><br/>
		</center>
	";

	$x=0;
	while($x < $num){
	
	$name=mysql_result($result, $x, "class_name");
	$location=mysql_result($result, $x, "class_location");
	$time=mysql_result($result, $x, "class_time");
	$day=mysql_result($result, $x, "class_day");
	
	echo"
		<center>
		<table border=1>
			<tr><td>$name</td><td>$location</td><td>$time</td><td>$day</td></tr>
		</table><br/>
		</center>
	";
	
	$x++;
	}

	
?>
	
</body>

</html>