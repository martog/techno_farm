<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $con->connect_error);
	} 

	function show_rents($con){
		$sql = "SELECT DISTINCT contracts.id as id, contracts.start_date as sdate, contracts.end_date as edate, lands.id as l_id, lands.area as area, landlords.fn_ln as owner, contracts.price as price, lands.contracts_id as c_id
		FROM contracts, lands, landlords WHERE lands.contracts_id = contracts.id /*OR lands.contracts_id IS NULL ORDER BY area*/";
		echo "<center><table class = 'table' style = 'width: 40%;'><thead class = 'thead-inverse'><tr><th>Contract ID</th><th>Start Date</th><th>End Date</th><th>Area ID</th><th>Area</th><th>Owner</th><th>Price</th></tr></thead><tbody>";
		$result = $con->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["id"]."</td><td>". $row["sdate"]."</td><td>".$row["edate"]."</td><td>".$row["l_id"]."</td><td>".$row["area"]."</td><td>".$row["owner"]."</td><td>".$row["price"]."</td></tr>";
			}
		}
		echo "</tbody></table><center>";
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
		<center><img src = "img/logo.jpg"><br>
		<?php
			show_rents($con);
		?>
		<br>
		<a href = "index.php" class="btn btn-outline-primary">Go to Home page ></a>
		</center>
	</body>
</html>