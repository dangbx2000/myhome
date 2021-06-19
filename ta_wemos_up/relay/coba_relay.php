
<?php
$status = "";
if ($_GET['relay']=="on") {
    $status = file_get_contents("http://www.komputronika.com/iot/simpan/rly1saya?relay=on");
}
if ($_GET['relay']=="off") {
    $status = file_get_contents("http://www.komputronika.com/iot/simpan/rly1saya?relay=off");
}
if (!empty($status)) {
    $response["status"] = $status;
    header('Content-Type: application/json');
    header("Cache-Control: no-cache, no-store, must-revalidate");
    print json_encode($response);
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kontrol IoT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
    <script>
    $(document).ready(function() //đảm bảo rằng trang đã sẵn sàng để chạy js
    {
        $("#f_on").click(function() //hàm jquery với tên bật
        {
            $.get("?relay=on", function(data, status)
            {
                $("#hasil").html("Menyalakan: "+data.status);
            });
        });
        $("#f_off").click(function() //hàm jquery với tên tắt
        {
            $.get("?relay=off", function(data, status){ //gửi get và nhận giá trị
                $("#hasil").html("Mematikan: "+data.status);
            });
        });
    });
    </script>
</head>
 
<body>
    <div class="container">
        <h1>Điều khiển relay bằng wifi</h1>
        <p>
            <a id="f_on" class="btn btn-primary btn-lg">On</a>
            <a id="f_off" class="btn btn-danger btn-lg">Off</a>
        </p>
        <p id="hasil"></p>
    </div>
</body>
</html>