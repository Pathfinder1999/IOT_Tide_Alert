<?php 
    require_once 'database.php';
?>
<?php 
        if(session_id() === '')
            session_start();
            
        // ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
        if(isset($_POST)){
            $email      = $_POST['email'];
            $password   = sha1($_POST['passWord']);
            
            // echo $email . " " . $password;
            $sql = "SELECT id, name FROM users WHERE email = ? AND password = ? LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$email,$password);
            $stmt->execute();
            
            $result = $stmt->get_result();
            // var_dump($result);
            if($row = $result->fetch_array(MYSQLI_ASSOC)){
                $_SESSION['userlogin'] = $row['id'];
                $_SESSION['username'] = $row['name'];
                echo '1';
            }else{
                echo 'Sai thông tin đăng nhập';
            }
            $stmt->free_result();
            $stmt->close();
        }else{
            echo 'No data';
        }
?>