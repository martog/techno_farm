<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $con->connect_error);
	} 
?>