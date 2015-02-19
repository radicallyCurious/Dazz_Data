<!DOCTYPE>
<html>

<head>

<title>enrollment practice page</title>

</head>

<body>

<h2>enrollment practice page</h2>
<br/><br/><hr/>
<h3>pick a class</h3>
<br/><br/>

<?php

include("connect.php");

$sql="SELECT * FROM awesome_classes";
$result=mysql_query($sql);
$num=mysql_num_rows($result);

if($num > 0){
	echo"<form method='post' action='processing.php'>";
	$y=0;
	while($y < $num){
		$class=mysql_result($result, $y, "class_name");
		
		echo"
			<input type='checkbox' value='$class' name='class[]'>$class</input>
			<br/>
		";
		echo"</form>";
	$y++;
	
	
	}
}//end if

echo"<input type='submit' name='enroll1' value'Enroll1'>";	

if(isset($_POST['enroll1'])){
	header("location:processing.php");
}

?>

<form method='post' action ='processing.php'>
	<input type='checkbox' name='classes[]' value='class1'>Dazzling Science</input>
	<input type='checkbox' name='classes[]' value='class2'>Dazzling Robotics</input>
	<input type='checkbox' name='classes[]' value='class3'>Dazzling Programming</input>
	<input type='checkbox' name='classes[]' value='class4'>Dazzling Camp</input>
	<input type='submit' name='enroll2' value='Enroll2'>
</form>

<?php

if(isset($_POST['enroll2'])){
	header("location:processing.php");
}

?>

</body>

</html>