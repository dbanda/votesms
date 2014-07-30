<?php
	//echo "hello";
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	// Create connection
	$con=mysqli_connect("127.0.0.1","root","root","votes");

	// Check connection
	if (mysqli_connect_errno()) {
	  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	for ($teamnum=1; $teamnum < 9 ; $teamnum++) { 
	 	$sql="SELECT SUM(team$teamnum) AS val FROM votes;";
	 	$result = mysqli_query($con,$sql)->fetch_row();
	 	echo $result[0] . "<br>";
	}

	mysqli_close($con);
?>
