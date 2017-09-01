function show_contract_form(){
	document.getElementById("contract").style.display = "block";
	document.getElementById("land").style.display = "none";
	document.getElementById("landlord").style.display = "none";
}

function show_land_form(){
	document.getElementById("contract").style.display = "none";
	document.getElementById("land").style.display = "block";
	document.getElementById("landlord").style.display = "none";
}

function show_landlord_form(){
	document.getElementById("contract").style.display = "none";
	document.getElementById("land").style.display = "none";
	document.getElementById("landlord").style.display = "block";
}

/*
<p>Add this area to contract</p>
					<select name="contracts_id">
					<option selected = "selected" value>Contract ID</option>
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
*/