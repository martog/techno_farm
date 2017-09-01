<?php
	$con = mysqli_connect("localhost","martog","martog","techno_farm");

	if ($con->connect_error){
		die("Connection failed: " . $con->connect_error);
	} 
?>

<html>
	<head>
		<title>TechnoFarm</title>
		<script type="text/javascript" src = "js/script.js"></script>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</head>

	<body>

		<center>
			<div id = "menu">
				<img src = "img/logo.jpg"><br>
				<button onclick = "show_contract_form()" type="button" class="btn btn-outline-primary">Add contract</button>
				<button onclick = "show_land_form()" type="button" class="btn btn-outline-primary">Add land</button>
				<button onclick = "show_landlord_form()" type="button" class="btn btn-outline-primary">Add landlord</button>
			</div><br><br>

			<div id = "contract" style = "display: none; width: 30%;">
				<form method = "POST">
					<select class="form-control" name = "type">
						<option value="" disabled selected>Type</option>
						<option value = "Rent">Rent</option>
						<option value = "Property">Property</option>
					<select><br>
					<!--<input type = "text" class="form-control" name = "type" placeholder = "Type">-->
					<input type = "text" class="form-control" name = "start_date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" placeholder = "Start date"><br>
					<input type = "text" class="form-control" name = "end_date" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" placeholder = "End date"><br>
					<input type = "number" class="form-control" step="0.01" name = "rent_per_decare" min = "0" placeholder = "Rent per decare"><br>
					<input type = "number" class="form-control" step="0.01" name = "price" min = "0" placeholder = "Price"><br>
					<input type="submit" class="btn btn-outline-success" name="contract">
				</form>
			</div>

			<div id = "land" style = "display: none;  width: 30%;">
				<form method = "POST">
					<input type = "number" class="form-control" name = "area" min = "0" placeholder = "Area"><br>
					<input type="submit" class="btn btn-outline-success" name="land">
				</form>
			</div>

			<div id = "landlord" style = "display: none;  width: 30%;">
				<form method = "POST">
					<input type = "text" class="form-control" name = "fn_ln" placeholder = "First and last name"><br>
					<input type = "number" class="form-control" name = "phone_num" min = "0" placeholder = "Phone number"><br>
					<input type = "number" class="form-control" name = "personal_num" min = "0" placeholder = "Personal number"><br>
					<input type="submit" class="btn btn-outline-success" name="landlord">
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
				echo "<center>New record created successfully</center>";
			}else{
				echo "<center>Error: " . $sql . "<br>" . $con->error."</center>";
			}
		}else{
			echo "<center><p>Please fill all fields !</center>";
		}
	}else if(isset($_POST['land'])){
		if(!empty($_POST['area'])){

			$area = $_POST['area'];
			$sql = "INSERT INTO lands (area) VALUES (".$area.")";
			if ($con->query($sql) === TRUE){
				echo "<center>New record created successfully</center>";
			}else{
				echo "<center>Error: " . $sql . "<br>" . $con->error."</center>";
			}

			echo $area;
		}else{
			echo "<center><p>Please fill all fields !</center>";
		}
	}else if(isset($_POST['landlord'])){
		if(!empty($_POST['fn_ln']) && !empty($_POST['phone_num']) && !empty($_POST['personal_num'])){
			$fn_ln = $_POST['fn_ln'];
			$phone_num = $_POST['phone_num'];
			$personal_num = $_POST['personal_num'];
			echo "<center>New record created successfully</center>";
		}else{
			echo "<center><p>Please fill all fields !</center>";
		}
	}