<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    header('Content-Type: application/json');
    require_once("database.php");
    $data = array();
    $week_day = date('Y-m-d');
    $sql = "SELECT time_act, value FROM SensorData WHERE MONTH(time_act) = MONTH('".$week_day."') ORDER BY time_act DESC";
    if ($result = $conn->query($sql)) {
        $chart_data = array(); //declare an array, not a string. This will become the outer array of the JSON.
        while($row = mysqli_fetch_array($result)) { 
          //add a new item to the array
          //each new item is an associative array with key-value pairs - this will become an object in the JSON
          $chart_data [] = array(
            "time_act" => $row["time_act"], 
            "value" => $row["value"] 
          ); 
        } 
      $json = json_encode($chart_data);  //encode the array into a valid JSON object
      echo $json; //output the JSON
    }


            // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
            //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
          
            // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
            //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
