<?php
	session_start();
	$sub_code = $_POST['sub_code'];
	
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); 
	mysqli_select_db($con,"Attend") or die("Cannot connect to database"); 
	
	$query = mysqli_query($con, "Select * from subjects where sub_code='$sub_code'");
	$exists = mysqli_num_rows($query);
	
	if($exists>0)
	{
		mysqli_query($con, "DELETE from subjects where sub_code='$sub_code'");
		mysqli_query($con, "DELETE from code where sub_code = '$sub_code'");
		mysqli_query($con, "DELETE from attendance where sub_code = '$sub_code'");

		Print '<script>alert("Subject Deleted!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}
	else
	{
		Print '<script>alert("Incorrect Data!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}

?>