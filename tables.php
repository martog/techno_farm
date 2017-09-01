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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php
		show_lands($con);
		?>
	</body>
</html>
