<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT DISTINCT contracts.id as id, contracts.start_date as bdate, contracts.price as price, lands.area as area, lands.contracts_id as c_id
	FROM contracts, lands WHERE lands.contracts_id = contracts.id /*OR lands.contracts_id IS NULL ORDER BY area*/";
	$result = $con->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "Contract ID: ".$row["id"].", Date: ". $row["bdate"].", Area: ".$row["area"].", Price: ".$row["price"]."<br>";
		}
	}

?>