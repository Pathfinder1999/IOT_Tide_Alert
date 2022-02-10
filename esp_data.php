<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id18000165_iot";
// REPLACE with Database user
$username = "id18000165_nguyen";
// REPLACE with Database user password
$password = "?sFi%}UpAW24uo6e";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "kjsjkhjdhfd";

$api_key= $sensor = $location = $value = "";

date_default_timezone_set('Asia/Ho_Chi_Minh');
$time_act = date('Y-m-d H:i:s'); // use actual date() format displayed in your table.

var_dump($_GET); // ***********Cap nhat them dong nay de phan hoi ve ESP8266

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if($api_key == $api_key_value) {
        $sensor = test_input($_GET["sensor"]);
        $location = test_input($_GET["location"]);
        $value = test_input($_GET["value"]);
        if($value<0){
            $value = 0;
        }
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO SensorData (sensor, location, value, time_act)
        VALUES ('" . $sensor . "', '" . $location . "', '" . $value . "', '" . $time_act . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if($value >= 60){
        $email_address = "hoangnguyen.1999lmht@gmail.com"; 
        $msg = "Mực nước hiện tại ở khu vực của bạn đang ở mức báo động!!\nHãy di chuyển đến khu vực cao hơn để giữ an toàn\nMực nước dâng so với bờ:".$value." cm\nVị trí: ".$location."\nThời điểm ghi nhận: ".$time_act."";
        mail($email_address, "[Thông báo] Cảnh báo mực nước từ ESP8266", $msg);
        }
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP GET.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}