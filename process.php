<?php 
    require_once 'database.php';
?>
<?php 
        // ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
        if(isset($_POST)){
            $email      = $_POST['email'];
            $password   = sha1($_POST['passWord']);
            $name       = $_POST['fullName'];
            $phone      = $_POST['phoneNumber'];
            
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $result = $stmt->get_result();
            if($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo 'Email này đã dược sử dụng';
            }else{
                $stmt = $conn->prepare("INSERT INTO users (email, password, phone, name) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss",$email, $password, $phone, $name);
                $result = $stmt->execute();
                if($result){
                    echo '1';
                }else{
                    echo 'Dữ liệu nhập không hợp lệ';
            }
            }
            // echo '$email . "" . $password';
            
            $stmt->close();
        }
        else{
            echo 'No data';
        }
?>