<?php 
	require 'config/dbc.php';
	$id = $_GET['id'];
	$query = mysqli_query($connection, "SELECT status FROM category WHERE id=$id") or die
	(mysqli_error($connection));
    $row = mysqli_fetch_array($query);

    if ($row['status'] == 'DEACTIVE')
     {
    	mysqli_query($connection, "UPDATE category SET status='ACTIVE' WHERE id=$id") or die(mysqli_error($connection));
    	header("location:category.php");
    }
    else 
    {
    	mysqli_query($connection, "UPDATE category SET status='DEACTIVE' WHERE id=$id") or die(mysqli_error($connection));
    	header("location:category.php");
    }




?>