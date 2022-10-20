<?php 
 	
 	session_start();
 	$isValid = $_SESSION['isValid'];

 	if ( ! $isValid) header("location:index.php");

?>