<?php 

/*
author:Luc Pitre<pitreluc@gmail.com>
created: 15 December 2014
purpose: enrollment confirmation and payment page for dazzling discoveries database
*/

session_start();
include("connect.php");
if(!isset($_SESSION["sess_user"])){
	header("location:home.php");
} else {
?>

<!DOCTYPE html>
<html>

<head>

<title>Enrollment Confirmation</title>

</head>

<body>

<?php

	if(isset($_GET['kids'])){
		$name=$_GET['kids'];
		echo"You have selected the following kid(s): <br/>";
		foreach($name as $kids){
			echo $kids."<br/>";
		}
	}

	if(isset($_POST['classes'])){
		foreach($_POST['classes'] as $key=>$val){
			echo $val;
		}
	}
		

	/*$class1 = 'unselected';
	
	if(isset($_POST['Dazzling Science'])){
		if(isset($_POST['Dazzling Science'])){
			$class1 = $_POST['Dazzling Science'];
			if($class1=='Dazzling Science'){
				$class1='selected';
			}
		}
	}
	
	if($class1 == 'selected'){
		echo"class 1 selected";
	}else{
		echo"class 1 NOT selected";
	}//end if/else statement*/

?>

<center>
<br/><br/><br/><hr/>
<a href="class_enroll.php">Return</a><br/>
<em>Cancel confirmation and go back to the previous page.</em>
</center>

</body>

</html>
<?php
}
?>