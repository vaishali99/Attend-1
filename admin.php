<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(233, 233, 255);
            }
            
            button {
                display: inline-block;
				width: 280px;
                padding: 8px 20px;
                border: 1px solid black;
                background-color: rgb(170, 200, 214);
                color: rgb(0, 0, 0);
                margin: 8px 30px;
                border: none;
                cursor: pointer;
            }

            button:hover {
                opacity: 0.8;
            }

            .container {
                padding: 16px;
				text-align: center;
				margin-top: 15%;
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
		$a_user = $_SESSION['user']; //assigns user value
		$con = mysqli_connect("localhost", "root","") or die(mysqli_error()); //Connect to server
		mysqli_select_db($con,"Attend") or die("Cannot connect to database"); //connect to database
		$query = mysqli_query($con,"SELECT * from users WHERE username='$a_user'");
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
		
	?>
	<body style="border: 2px solid black; background-image:url('back2.jpg');">
		<br><br>
		<a href="index.php" style="color:rgb(0,0,102); float: right; margin-right: 3%;">Click here to logout</a>
 		
		<h1 style="margin: 0px 50px; float: left"><?php Print "$a_user"?></h1>
		
		<div class="container" style="padding: 0px;">
			<a href="addStu.php"><button>Add Student</button></a>
			<a href="delStu.php"><button>Delete Student</button></a><br><br><br>
			<a href="addTeacher.php"><button>Add Teacher/Subject</button></a>
			<a href="delTeacher.php"><button>Delete Teacher</button></a>
			<a href="delSub.php"><button>Delete Subject</button></a><br>
		</div>
		<br><br><br>
    </body>
</html>
