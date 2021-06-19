<?php

if (!empty($_GET)) {
	
	$temperature = $_GET["temperature"];
	$humidity = $_GET["humidity"]; 
	$settemp = $_GET["settemp"];
	$classic = $_GET["classic"];
	$nature = $_GET["nature"];
	$sea = $_GET["sea"];
	$exitmode = $_GET["exitmode"];
		$livingroom = $_GET["livingroom"];
	$bedroom = $_GET["bedroom"];
	$kitchen = $_GET["kitchen"];
	$gate = $_GET["gate"];
	$door = $_GET["door"];
	$window = $_GET["window"];
	//tao ket noi den data base
	$connect = new mysqli("localhost","root","","home");
	// cho phep php luu tieng viet vao data base
	mysqli_set_charset($connect,"utf8");
		//kiem tra ket noi co thanh cong hay khong
	if ($connect->connect_error) {
		var_dump($connect->connect_error);
		die();
	}

	$query = "INSERT INTO esp_data (temperature, humidity, settemp, classic, nature, sea, exitmode, livingroom, bedroom, kitchen, gate, door, window) VALUES ('".$temperature."', '".$humidity."', '".$settemp."', '".$classic."', '".$nature."', '".$sea."', '".$exitmode."', '".$livingroom."', '".$bedroom."', '".$kitchen."', '".$gate."', '".$door."', '".$window."')";
	$result = mysqli_query($connect,$query);
	//dong ket noi
	$connect->close();
	echo "Insertion Success!<br>";

}
		