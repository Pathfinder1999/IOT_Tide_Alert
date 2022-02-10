<?php
    header('Content-Type: application/json');
    require_once("database.php");
    $sql = "SELECT * FROM SensorData ORDER BY time_act DESC LIMIT 2 ";
    if ($result = $conn->query($sql)) {
        $data = array(); //declare an array, not a string. This will become the outer array of the JSON.
        while($row = mysqli_fetch_array($result)) { 
          //add a new item to the array
          //each new item is an associative array with key-value pairs - this will become an object in the JSON
          $data [] = array(
            "time_act" => $row["time_act"], 
            "value" => $row["value"] 
          ); 
        } 
      $json = json_encode($data);  //encode the array into a valid JSON object
      echo $json; //output the JSON
    }