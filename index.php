<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $conn->connect_error);
	} 
?>

<html>
	<head>
		<title>TechnoFarm</title>
		<script type="text/javascript" src = "js/script.js"></script>	
	</head>

	<body>

		<center>
			<div id = "menu">
				<button onclick = "show_contract_form()">Add contract</button><br>
				<button onclick = "show_land_form()">Add land</button><br>
				<button onclick = "show_landlord_form()">Add landlord</button><br>
			</div>

			<div id = "contract" style = "display: none;">
				<form method = "POST">
					<input type = "text" name = "type" placeholder = "Type"><br>
					<input type = "date" name = "start_date" placeholder = "Start date"><br>
					<input type = "date" name = "end_date" placeholder = "End date"><br>
					<input type = "number" step="0.01" name = "rent_per_decare" min = "0" placeholder = "Rent per decare"><br>
					<input type = "number" step="0.01" name = "price" min = "0" placeholder = "Price"><br>
					<input type="submit" name="contract">
				</form>
			</div>

			<div id = "land" style = "display: none;">
				<form method = "POST">
					<input type = "number" name = "area" min = "0" placeholder = "Area"><br>
					<p>Add this area to contract</p>
					<select name="contracts_id">
					<option>Contract ID</option>
					<?php
						$sql = "SELECT id FROM contracts";
						$result = $con->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value='".$row["id"]."'>". $row["id"]."</option>";
							}
						}
					?>
					</select><br>
					<input type="submit" name="land">
				</form>
			</div>

			<div id = "landlord" style = "display: none;">
				<form method = "POST">
					<input type = "text" name = "fn_ln" placeholder = "First and last name"><br>
					<input type = "number" name = "phone_num" min = "0" placeholder = "Phone number"><br>
					<input type = "number" name = "personal_num" min = "0" placeholder = "Personal number"><br>
					<input type="submit" name="landlord">
				</form>
			</div>
			<br>
			


		</center>
	</body>

</html>

<?php
	if(isset($_POST['contract'])){
		if(!empty($_POST['type']) && !empty($_POST['start_date']) && !empty($_POST['end_date']) && !empty($_POST['rent_per_decare']) && !empty($_POST['price'])){
			$type = $_POST['type'];
			$start_date = $_POST['start_date'];
			$end_date = $_POST['end_date'];
			$rent_per_decare = $_POST['rent_per_decare'];
			$price = $_POST['price'];

			$sql = "INSERT INTO contracts (type, start_date, end_date, rent_per_decare, price) VALUES ('".$type."', '".$start_date."', '".$end_date."', ".$rent_per_decare.", ".$price.")";
			if ($con->query($sql) === TRUE){
				echo "New record created successfully";
			}else{
				echo "Error: " . $sql . "<br>" . $con->error;
			}

			echo "<p>good</p>";
			echo $type, $start_date, $end_date, $rent_per_decare, $price;
		}else{
			echo "<p>Please fill all fields !";
		}
	}else if(isset($_POST['land'])){
		if(!empty($_POST['area'])){
			$area = $_POST['area'];
			$contracts_id = $_POST['contracts_id'];

			$sql = "INSERT INTO lands (area, contracts_id) VALUES (".$area.", ".$contracts_id.")";
			if ($con->query($sql) === TRUE){
				echo "New record created successfully";
			}else{
				echo "Error: " . $sql . "<br>" . $con->error;
			}
			
			echo $area;
		}else{
			echo "<p>Please fill all fields !";
		}
	}else if(isset($_POST['landlord'])){
		if(!empty($_POST['fn_ln']) && !empty($_POST['phone_num']) && !empty($_POST['personal_num'])){
			$fn_ln = $_POST['fn_ln'];
			$phone_num = $_POST['phone_num'];
			$personal_num = $_POST['personal_num'];
			echo $fn_ln, $phone_num, $personal_num;
		}else{
			echo "<p>Please fill all fields !";
		}
	}