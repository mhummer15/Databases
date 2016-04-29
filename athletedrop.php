<?php
mysql_connect('localhost', 'root', '*****');
mysql_select_db('db_project');

$sql  = "SELECT DISTINCT Athletes FROM bjj_analysis";
$result = mysql_query($sql);
if(!result)
{
	echo "<p>not queried</p>";
}
//echo "<p>queried</p>";

echo "<html>";
echo "<head><link rel='stylesheet' type='text/css' href='main.css'></head>";
echo "<body bgcolor='#B0E0E6'>";
echo "<p><a href='index.php'>Home</a></p>";
echo "<p>Select athlete from dropdown menu and click submit</p>";
echo "<form method='POST' action='athletescript.php'>";
echo "<select name='Athlete'>";
while ($row = mysql_fetch_array($result))
{
	echo "<option value='" . $row['Athletes'] . "'>" . $row['Athletes'] . "</option>";
}
echo "</select>";
echo "<input type='submit' value='Submit'>";
echo "</form>";
			
echo "</body>";
echo "</html>";
?>
