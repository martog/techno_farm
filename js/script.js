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