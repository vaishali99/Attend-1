<?php
	session_start();
	$sem = $_POST['sem'];
	$sub_code = $_POST['sub_code'];
	$sub_name = $_POST['sub_name'];
	
	$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); 
	mysqli_select_db($con,"Attend") or die("Cannot connect to database"); 
	
	
	$query3 = mysqli_query($con, "Select * from subjects where sub_code='$sub_code'");
	$exists3 = mysqli_num_rows($query3);
	$null = NULL;
	echo $null;
	
	if($exists3<1)
	{
		mysqli_query($con, "INSERT INTO subjects (sub_code, sub_name, t_id, sem, total_classes) VALUES ('$sub_code','$sub_name',$null,'$sem','0')");

		$att = mysqli_query($con, "select * from student where sem = '$sem'");
		$exists2 = mysqli_num_rows($att);
		$s_id = "";
		
		if($exists2>0)
		{
			while($row = mysqli_fetch_assoc($att))
			{
				$s_id = $row['s_id'];
				mysqli_query($con, "INSERT INTO attendance (s_id, sub_code, classes_attended) VALUES('$s_id','$sub_code','0')");
			}			
		}
		
		Print '<script>alert("Subject Added!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}
	else 
	{
		Print '<script>alert("Subject already exists!!");</script>';
		Print '<script>window.location.assign("admin.php");</script>';
	}
	
?>