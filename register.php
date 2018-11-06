<html>
<head>
 <h1 align = "center">Library System</h1> 

<p colspan = "2" align = "center"><input type = "button" value = "search and reserve" onclick="location.href='search.php' ">
<input type="button" value="Logout" onclick="location.href='logout.php'; return false "> 
<input type = "button" value = "display" onclick="location.href='display.php' ">
<input type = "button" value = "Reservation and return" onclick="location.href='reservation.php' "></p>
</head>
<h2 align = "center"> Registration </h2>
<tr></tr>
<p align = "center" >Mobile phone numbers should be numeric and 10 characters in length and Password should be six characters </p>
<body bgcolor = "lightblue">
<form action = "register.php" method = "post">
<table border = "2" align = "center" bgcolor = "CHARTREUSE">

<tr>
<td colspan = "2" align = "center"> Register form </td>
</tr>

<tr>
<td>UserName: </td>
<td><input type = "text" name = "userName"></td>
</tr>

<tr>
<td>Password: </td>
<td><input type = "password" name = "Password" maxlength = 6 ></td>
</tr>

<tr>
<td> Confirm Password: </td>
<td><input type = "password" name = "CPassword"></td>
</tr>

<tr>
<td>FirstName: </td>
<td><input type = "text" name = "firstName"></td>
</tr>

<tr>
<td>Surname: </td>
<td><input type = "text" name = "surname"></td>
</tr>

<tr>
<td>AddressLine1: </td>
<td><input type = "text" name = "address1"></td>
</tr>

<tr>
<td>AddressLine2: </td>
<td><input type = "text" name = "address2"></td>
</tr>

<tr>
<td>City: </td>
<td><input type = "text" name = "city"></td>
</tr>

<tr>
<td>Telephone: </td>
<td><input type = "text" name = "telephone"></td>
</tr>

<tr>
<td>Mobile: </td>
<td><input type = "text" name = "mobile" maxlength = 10></td>
</tr>

<tr>
<td colspan = "2" align = "center"><input type = "submit" name = "register" ></td>
<tr>
<td colspan = "2" align = "center"><input type = "button" value = "Login" onclick="location.href='login.php' "></td>
<table>
</form>
</body>
</html>
<?php
$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
mysqli_select_db($db ,"ca") or die(mysqli_error());
if (isset($_POST) && !empty($_POST))
{
	$userName = mysqli_real_escape_string($db,$_POST["userName"]);
	$password = ($_POST["Password"]);
	$cpassword = ($_POST["CPassword"]);
	$firstname = mysqli_real_escape_string($db,$_POST["firstName"]);
	$surname = mysqli_real_escape_string($db,$_POST["surname"]);
	$address1 = mysqli_real_escape_string($db,$_POST["address1"]);
	$address2 = mysqli_real_escape_string($db,$_POST["address2"]);
	$city = mysqli_real_escape_string($db,$_POST["city"]);
	$telephone = is_numeric($_POST["telephone"]);
	$mobile = is_numeric($_POST["mobile"]);
	$query = "insert into users (userName,Password,FirstName,Surname, AddressLine1, AddressLine2, City, Telephone, Mobile ) 
	values ('$userName','$password','$firstname','$surname','$address1','$address2','$city','$telephone','$mobile')";
	
if(empty($_POST["userName"]) || empty($_POST["Password"]) || empty($_POST["CPassword"]) || empty($_POST["firstName"])||empty($_POST["surname"])||empty($_POST["address1"])|| empty($_POST["address2"])||empty($_POST["city"])||empty($_POST["telephone"])||empty($_POST["mobile"]) )
{
 echo '<p align = "center" style="color:red"> Please enter all information </p>';
}	
	else 
	{
		if(($_POST["Password"]) == ($_POST["CPassword"]))
		{
			if(is_numeric($_POST["mobile"]))
			{
				if(mysqli_query($db, $query))
	{
		echo '<p align = "center" style="color:green">your registration is successfull</p>';
		
	}
	else
	{
		 echo '<p align = "center" style="color:red"> incorrect information please try again </p>';
		
	}
			}
			else 
			{
				echo '<p align = "center" style="color:red"> Mobile is not numeric </p>';
			}
	}
	else 
	{
		echo '<p align = "center" style="color:red"> incorrect confirm password</p>';
	}
	}

	
}


?>