<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
$hour= date('h');
$min= date('i');
$sec= date('s');
$data_command= get_command_data();
$max_id=max_data_id();
$data= get_data($max_id);
$result = array(
	//I00-07
	'I00'=>$data_command['I00'],
	'I01'=>$data_command['I01'],
	'I02'=>$data_command['I02'],
	'I03'=>$data_command['I03'],
	'I04'=>$data_command['I04'],
	'I05'=>$data_command['I05'],
	'I06'=>$data_command['I06'],
	'I07'=>$data_command['I07'],
	//I10-17
	'I10'=>$data_command['I10'], 
	'I11'=>$data_command['I11'],
	'I12'=>$data_command['I12'],
	'I13'=>$data_command['I13'],
	'I14'=>$data_command['I14'],
	'I15'=>$data_command['I15'],
	'I16'=>$data_command['I16'],
	'I17'=>$data_command['I17'],
	//I20-I27
	'I20'=>$data_command['I20'],
	'I21'=>$data_command['I21'],
	'I22'=>$data_command['I22'],
	'I23'=>$data_command['I23'],
	'I24'=>$data_command['I24'],
	'I25'=>$data_command['I25'],
	'I26'=>$data_command['I26'],
	'I27'=>$data_command['I27'],
	//inverter
	'direction'=>$data_command['direction'],
	't1'=>$data['t1'],
	't2'=>$data['t2'],
	't3'=>$data['t3'],

	'g1'=>$data['g1'],
	'g2'=>$data['g2'],
	'g3'=>$data['g3'],

	'h1'=>$data['h1'],
	'h2'=>$data['h2'],
	'h3'=>$data['h3'],
	'h4'=>$data['h4'],
	'h5'=>$data['h5'],
	'h6'=>$data['h6'],

	'hour'=> $hour,
	'mi'=> $min,
	'sec'=> $sec,
);
echo json_encode($result);