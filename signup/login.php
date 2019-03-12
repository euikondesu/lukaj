<!doctype html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
error_reporting(0);
$un=$_POST['user'];
$pw=$_POST['pass'];
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	/* CONNECTION = (LOCALHOST,HOSTNAME,PASSWORD,DBNAME)*/
	$con = new mysqli ("localhost","root","","weblibrarydb");
	$sql = "SELECT * FROM accounttbl WHERE Username = '$un' AND Password='$pw'";
	$result = $con->query($sql);
	$row = mysqli_fetch_assoc($result);
	if ($un =="" || $pw =="")
	{
		echo'<script>';
		echo'alert("All fields are required!")';
		echo'</script>';
	}
	else if ($result->num_rows==1)
	{
		$_SESSION["Username"]=$row["Firstname"]." ".$row["Lastname"];
		header("location:account.php");
	}
	else{
		echo'<script>';
		echo'alert("Username and password is incorrect!")';
		echo'</script>';
	}
	$con->close();
}
?>
<body>
	<form action="" method="POST">
	<div class="login">
	<h1>Account Log In</h1>
	<input type="text" placeholder="Username" name="user" class="input1">
	<input type="password" placeholder="Password" name="pass" class="input2">
	<input type="submit" value="Log In" class="but">
	<h3 class="par">Does not have an account yet?<br><a href="signup.php">Sign up here</a></h3>
	</div>
	</form>
</body>
</html>