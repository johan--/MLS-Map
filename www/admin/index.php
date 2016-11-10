<?php
/* Copyright (C) 2016  Lehrstuhl f�r Technische Elektronik, Friedrich-Alexander-Universit�t Erlangen-N�rnberg */
/* https://github.com/lte-fau/MLS-Map/blob/master/LICENSE */

session_start();

if(isset($_GET['login']))
{	
	include "../../db/db-settings.php";
	$conn = pg_connect($connString)
	or die('Could not connect: ' . pg_last_error());
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM admins WHERE username = '$username'";
	$result = pg_query($conn, $sql);

	if (!$result) {
		$result = pg_query($conn, "CREATE TABLE admins(username char(50) NOT NULL, password varchar(255) NOT NULL, PRIMARY KEY (username))");
			
		if (!$result) {
			echo "An error occurred during Table creation.\n";
			exit;
		}
		
		$defaultPassword =  password_hash($defaultAdminPassword, PASSWORD_DEFAULT);
		
		$result = pg_query($conn, "INSERT INTO admins(
			username, password) VALUES ('$defaultAdminUsername', '$defaultPassword')");
	
		if (!$result) {
			echo "An error occurred during User creation.\n";
			exit;
		}
	
		$sql = "SELECT * FROM admins WHERE username = '$username'";
		$result = pg_query($conn, $sql); 
		if (!$result) {
			echo "An error occurred during Data Read.\n";
			exit;
		}		
	}
	
	if(pg_num_rows($result) == 1)
	{
		if(password_verify($password, pg_fetch_result($result, 0, 1)))
		{
			$_SESSION['userid'] = pg_fetch_result($result, 0, 0);
		}else
		{
			$errorString = "Wrong password.";
		}
			
	} else
	{
		$errorString = "Unknown User.";
	}
}

if(isset($_SESSION['userid']))
{
	header('Location: admin.php');
	exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>MapView Adm</title>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../jquery-ui/jquery-ui.min.css" />
	<link rel="stylesheet" href="adminDesign.css" />
	
	<script src="../js/jquery.min.js"></script>
	<script src="../jquery-ui/jquery-ui.min.js"></script>
	
</head>
<body>

	<div id="adminDiv">
		<div id="loginDiv">
			<p> 
			<?php 
				if(isset($errorString))
					echo $errorString;
				else
					echo "Please sign in.";
			?>
 
			<form action="?login=1" method="post">
				Username:<br>
				<input type="text" size="50" maxlength="250" name="username"><br><br>
				 
				Password:<br>
				<input type="password" size="50"  maxlength="250" name="password"><br>
				 
				<input type="submit" value="Login">
			</form> 
		</div>
	</div>
	
</body>
</html>
