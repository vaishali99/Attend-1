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
		<form action="delStu1.php" method="POST">
			<div class="container" style="margin-top: 15%;">
				<table border="0.5" style="width: 70%;">
					<tr>
						<td><label for="id" style="float: right; margin-right: 5%;">ID</label></td>
						<td><input type="text" name="id" id="id" style="width: 120%;"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Submit" style="margin-top: 10%; margin-left: 400%; padding: 0% 10%;"/>				
					</tr>
				</table>
			</div>
		</form>
    </body>
</html>
