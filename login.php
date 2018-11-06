<html>
<head>
 <h1 align = "center">Library System</h1> 
</head>

<h2 align = "center"> Please Login in or Register</h2>
<tr></tr>

<body bgcolor = "lightgreen">
<form action = "login.php" method = "post">
<table border = "2" align = "center" bgcolor = "lightpink" >
<tr>
<td colspan = "2" align = "center"> login form </td>
</tr>

<tr>
<td>UserName: </td>
<td><input type = "text" name = "userName"></td>
</tr>

<tr>
<td>Password: </td>
<td><input type = "password" name = "Password"></td>
</tr>

<tr>
<td colspan = "2" align = "center"><input type = "submit" name = "Login" ></td>
</tr>

<tr>
<td colspan = "2" align = "center"><input type = "button" value = "Register" onclick="location.href='register.php' "></td>
</tr>


</form>
</body>
</html>
<?php
session_start();
echo "<font size='10'>"; 
$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
mysqli_select_db($db ,"ca") or die(mysqli_error());
if (isset($_POST) && !empty($_POST))
{
	$userName = $_POST["userName"];
	$password = $_POST["Password"];
	
	$query = "select * from users where userName = '$userName' and Password = '$password'";
     $result = mysqli_query($db, $query);	
	 $count = mysqli_num_rows($result);
	if($count == 1)
	{
		$_SESSION['userName'] = $userName;
		header('Location: search.php');
		return;
	}
	else
	{
		$_SESSION["error"] = "invalid username or password";
		header('Location: login.php');
		return;
	}
}

if ( isset($_SESSION["error"]) ) {
echo('<p style="color:red" align = "center">Error:'.
$_SESSION["error"]."</p>\n");
unset($_SESSION["error"]);
}

  
?>
