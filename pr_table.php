<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $con->connect_error);
	} 

	function show_lands($con){
		$sql = "SELECT DISTINCT contracts.id as id, contracts.start_date as bdate, contracts.price as price, lands.area as area, lands.contracts_id as c_id
		FROM contracts, lands WHERE lands.contracts_id = contracts.id /*OR lands.contracts_id IS NULL ORDER BY area*/";
		echo "<table id = 'table1' class = 'table'><thead class = 'thead-inverse'><tr><th>Contract ID</th><th>Date</th><th>Area</th><th>Price</th></tr></thead><tbody>";
		$result = $con->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["id"]."</td><td>". $row["bdate"]."</td><td>".$row["area"]."</td><td>".$row["price"]."</td></tr>";
			}
		}
		echo "</tbody></table>";
	}
	

?>

<html>
	<head>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table1').DataTable();
			});
		</script>
		
	</head>
	<body>
		<center><img src = "img/logo.jpg"><br>
		<div id = "container" style = "width:40%">
		<?php
			show_lands($con);
		?>
		</div>
		<br>
		<a href = "index.php" class="btn btn-outline-primary">Go to Home page ></a>
		</center>
	</body>
</html>
