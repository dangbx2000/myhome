<?php 

session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require_once 'connection.php';

$no = $_GET ["id"];

if ( delete_DB($no)> 0){
	echo "
	<script>
		alert('Đã xóa');
		document.location.href = 'index.php';
	</script>
		 ";

}	else {
	echo "
		<script>
			alert('Xóa không thành công');
			document.location.href = 'index.php';
		</script>
		 ";
}

 ?>