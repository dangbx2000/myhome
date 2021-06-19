<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "user";
//=========================================
$connect = new mysqli($server, $username, $password, $database);
        if ($connect ->connect_error) {
            die("Connection failded! :".$connect->connect_error);
        }
//=========================================
	function query($query) {
		global $server, $username, $password, $database;
		$connect = new mysqli($server, $username, $password, $database);
		if ($connect ->connect_error) {
			die("Connection failded! :".$connect->connect_error);
		}

		$ketqua = mysqli_query($connect, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($ketqua)){
			$rows[] = $row;
		}
		return $rows;
		if ($connect->query($sql) === TRUE) {
	            return "Send data successfully";
	        }
	        else {
	            return "Error: " . $sql . "<br>" . $connect->error;
	        }
	    $connect->close();
	}
//=============================================================================
	function updateOutput($id, $state) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "UPDATE outputs SET state='" . $state . "' WHERE id='". $id ."'";

       if ($connect->query($sql) === TRUE) {
            return "Output state updated successfully";
        }
        else {
            return "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();
    }

    function getAllOutputs() {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT id, name, board, gpio, state FROM outputs ORDER BY board";
        if ($result = $connect->query($sql)) {
            return $result;
        }
        else {
            return false;
        }
        $connect->close();
    }

    function getAllOutputStates($board) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT gpio, state FROM outputs WHERE board='" . $board . "'";
        if ($result = $connect->query($sql)) {
            return $result;
        }
        else {
            return false;
        }
        $connect->close();
    }
//=================================================================================================

function getTempset() {
        global $server, $username, $password, $database;
        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT tempset FROM setdata";
        if ($result = $connect->query($sql)) {
            return $result;
        }
        else {
            return false;
        }
        $connect->close();
}

function getHumdset() {
        global $server, $username, $password, $database;
        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT humdset FROM setdata";
        if ($result = $connect->query($sql)) {
            return $result;
        }
        else {
            return false;
        }
        $connect->close();
}


function updateTemp($tempset) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "UPDATE setdata SET tempset='" . $tempset . "'";

       if ($connect->query($sql) === TRUE) {
            return "Temp updated successfully";
        }
        else {
            return "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();
    }
function updateHumd($humdset) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "UPDATE setdata SET humdset='" . $humdset . "'";

       if ($connect->query($sql) === TRUE) {
            return "Humd updated successfully";
        }
        else {
            return "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();
    }