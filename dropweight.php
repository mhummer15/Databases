<html>
	<head>
	</head>
	<body>		
		<p>
			<a href='index.php'>Home</a>
		</p>
		<p>Select weight class from dropdown menu and click submit</p>
		<form method="POST" action="weightscript.php">
			<select name="weight_class">
				<option value="Rooster">Rooster</option>
				<option value="Light Feather">Light Feather</option>
				<option value="Feather">Feather</option>
				<option value="Light">Light</option>
				<option value="Middle">Middle</option>
				<option value="Medium Heavy">Medium Heavy</option>
				<option value="Heavy">Heavy</option>
				<option value="Super Heavy">Super Heavy</option>
				<option value="Ultra Heavy">Ultra Heavy</option>
			</select>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>