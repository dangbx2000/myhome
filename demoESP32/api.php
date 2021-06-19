<?php 

require_once 'connection.php';
ini_set('date.timezone', 'Asia/Ho_Chi_Minh');

$now = new DateTime();

$datenow = $now->format("Y-m-d H:i:s");

        $quat     = $_POST['quat'];
        $den      = $_POST['den'];
        $dongco1  = $_POST['dongco1'];
        $dongco2  = $_POST['dongco2'];
        $temp     = $_POST['temp'];
        $humd     = $_POST['humd'];

         $query = "INSERT INTO sensor(volt,ampe,temp,humd,datenow) VALUES ('".$quat."','".$den."','".$temp."','".$humd."','".$datenow."')";
        mysqli_query($connect,$query);

        if ($connect->query($query) === TRUE) {
            echo json_encode("Ok");
        } else {
            echo "Error: " . $query . "<br>" . $connect->error;
        }

    $connect->close();
 ?>