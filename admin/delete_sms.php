<?php 

	require 'config/dbc.php';

	$id = $_GET['id'];

	mysqli_query($connection, "DELETE FROM message WHERE id=$id") or die(mysqli_error($connection));

	header("location:sms.php");

 ?>