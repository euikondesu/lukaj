<!doctype html>
<html>
<head>
	<title>account</title>
	<?php 
		session_start();
		session_destroy();
		if (!isset($_SESSION["Username"]))
		{
			header("location:login.php");
		}
	?>
</head>
<body>
	<header>
		<h2>Web Library</h2>
		<a href="login.php"> Log Out</a>
	</header>
	<h1> Welcome 
	<?php
	echo $_SESSION["Username"];
	?>
</body>
</html>