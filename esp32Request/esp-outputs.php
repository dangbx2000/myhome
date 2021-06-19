<?php
    include_once('esp-database.php');

    // $result = getAllOutputs();
    // $html_buttons = null;
    // if ($result) {
    //     while ($row = $result->fetch_array()) {
    //         if ($row["state"] == "1"){
    //             $button_checked = "checked";
    //         }
    //         else {
    //             $button_checked = "";
    //         }
    //         $html_buttons .= '<h3>' . $row["name"] . '</h3><label class="switch"><input type="checkbox" onchange="updateOutput(this)" id="' . $row["id"] . '" ' . $button_checked . '><span class="slider"></span></label>';
    //     }
    // }

     // $result2 = getAllBoards();
     // $html_boards = null;
     // if ($result2) {
     //     $html_boards .= '<h3>Boards</h3>';
     //     while ($row = $result2->fetch_assoc()) {
     //         $row_reading_time = $row["last_request"];
     //         // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
     //         //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));

     //         // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
     //         $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 7 hours"));
     //         $html_boards .= '<p><strong>Board ' . $row["board"] . '</strong> - Last Request Time: '. $row_reading_time . '</p>';
     //     }
     // }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="esp-style.css">
        <title>Lò ấp trứng</title>
    </head>
<body>
    <h2>Lò ấp trứng thông minh</h2>
    <div id="char">
        <div>
            <h3>Nhiệt độ & độ ẩm</h3>
        </div>
    </div>
    <div id="control">
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
   
  <!-- <div><form onsubmit="return createOutput();">
        <h3>Create New Output</h3>
        <label for="outputName">Name</label>
        <input type="text" name="name" id="outputName"><br>
        <label for="outputBoard">Board ID</label>
        <input type="number" name="board" min="0" id="outputBoard">
        <label for="outputGpio">GPIO Number</label>
        <input type="number" name="gpio" min="0" id="outputGpio">
        <label for="outputState">Initial GPIO State</label>
        <select id="outputState" name="state">
          <option value="0">0 = OFF</option>
          <option value="1">1 = ON</option>
        </select>
        <input type="submit" value="Create Output">
        <p><strong>Note:</strong> in some devices, you might need to refresh the page to see your newly created buttons or to remove deleted buttons.</p>
    </form></div> -->

    <script>
        var xhttp = new XMLHttpRequest();
        
        function updateOutput(element) {
            if(element.checked){
                xhttp.open("GET", "esp-outputs-action.php?action=output_update&id="+element.id+"&state=1", true);
            }
            else {
                xhttp.open("GET", "esp-outputs-action.php?action=output_update&id="+element.id+"&state=0", true);
            }
            xhttp.send();
          //  myFunction();
        }
        // function myFunction() {
        //   setInterval(function(){ alert("Hello"); }, 3000);
        // }
        
        // function createOutput(element) {
        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "esp-outputs-action.php", true);

        //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        //     xhr.onreadystatechange = function() {
        //         if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        //             alert("Output created");
        //             setTimeout(function(){ window.location.reload(); });
        //         }
        //     }
        //     var outputName = document.getElementById("outputName").value;
        //     var outputBoard = document.getElementById("outputBoard").value;
        //     var outputGpio = document.getElementById("outputGpio").value;
        //     var outputState = document.getElementById("outputState").value;
        //     var httpRequestData = "action=output_create&name="+outputName+"&board="+outputBoard+"&gpio="+outputGpio+"&state="+outputState;
        //     xhr.send(httpRequestData);
        // }
    </script>
</body>
</html>
