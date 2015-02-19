<!--
/*
author:Luc Pitre<pitreluc@gmail.com>
created: 8 December 2014
purpose: parent/guardian registration form for dazzling discoveries database
*/
-->

<!DOCTYPE html>
<html>

<head>

<title>Dazzling Parent Registration</title>
<link type ="text/css" rel="stylesheet" href="parentRegister_style.css">

</head>

<body>

<center>
<h1>Dazzling Discoveries
<br/>New Parent Account Creation</h1>
</center>

<br/>
<center>Fill out <strong>ALL</strong> of the fields and then hit "register."</center><!--MAKE DIFFERENT COLOR___TO POP---->
<br/><br/>
<center><form method="POST" action="">

<fieldset>
<h2>Account Information</h2><br/>
	USERNAME<br/><input type="text" name="username"><br/><br/>
	PASSWORD<br/><input type="password" name="password"><br/><br/>
</fieldset><br/>
<h2>Parent Information</h2>
<br/>

Parent's First Name <input type="text" name="firstName"><br/><br/>
Parent's Last Name <input type="text" name="lastName"><br/><br/>
Parent's Email <input type="text" name="email"><br/><br/>
Parent's Home Phone <input type="text" name="homephone"><br/><br/>
Parent's Work Phone <input type="text" name="workphone"><br/><br/>
Parent's Cell Phone <input type="text" name="cellphone"><br/><br/>
<strong>BEST</strong> Phone Number To Reach You At During The Day <br/><input type="text" name="best_num"><br/>
<em>type in either "cell", "work", or "home"</em><br/><br/>
<hr/>
<h2>Address Information</h2><br/>
Parent's Street Address <input type="text" name="street_address"><br/>
<em>Include apartment number if applicable.</em><br/><br/>
City <input type="text" name="city"><br/><br/>
State <input type="text" name="state"><br/><br/>
Zipcode <input type="text" name="zip"><br/>
<hr/>
<h2>Emergency Contact Information</h2>
<em>Fill out information for a person we can contact in the event of an emergency.</em><br/><br/>
First Name of Contact <input type="text" name="emgContactFirstName"><br/><br/>
Last Name of Contact <input type="text" name="emgContactLastName"><br/><br/>
Contact's Relationship to the Child <input type="text" name="emgContactRel"><br/><br/>
Contact's Phone Number <input type="text" name="emgContactNumber"><br/><br/>
<em>Enter the phone number that the person will ALWAYS answer.</em><br/>
<hr/>
<h2>Alternate Adult Information</h2>
<em>**IF your child will be picked up by another adult, fill out these fields**</em><br/><br/>
First Name of The Alternate Adult <input type="text" name="altAdultFirstName"><br/><br/>
Last Name of The Alternate Adult <input type="text" name="altAdultLastName"><br/><br/>
Relationship of The Alternate Adult to <strong>your child</strong><input type="text" name="altAdultRelation"><br/><br/>
Phone Number of The Alternate Adult <input type="text" name="altAdultPhone"><br/><br/>


<hr/>
<input type="submit" value="Register" name="submit">

<!--home message-->
<br/><br/><br/>
<a href="home.php">Home</a><br/>
<em>Cancel registration and go back to the Log In screen</em>

</form></center>

<?php

include("connect.php");

if(isset($_POST['submit'])){

	if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['cellphone']) && !empty($_POST['street_address']) /*&& !empty($_POST['emgContactFirstName']) && !empty($_POST['emgContactNumber'])*/){

		$user=$_POST['username'];
		$pass=$_POST['password'];
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$email=$_POST['email'];
		$homephone=$_POST['homephone'];
		$workphone=$_POST['workphone'];
		$cellphone=$_POST['cellphone'];
		$best_num=$_POST['best_num'];
		$address=$_POST['street_address'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$zip=$_POST['zip'];
		$emgFirstName=$_POST['emgContactFirstName'];
		$emgLastName=$_POST['emgContactLastName'];
		$emgRel=$_POST['emgContactRel'];
		$emgNumber=$_POST['emgContactNumber'];
		$altFirstName=$_POST['altAdultFirstName'];
		$altLastName=$_POST['altAdultLastName'];
		$altRel=$_POST['altAdultRelation'];
		$altPhone=$_POST['altAdultPhone'];
		
		//!!!***put in a search for duplicates and reject if there is a duplicate***!!!
		

			$query=("INSERT INTO awesome_table (firstName, lastName, email, home_phone, work_phone, cell_phone, best_num, street_address, city, state, zipcode, kid_emgContFirstName, kid_emgContLastName, kid_emgContRel, kid_emgContNumber, altAdultFirstName, altAdultLastName, altAdultRelation, altAdultPhone, username, password) VALUES ('$firstName','$lastName','$email','$homephone', '$workphone', '$cellphone', '$best_num', '$address', '$city', '$state', '$zip', '$emgFirstName', '$emgLastName', '$emgRel', '$emgNumber', '$altFirstName', '$altLastName',  '$altRel', '$altPhone', '$user', '$pass')");
			$result=mysql_query($query);
		
		
			if($result){
				header("location:success.php");
			}else{
				header("location:failure.php");
				die("injection error!!!!");
			}
}

	else{
		header("location:regFieldProb.php");
	}

}//end if

?>

</body>

</html>