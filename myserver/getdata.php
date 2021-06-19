<?php

if(!empty($_GET)){
	//nhiet do
	$t1=(int)$_GET['t1'];
	$t2=(int)$_GET['t2'];
	$t3=(int)$_GET['t3'];
	//cuong do sang
	$g1=(int)$_GET['g1'];
	$g2=(int)$_GET['g2'];
	$g3=(int)$_GET['g3'];
	//do am
	$h1=(int)$_GET['h1'];
	$h2=(int)$_GET['h2'];
	$h3=(int)$_GET['h3'];
	$h4=(int)$_GET['h4'];
	$h5=(int)$_GET['h5'];
	$h6=(int)$_GET['h6'];
	//vdk output
	$Q00=(int)$_GET['Q00'];
	$Q01=(int)$_GET['Q01'];
	$Q02=(int)$_GET['Q02'];
	$Q03=(int)$_GET['Q03'];
	$Q04=(int)$_GET['Q04'];
	$Q05=(int)$_GET['Q05'];
	$Q06=(int)$_GET['Q06'];
	$Q07=(int)$_GET['Q07'];

	$Q10=(int)$_GET['Q10'];
	$Q11=(int)$_GET['Q11'];
	$Q12=(int)$_GET['Q12'];
	$Q13=(int)$_GET['Q13'];
	$Q14=(int)$_GET['Q14'];
	$Q15=(int)$_GET['Q15'];
	$Q16=(int)$_GET['Q16'];
	$Q17=(int)$_GET['Q17'];


	//tao ket noi den data base
	$connect = new mysqli("localhost","root","","users");
	// cho phep php luu tieng viet vao data base
	mysqli_set_charset($connect,"utf8");
		//kiem tra ket noi co thanh cong hay khong
	if ($connect->connect_error) {
		var_dump($connect->connect_error);
		die();
	}
	$list_data= get_tbl_data();
	$data_number= count($list_data);
	if ($data_number>65535) {
		delete_tbl_data_content();
	}

	$query = "INSERT INTO tbl_data (t1, t2, t3, g1, g2, g3, h1, h2, h3, h4, h5, h6, Q00, Q01, Q02, Q03, Q04, Q05, Q06, Q07, Q10, Q11, Q12, Q13, Q14, Q15, Q16, Q17) VALUES ('".$t1."','".$t2."','".$t3."','".$g1."','".$g2."','".$g3."','".$h1."','".$h2."','".$h3."','".$h4."','".$h5."','".$h6."','".$Q00."','".$Q01."','".$Q02."','".$Q03."','".$Q04."','".$Q05."','".$Q06."','".$Q07."','".$Q10."','".$Q11."','".$Q12."','".$Q13."','".$Q14."','".$Q15."','".$Q16."','".$Q17."')";
	mysqli_query($connect, $query);
	if (mysqli_query($connect, $query)) {
		echo "Nhập dữ liệu thành công";
	}else{
		echo "Nhập dữ liệu không thành công" . mysql_error($connect);
	}
	$connect -> close();
}