<?php 

session_start();
// if (!isset($_SESSION["login"])){
// 	header("Location: login.php");
// 	exit;
// }

require 'connection.php';


$card = query("SELECT * FROM sensor");//the

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">   
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="indexstyle.css">
	<title>Home</title>
</head>
<body>

	<a href="logout.php" class="clogout">Logout</a>
	
	<center><h1 class="title">Data Sensor</h1></center>
	
	<table id="tbsensor">

	<tr>
		<th>No</th>
		<th>Date</th>
		<th>Volt</th>
		<th>Ampe</th>
		<th>Temp</th>
		<th>Humd</th>
		<th>Action</th>
	</tr>

<?php $i = 1; ?>	
<?php foreach ( $card as $data ) :{
}  ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $data["datenow"]; ?></td>
		<td><?= $data["quat"]; ?></td>
		<td><?= $data["den"]; ?></td>
		<td><?= $data["dongco"]; ?></td>
		<td><?= $data["temp"]; ?></td>
		<td><?= $data["humd"]; ?></td>
		<td>
			<a href="delete.php?id=<?= $data["id"]; ?>">Delete</a>
		</td>
	</tr>

<?php $i++;  ?>
<?php endforeach; ?>

</table>
<div>
	<button>Den</button>
	<button>Quat</button>
	<button>cua</button>
</div>
</body>
</html>
