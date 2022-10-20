<?php 
	require 'config/dbc.php';

	$id = $_GET['id'];

	$query = mysqli_query($connection, "SELECT status FROM media WHERE id=$id") or die 
	(mysqli_error($connection));

	$row = mysqli_fetch_array($query);

	if ($row['status'] == 'DEACTIVE') {
		mysqli_query($connection, "UPDATE media SET status='ACTIVE' WHERE id=$id") or die(mysqli_error($connection));
		header("location:media.php");
	}
	else
	{
		mysqli_query($connection, "UPDATE media SET status='DEACTIVE' WHERE id=$id") or die(mysqli_error($connection));
		header("location:media.php");
	}


?>