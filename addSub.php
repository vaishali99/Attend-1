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
	
	<body style=" background-image:url('back2.jpg');">
		<form action="addSub1.php" method="POST">
			<div class="container" align="center"  style="border: 2px solid black; box-sizing: border-box; margin-top:15%">
				<table border="0.5" style="width: 70%;">
					<tr>
						<td><label for="sem">Sem</label></td>
						<td><input type="sem" name="sem" id="sem" style="width: 120%;"></input></td>
					</tr>
					<tr>
						<td><label for="sub_name">Subject Name</label></td>
						<td><input type="sub_name" name="sub_name" id="sub_name" style="width: 120%;"></input></td>
					</tr>
					<tr>
						<td><label for="sub_code">Subject Code</label></td>
						<td><input type="sub_code" name="sub_code" id="sub_code" style="width: 120%;"></input></td>
					</tr>
					
					<tr>
						<td><input type="submit" value="Submit" style="margin-left: 230%; margin-top: 10%; font-size: 15px;"/>				
					</tr>
				</table>
			</div>
		</form>
    </body>
</html>