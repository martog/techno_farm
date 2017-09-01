<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $con->connect_error);
	} 

	function show_lands($con){
		$sql = "SELECT DISTINCT contracts.id as id, contracts.start_date as bdate, contracts.price as price, lands.area as area, lands.contracts_id as c_id
		FROM contracts, lands WHERE lands.contracts_id = contracts.id /*OR lands.contracts_id IS NULL ORDER BY area*/";
		echo "<table class = 'table'><thead><tr><th>Contract ID</th><th>Date</th><th>Area</th><th>Price</th></tr></thead><tbody>";
		$result = $con->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["id"]."</td><td>". $row["bdate"]."</td><td>".$row["area"]."</td><td>".$row["price"]."</td><td></tr>";
			}
		}
		echo "</tbody></table>";
	}
	

?>

<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<?php
		show_lands($con);
		?>
	</body>
</html>
