<?php
	session_start();
	require_once("login.php");
	login();	
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">   
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="style_loginacount.css">
</head>
<body>
	  <div class="container">
	  	<form action="" method="POST">
	  		<h3>CREATE ACOUNT</h3>
	  		<div class="form-group"><br>
	  			<label for="username">User name:</label>
	  			<input type="text" class="font-control" name="username">
	  		</div>
	  		<div class="form-group">
	  			<label for="email">Email address:</label><br>
	  			<input type="email" class="font-control" name="email">
	  		</div>
	  		<div class="form-group">
	  			<label for="password">Password:</label><br>
	  			<input type="password" class="font-control" name="password">
	  		</div>
	  		<button type="submit" class="btn-defaut" id="btn-defaut1">Login</button>	
	  	</form>
	  </div>
</body>
</html>
 