<?php
	include "connect.php";
        if (!empty($_GET)){

        }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">   
    <link rel="stylesheet" href="styleIndex.css">
	<title>HaUI-Đồ án môn-Lò ấp trứng thông minh</title>
</head>
<body>
    <div class="header"><h2>HaUI-Đồ án môn-Lò ấp trứng thông minh</h2></div>
	<div class="setup">
        <button class="btn" id="autobtn">Auto</button>
        <button class="btn" id="manualbtn">Manual</button>
         <div id="manual">
            <h3>Điều khiển thiết bị</h3>
            <?php 
                $result = getAllOutputs();
                $html_buttons = null;
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row["state"] == "1"){
                            $button_checked = "checked";
                        }
                        else {
                            $button_checked = "";
                        }
                        $html_buttons .= '<h3>' . $row["name"] . '</h3><label class="switch"><input type="checkbox" onchange="updateOutput(this)" id="' . $row["id"] . '" ' . $button_checked . '><span class="slider"></span></label>';
                    }
                }
                echo $html_buttons;
            ?>
        </div>
        <div id="auto">
            
        </div>   
    </div>
    <h3>SETUP TEMP & HUMD</h3>
    <div class="container">
        <form action="setdata.php" method="GET">
            <div class="form-group"><br>
                <label for="">TEMP:</label>
                <input type="number" class="font-control" name="tempset" step="0.1">
            </div>
            <button type="submit" class="btn-defaut" id="" name="btntempset">OK</button>   
        </form>
      </div>
    <div class="container">
        <form action="setdata.php" method="GET">
            <div class="form-group"><br>
                <label for="">HUMD:</label>
                <input type="number" class="font-control" name="humdset" step="0.1">
            </div>
            <button type="submit" class="btn-defaut" id="" name="btnhumdset">OK</button>   
        </form>
      </div>
            <script>
        var xhttp = new XMLHttpRequest();
        function updateOutput(element) {
            if(element.checked){
                xhttp.open("GET", "action.php?action=output_update&id="+element.id+"&state=1", true);
            }
            else {
                xhttp.open("GET", "action.php?action=output_update&id="+element.id+"&state=0", true);
            }
            xhttp.send();
        }
    </script>
</body>
</html>
