<?php
function register(){
	if (!empty($_POST)) {
		$fullname        = $_POST['fullname'];
		$username        = $_POST['username'];
		$email           = $_POST['email'];
		$phonenumber     = $_POST['phonenumber'];
		$password        = $_POST['password'];
		//tao ket noi den data base
		$connect = new mysqli("localhost","root","","users");
		// cho phep php luu tieng viet vao data base
		mysqli_set_charset($connect,"utf8");
		//kiem tra ket noi co thanh cong hay khong
		if ($connect->connect_error) {
			var_dump($connect->connect_error);
			die();
		}
		//truy van du lieu-insert vao data base
		$query = "INSERT INTO user_home(FULL_NAME,USER_NAME,EMAIL,PHONE_NUMBER,PASSWORD) VALUES ('".$fullname."','".$username."','".$email."','".$phonenumber."','".$password."')";
		mysqli_query($connect,$query);

		//dong ket noi
		$connect->close();
		header("Location: loginacount.php");
	}
}