<?php
	$link = mysqli_connect("localhost", "mhummer", "csAgan22", "db_project");
	// Check connection

	if($link === false){

		die("ERROR: Could not connect. " . mysqli_connect_error());

	}

	$athlete = mysqli_real_escape_string($link, $_POST['athlete']);
	$title = mysqli_real_escape_string($link, $_POST['title']);
	$linkdb = mysqli_real_escape_string($link, $_POST['link']);
	//$weight = mysqli_real_escape_string($link, $_POST['weight']);
	
	$sql = "INSERT INTO bjj_analysis (Athletes, Title, Link) VALUES('$athlete', '$title', '$linkdb')";
	if(mysqli_query($link, $sql)){

    echo "Records added successfully.";
	} 
	else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

	}
	echo "<p>
	<a href='index.php'>Home</a>
	</p>";
 

	// close connection

	mysqli_close($link);

	?>