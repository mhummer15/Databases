<html>
	<head>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body bgcolor="#B0E0E6">
<?php
	echo "<p>
		<a href='index.php'>Home</a>
		</p>";
	$db_host = 'localhost';
	$db_user = 'mhummer';
	$db_pwd = '*****';

	$database = 'db_project';
	if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

	if (!mysql_select_db($database))
    die("Can't select database");
	
	$athlete = mysql_real_escape_string($_POST['Athlete']);
	$sql = "SELECT * FROM bjj_analysis WHERE Athletes='{$athlete}'";
	$result = mysql_query($sql);
	if(!$result)
	{
		die("couldn't find athletes");
	}
	$fields_num = mysql_num_fields($result);
	
	echo "<h1>{$athlete}</h1>";
	echo "<table border='1'><tr>";
	// printing table headers
	for($i=0; $i<$fields_num; $i++)
	{
		$field = mysql_fetch_field($result);
		echo "<td>{$field->name}</td>";
	}
	echo "</tr>\n";
	// printing table rows
	while($row = mysql_fetch_row($result))
	{
		echo "<tr>";

		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable
		foreach($row as $cell)
			echo "<td>$cell</td>";

		echo "</tr>\n";
	}
mysql_free_result($result);
?>
</body>
</html>
