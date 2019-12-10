<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(229,255,204);
            }
            
            label[for=name] {
                display: inline-block;
				margin-left: 2%;
            }

            button {
                display: inline-block;
                padding: 1px 0px;
                border: 1px solid black;
                box-sizing: border-box;
                background-color: rgb(170, 200, 214);
                color: rgb(0, 0, 0);
                padding: 8px;
                margin: 8px 0px;
                border: none;
                cursor: pointer;
            }
			
			button[type="back"]{
				width: 25%;
			}
			
            button:hover {
                opacity: 0.8;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                margin: 10%;
                padding: 5px;
				margin-top: 5%;
            }

            .container {
                padding: 2%;
            }
			
        </style>
    </head>
	<?php
		session_start(); //starts the session
		if($_SESSION['user']){ //checks if user is logged in
		}
		else{
			header("location:index.php"); // redirects if user is not logged in
		}
		$t_user = $_SESSION['user']; //assigns user value
		$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
		mysqli_select_db($con,"Attend") or die("Cannot connect to database"); //connect to database
		$query = mysqli_query($con,"SELECT * from users WHERE username='$t_user'");
		$exists = mysqli_num_rows($query);
		$table_users = "";
		$table_id = "";

		if($exists > 0) 
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$table_users = $row['username'];
				$table_id = $row['id'];
			}
		}	
		
		$query2 = mysqli_query($con, "SELECT * from subjects where t_id='$table_id'");
		$exists2 = mysqli_num_rows($query2); 
		$subjects_sub_code = "";
		$subjects_sub_name = "";
		$subjects_sem = "";

		if($exists2 > 0) 
		{
			while($row = mysqli_fetch_assoc($query2)) 
			{
				$subjects_sub_code = $row['sub_code'];
				$subjects_sub_name = $row['sub_name'];
				$subjects_sem = $row['sem'];
			}
		}
	?>
    <body style="border: 2px solid black;">
        <div class="profile" >
            <label for="name"><b><h1><?php Print $table_users; ?></h1></b></label><br>
            <label for="name"><b><h3><?php Print $subjects_sub_name; ?></h3></b></label>
			<br><br><br>
		</div>

        <div class="container">
			<form action="generateCode.php" method="POST">
				<button type="gcode" name="gcode" id="gcode"><b>Generate Code</b></button>
			</form>
            <a href="addAtt.php" ><button type="addAtt" name="addAtt" id="addAtt"><b>Add Attendance</b></button></a>	  
		</div>
		
        <table style="width:80%">
            <tr>
              <th>Student ID</th>
              <th>Name</th> 
              <th>Attendance</th>
            </tr>
				
			<form action="excelsheet.php" method="POST">
				<a href="excelsheet.php">
					<img src="download.jpg" alt="Download Excel Sheet" style="height: 50px; width: 50px; margin-left: 80%;">
				</a>
			</form>
			
            <?php
				
				$query3 = mysqli_query($con,"SELECT * from student WHERE sem='$subjects_sem'");
				$exists3 = mysqli_num_rows($query3);
				$student_id = "";

				if($exists3 > 0) 
				{
					while($row = mysqli_fetch_assoc($query3))
					{
						$student_id = $row['s_id'];
						
						$query5 = mysqli_query($con,"SELECT * from users WHERE id='$student_id'");
						$exists5 = mysqli_num_rows($query5);
						$student_name = "";

						if($exists5 > 0) 
						{
							while($row = mysqli_fetch_assoc($query5))
							{
								$student_name = $row['username'];
							}
						}
						$query4 = mysqli_query($con,"SELECT * from attendance WHERE s_id='$student_id' and sub_code = '$subjects_sub_code' ");
						$exists4 = mysqli_num_rows($query4);
						$classes_attended = "";

						if($exists4 > 0) 
						{
							while($row = mysqli_fetch_assoc($query4))
							{
								$classes_attended = $row['classes_attended'];
								Print "<tr>";
								Print '<td align="center">'. $student_id . "</td>";	
								Print '<td align="center">'. $student_name . "</td>";
								Print '<td align="center">'. $classes_attended . "</td>";
								Print "</tr>";
							}
						}
					}
				}
			?>
			
          </table>

            <a href="index.php" ><button type="back">Logout</button></a>

    </body>
</html>
