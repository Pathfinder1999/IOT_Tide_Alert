<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(session_id() === '')
        session_start();

    // if(!isset($_SESSION['userlogin'])){
    //     header("Location: login.php");
    // }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("Location: index.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>W-Tracker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style>
    /* dc */
    /* a:hover{background-color: orange} */ 
    .nav-item a {color: whitesmoke;}
    .nav-item a:hover{background-color: orange; color: black}
    .img-cap{
        font-weight:Bold;
    }    
  </style>

</head>
  <body>
    <div class="container-fluid">
        <div class="row bg-dark">
            <div class="col-sm-4">
              <a href="index.php" style="text-decoration:none"><h1 class="my-3 text-warning" style="font-weight:1000">W-Tracker</h1></a>
            </div>
            <nav class="navbar navbar-expand-sm col-sm-8 justify-content-end">
                <ul class="navbar-nav">
                   <li class="nav-item">
                      <a class="nav-link navbar-brand" href="index.php">TRANG CHỦ</a>
                   </li>
                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                     DANH SÁCH KHU VỰC
                     </a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" style="color: black;" href="area1.php">Khu vực 1</a>
                        <a class="dropdown-item" style="color: black;" href="area2.php">Khu vực 2</a>
                        <a class="dropdown-item" style="color: black;" href="area3php">Khu vực 3</a>
                     </div>
                  </li>
                    <?php
                        if(isset($_SESSION['userlogin'])){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
                            </li>
                        <?php
                        }
                    ?>
                   <li class="nav-item">
                       <?php 
                       if(!isset($_SESSION['userlogin'])){ ?>
                           <a class="nav-link" href="login.php">ĐĂNG NHẬP</a> 
                        <?php
                        }else{ ?>
                            <a class="nav-link" href="index.php?logout=true">ĐĂNG XUẤT</a>
                        <?php
                        }
                        ?>
                       
                   </li>
                </ul>
             </nav>
        </div>
    </div>

    <div class="container-fluid">

      <h3 class="mb-3 text-warning col-12 text-center mt-3 img-cap">Chào mừng đến với W-Tracker</h3>
      <h4 class="col-12 text-center img-cap" style="color: black;">Hệ thống cảnh báo lũ lụt sớm</h4>

      
      <div id="myCarousel" class="carousel slide border" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100" style="height: 400px; width: 1600px; " src="https://mytokyoproperty.com/WordPress/wp-content/uploads/2019/08/filming01.png" alt="Leopard">
               <div class="carousel-caption d-none d-sm-block">
                  <h3 class="img-cap">Cảnh báo ngập do thuỷ triều tại các thành phố.</h3>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" style="height: 400px; width: 1600px;" src="https://www.turismo.ra.it/wp-content/uploads/2020/11/lamone_top.jpg" alt="Cat">
               <div class="carousel-caption d-none d-sm-block">
                  <h3 class="img-cap">Cảnh báo nước dâng tại các sông lũ lụt thường xuyên.</h3>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" style="height: 400px; width: 1600px;" src="https://thumbs.dreamstime.com/b/underground-parking-panorama-22597266.jpg" alt="Lion">
               <div class="carousel-caption d-none d-sm-block">
                  <h3 class="img-cap" style="margin-right: 10px;">Cảnh báo nước ngập gara.</h3>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
   </div>

  <div class="container-fluid">
   <div class="footer-container">
      <div class="row d-flex justify-content-center">
         <h1 class="mt-3 pb-1 text-center col-sm-3" >W-Tracker là gì?</h1>
      </div> 
      <div class="row d-flex justify-content-center" style="font-size:medium;">
 <!--       <div class="col-sm-3">-->
 <!--          <div class="row d-flex justify-content-center">-->
 <!--           <img src="https://cdn-icons-png.flaticon.com/512/1949/1949638.png" width="48px" height="48px">-->
 <!--          </div>-->
 <!--         <h5 class="text-center">Thông tin tổng quan</h5>-->
 <!--         <p class="text-center"><strong>Tên đề tài: </strong>Hệ thống IoT cảnh báo lũ lụt sớm-->
 <!--         </br><strong>Thành viên: </strong></br>- Dương Lê Doãn Đức</br>-->
 <!---Trịnh Hoàng Nguyên-->
 <!--        </p>-->
          
 <!--       </div>-->

        <div class="col-sm-3">
         <div class="row d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/512/921/921305.png" width="48px" height="48px">
         </div>
          <h5 class="text-center">Mục đích đề tài</h5>
          <p class="text-justity">Đề tài được thực hiện với mong muốn áp dụng các thế mạnh của hệ thống IoT trong việc cảnh báo sớm nhằm 
            phòng tránh những hậu quả do lũ lụt gây ra.
         </p>
        </div>

        <div class="col-sm-3">
         <div class="row d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/512/841/841743.png" width="48px" height="48px">
         </div>
          <h5 class="text-center">Ý tưởng</h5>
          <p class="text-justity">Hệ thống sử dụng mạch arduino thu thập dữ liệu mực nước, thông tin được lưu trữ và 
            xử lí dữ liệu bởi web server từ đó gửi cảnh báo phát thanh và email đến người dùng.</p>
        </div>
        
        <div class="col-sm-3">
         <div class="row d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/512/3094/3094843.png" width="48px" height="48px">
         </div>
          <h5 class="text-center">Định hướng phát triển</h5>
          <p class="text-justity">Bổ xung tích hợp các cảm biến ánh sáng, nhiệt độ, lương mưa, không khí để đánh giá chất lượng môi trường sống khu vực.</p>
        </div>
      </div>
   </div>
   <div class="row bg-dark d-flex justify-content-center">
         <h1 class="mt-3 pb-1 text-center bg-dark text-white col-sm-3" >Về chúng tôi</h1>
      </div> 
         <div class="row bg-dark d-flex justify-content-center text-white" style="font-size:medium;">
        <div class="col-sm-4">
           <div class="row d-flex justify-content-left">
            <img style="margin-left: 16px;" src="./img/nguyen.jpg" width="64px" height="64px">
            <h4 style="margin-left: 20px; margin-top: 12px;"><strong>Trịnh Hoàng Nguyên</strong></h4>
           </div>
          <p class="text-left">
            <strong>Email: hoangnguyen.1999lmht@gmail.com</strong>
            </br><strong>Điện thoại: (+84)039 3356 824</strong>
            </br><strong>Sinh viên khoa Công Nghệ Thông Tin - trường ĐH Công Nghiệp TPHCM</strong>
            </br><strong>Là một người có niềm đam mê với lập trình, mong muốn được học hỏi nhiều tri thức mới.  </strong>
         </p>
        </div>
        <div class="col-sm-4">
           <div class="row d-flex justify-content-left">
            <img style="margin-left: 16px;" src="./img/duc.jpg" width="64px" height="64px">
            <h4 style="margin-left: 20px; margin-top: 12px;"><strong>Dương Lê Doãn Đức</strong></h4>
           </div>
          <p class="text-left">
            <strong>Email: phanmem16789@gmail.com</strong>
            </br><strong>Điện thoại: (+84)098 5067 046</strong>
            </br><strong>Sinh viên khoa Công Nghệ Thông Tin - trường ĐH Công Nghiệp TPHCM</strong>
            </br><strong>Là một sinh viên công nghệ thông tin mong muốn được tích lũy nhiều hơn về kỹ năng và kinh nghiệm lập trình.</strong>
         </p>
        </div>
        </div>

  </div>

</body>
</html>