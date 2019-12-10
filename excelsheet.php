<?php

	session_start();
	
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user'];

	$con = mysqli_connect("localhost", "root","") or die(mysqli_error());
	mysqli_select_db($con,"Attend") or die("Cannot connect to database");

	

?>