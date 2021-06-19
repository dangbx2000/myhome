<?php
	function login()
	{

		if (!empty($_POST)) {
			$username = $_POST['username'];
			$email    = $_POST['email'];
			$password = $_POST['password'];

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
			$query  = "SELECT * FROM user_home WHERE USER_NAME='".$username."' AND EMAIL='".$email."' AND PASSWORD='".$password."'";
			$result = mysqli_query($connect,$query);
			$data   = array();
			while ($row = mysqli_fetch_array($result,1)) {
				$data[] = $row;
			}
			//dong ket noi
			$connect->close();
			if ($data != null && count($data) > 0) {
				header("Location: index.php");
			}

		}
	}