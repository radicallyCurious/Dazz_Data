<!DOCTYPE html>

<html>

<head>

<title>Child Registration</title>

</head>

<body>

<center>
<form>
<h3>CHILD INFORMATION</h3>

<label>Child's First Name</label>
<input type="text" name="kid_firstName"><br/><br/>
<label>Child's Last Name</label>
<input type="text" name="kid_lastName"><br/><br/>
<label>Child's Date of Birth</label>
<input type="date" name = "kid_dateOfBirth"><br/><br/>
<label>Child's Gender</label>
<select name="kid_gender">
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select><br/><br/>
<label>Child's Allergies</label>
<input type="text" name="kid_allergies"></br>
<em>Please type in any and all allergies. Separate each allergy with a comma.</em>
<br/><br/>


<hr/>
<input type="submit" value="Register">

</form>
</center>

<!--home message-->
<br/><br/><br/>
<center>
<a href="index.php">Home</a><br/>
<em>Cancel registration and Go back to the Log In screen</em>
</center>

</body>

</html>