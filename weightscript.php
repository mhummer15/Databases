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
	
	$weight = mysql_real_escape_string($_POST['weight_class']);
	$sql = "SELECT bjj_analysis.Athletes, bjj_analysis.Title, bjj_analysis.Link
				FROM bjj_analysis
				INNER JOIN bjj_weights
				ON bjj_analysis.Athletes = bjj_weights.Athlete
				WHERE Weight_Class = '{$weight}'";
	$result = mysql_query($sql);
	if(!$result)
	{
		die("couldn't find athletes");
	}
	$fields_num = mysql_num_fields($result);

	echo "<h1>{$weight}weights</h1>";
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
