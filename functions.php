<?php
	// functions.php
	// siia tulevd funktsioonid, kõik mis seotud AB'ga
	
	// Loon AB'i ühenduse
	require_once("../configGlobal.php");
	$database = "if15_toomloo_3";
	
	function getCarData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
		$stmt->bind_result($id, $user_id_from_database, $number_plate, $color);
		$stmt->execute();
		
		$row = 0;
		
		// tee midagi seni, kuni saame ab'st ühe rea andmeid
		while($stmt->fetch()){
			// seda siin sees tehakse nii mitu korda kuni on ridu
			echo $row." ".$number_plate."<br>";
			//$row = $row + 1;
			//$row += 1;
			$row++;
		}
		
		$stmt->close();
		$mysqli->close();
	}
	
	getCarData();
	
	
?>