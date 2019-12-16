<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(233, 233, 255);
            }
            
            button:hover {
                opacity: 0.8;
            }

            .container {
                padding: 16px;
            }
        </style>
    </head>
	
	<body style="background-image:url('back2.jpg');">
	
		<form action="addStu1.php" method="POST">
		
			<div class="container" style="margin-top: 15%; border: 2px solid black; box-sizing: border-box;">
			<br><br>
				<table border="0.5" style="width: 70%;">
					<tr>
						<td><label for="username" style="float: right; margin-right: 5%;">UserName</label></td>
						<td><input type="text" name="username" id="username" style="width:120%"></td>
					</tr>
					<tr>
						<td><label for="id" style="float: right; margin-right: 5%;">ID</label></td>
						<td><input type="text" name="id" id="id" style="width:120%"></td>
					</tr>
					<tr>
						<td><label for="password" style="float: right; margin-right: 5%;">Password</label></td>
						<td><input type="password" name="password" id="password" style="width:120%"></input></td>
					</tr>
					<tr>
						<td><label for="sem" style="float: right; margin-right: 5%;">Sem</label></td>
						<td><input type="sem" name="sem" id="sem" style="width:120%"></input></td>
					</tr>
					
					<tr>
						<td><input type="submit" value="Submit" style="margin-left: 100%; margin-top: 10%;"/>				
					</tr>
				</table>
			</div>
		</form>
    </body>
</html>
