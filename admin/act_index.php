<?php 
	session_start();
	require 'config/dbc.php';
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = mysqli_query($connection, "SELECT * FROM member WHERE email='$email' AND password='$password' AND status='ACTIVE'") or die (mysqli_error($connection));

	if (mysqli_num_rows($query) > 0 ) {
		$row = mysqli_fetch_array($query);
		$_SESSION['isValid'] = true;
		$_SESSION['fullname'] = $row['fullname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['member_id'] = $row['id'];

		header("location:category.php");
	}

	else 
	{
	header("location:category.php");	
	}




?>