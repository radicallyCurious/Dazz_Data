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



if(isset($_POST['classes'])){
	$class=$_POST['classes'];
	echo"you've selected these classes: <br/>";
	foreach($class as $val){
		echo $val."<br/>";
	}
}

if(isset($_POST['class'])){
	$classes=$_POST['class'];
	echo"you've selected these classes: <br/>";
	foreach($classes as $val){
		echo $val."<br/>";
	}
}
?>

<a href='enrollment_first.php'>Return</a>
<em>return to the previous page</em>

</body>

</html>