<?php 


$server = "localhost";
$username = "id16723080_root";
$password = "D@nggD@ngg1234";
$database = "id16723080_users";

$connect = mysqli_connect($server, $username, $password, $database);

function query($query){
	global $connect;
	$ketqua = mysqli_query($connect, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($ketqua)){
		$rows[] = $row;
	}
	return $rows;
}


function delete_DB($id){
	global $connect;
	mysqli_query($connect, "DELETE FROM sensor WHERE id = $id");

return mysqli_affected_rows($connect);
}

function add_DB($data){
	global $connect;
	$idcard = htmlspecialchars($data["idcard"]);
	$value  = htmlspecialchars($data["val"]);
	$now = new DateTime();
	$datenow = $now->format("d-m-Y s:i:H");
		$query = "INSERT INTO daya VALUES('','$datenow','$idcard', '$value')";

	mysqli_query($connect, $query); 

return mysqli_affected_rows($connect);
}

function change_DB($data){
	global $connect;

	$no = $data["no"];
	$idcard = htmlspecialchars($data["idcard"]);
	$value  = htmlspecialchars($data["val"]);

		$query = "UPDATE rfid SET  daya = '$idcard', val = '$value' WHERE no = $no ";

	mysqli_query($connect, $query); 

return mysqli_affected_rows($connect);
}

function register($data){
	global $connect;

	$username = strtolower(stripslashes( $data["username"]));
	$password = mysqli_real_escape_string($connect, $data["password"]);
	$password2 = mysqli_real_escape_string($connect, $data["password2"]);

 	$result = mysqli_query ($connect, "SELECT username FROM userdb WHERE username = '$username' ");
 	
 	if (mysqli_fetch_assoc ($result) ){
 		echo "
 		<script>
 			alert('Tên người dùng đã đăng ký');
 		</script>
 		";
 		return false;
 	}

	if ( $password !== $password2){
		echo "
		<script>
		alert('Mật không khớp')
		</script>
		";

		return false;
	} 

	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($connect, "INSERT INTO userdb VALUES('', '$username', '$password')");

	return mysqli_affected_rows($connect);
}


?>