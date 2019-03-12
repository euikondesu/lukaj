<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign up</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
	</head>
	<?php
	error_reporting(0);
	session_destroy();
	$fn=$_POST['a'];
	$mn=$_POST['b'];
	$ln=$_POST['c'];
	$email=$_POST['d'];
	$bd=$_POST['bday'];
	$gender=$_POST['gndr'];
	$un =$_POST['user'];
	$pw = $_POST['pass'];
	$pw1=$_POST['pass1'];
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$conn= mysqli_connect ("localhost","root","","weblibrarydb");
		if (isset($_POST) && !empty ($_POST))
		{
			$sql = "SELECT * FROM accounttbl WHERE Username='$un'";
			$sql1 = "SELECT * FROM accounttbl WHERE Email ='$d'";
			$result = mysqli_query($conn,$sql);
			$result1 = mysqli_query($conn,$sql1);
			$row = mysqli_num_rows ($result);
			$row1 = mysqli_num_rows ($result1);
			if ($fn == "" || $mn == "" || $ln == "" ||$email == "" ||$bd == "" || $un == "" ||$pw == "" || $pw1 == "" || $gender== "")
			{
				echo'<script>';
				echo'alert("All fields are required!")';
				echo'</script>';
			}
			else if ($row > 0 && $row1 > 0)
			{
				echo'<script>';
				echo'alert("Username and Email already exists!")';
				echo'</script>';
			}
			else if ($row > 0)
			{
				echo'<script>';
				echo'alert("Username already exists!")';
				echo'</script>';
			}
			else if ($row1 > 0)
			{
				echo'<script>';
				echo'alert("Email already exists!")';
				echo'</script>';
			}
			else
			{
				if ($pw != $pw1)
				{
					echo'<script>';
					echo'alert("Password is not matched!")';
					echo'</script>';
				}
				else if ($pw == $pw1)
				{
				$sql = "INSERT INTO accounttbl (Username,Password,Firstname,Middlename,Lastname,Email,Birthdate,Gender) VALUES ('$un','$pw','$fn','$mn','$ln','$email','$bd','$gender')";
				$result = mysqli_query($conn,$sql);
				echo'<script>';
				echo'alert("Successfully Signed Up!")';
				echo'</script>';
				}
				else{
					echo'<script>';
					echo'alert("Error!")';
					echo'</script>';
				}
			}
	}
	}
	?>
	<body>
<form action="" method="POST">
	<div class="sign">
	<h2>Please fill up all the Information needed</h2>
<b><p class="t">Name:
	<input type="text" placeholder="First Name"name="a" class="inputname">
	<input type="text" placeholder="Middle Name"name="b" class="inputname">
	<input type="text" placeholder="Last Name"name="c" class="inputname">
</p>
<p class="t">Birthday: 
	<input type="date" name="bday"class="input2">
	Gender: <select class="input3" name="gndr">
	<option></option>
	<option>Male</option>
	<option>Female</option>
	</select>
	Email Address: <input type="email"name="d" class="input1">
</p>
	<p class="t">Username: <input type="text" name="user" class="user"></p> 
	<p class="t">Password:<input type="password" name="pass" class="pass"></p> 
	<p class="t">Confirm Password: <input type="password" name="pass1" class="pass1"></p>
	<input type="submit" value="Sign Up" class="but"><br><br>
	<p class="t">Already have an account?<a href="login.php">Log In</a></p>
	</b>
	<h1><?php echo$output; ?></h1>
	</div>
	
</form>
	</body>
</html>		