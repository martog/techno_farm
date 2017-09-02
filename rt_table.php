<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $con->connect_error);
	} 

	function show_rents($con){
		$sql = "SELECT DISTINCT contracts.id as id, contracts.start_date as sdate, contracts.end_date as edate, lands.id as l_id, lands.area as area, landlords.fn_ln as owner, contracts.price as price, lands.contracts_id as c_id
		FROM contracts, lands, landlords WHERE lands.contracts_id = contracts.id AND lands.id = landlords.lands_id /*OR lands.contracts_id IS NULL ORDER BY area*/";
		echo "<table id = 'table2' class = 'table'><thead class = 'thead-inverse'><tr><th>Contract ID</th><th>Start Date</th><th>End Date</th><th>Area ID</th><th>Area</th><th>Owner</th><th>Price</th></tr></thead><tbody>";
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
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table2').DataTable();
			});
		</script>
	</head>

	<body>
		<center><img src = "img/logo.jpg"><br>
		<div id = "container" style = "width:50%">
		<?php
			show_rents($con);
		?>
		</div>
		<br>
		<a href = "index.php" class="btn btn-outline-primary">Go to Home page ></a>
		</center>
	</body>

</html>
