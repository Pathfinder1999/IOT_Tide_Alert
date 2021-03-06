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
                      <a class="nav-link navbar-brand" href="index.php">TRANG CH???</a>
                   </li>
                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                     DANH S??CH KHU V???C
                     </a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" style="color: black;" href="area1.php">Khu v???c 1</a>
                        <a class="dropdown-item" style="color: black;" href="area2.php">Khu v???c 2</a>
                        <a class="dropdown-item" style="color: black;" href="area3php">Khu v???c 3</a>
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
                           <a class="nav-link" href="login.php">????NG NH???P</a> 
                        <?php
                        }else{ ?>
                            <a class="nav-link" href="index.php?logout=true">????NG XU???T</a>
                        <?php
                        }
                        ?>
                       
                   </li>
                </ul>
             </nav>
        </div>
    </div>

    <div class="container-fluid">

      <h3 class="mb-3 text-warning col-12 text-center mt-3 img-cap">Ch??o m???ng ?????n v???i W-Tracker</h3>
      <h4 class="col-12 text-center img-cap" style="color: black;">H??? th???ng c???nh b??o l?? l???t s???m</h4>

      
      <div id="myCarousel" class="carousel slide border" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100" style="height: 400px; width: 1600px; " src="https://mytokyoproperty.com/WordPress/wp-content/uploads/2019/08/filming01.png" alt="Leopard">
               <div class="carousel-caption d-none d-sm-block">
                  <h3 class="img-cap">C???nh b??o ng???p do thu??? tri???u t???i c??c th??nh ph???.</h3>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" style="height: 400px; width: 1600px;" src="https://www.turismo.ra.it/wp-content/uploads/2020/11/lamone_top.jpg" alt="Cat">
               <div class="carousel-caption d-none d-sm-block">
                  <h3 class="img-cap">C???nh b??o n?????c d??ng t???i c??c s??ng l?? l???t th?????ng xuy??n.</h3>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" style="height: 400px; width: 1600px;" src="https://thumbs.dreamstime.com/b/underground-parking-panorama-22597266.jpg" alt="Lion">
               <div class="carousel-caption d-none d-sm-block">
                  <h3 class="img-cap" style="margin-right: 10px;">C???nh b??o n?????c ng???p gara.</h3>
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
         <h1 class="mt-3 pb-1 text-center col-sm-3" >W-Tracker l?? g???</h1>
      </div> 
      <div class="row d-flex justify-content-center" style="font-size:medium;">
 <!--       <div class="col-sm-3">-->
 <!--          <div class="row d-flex justify-content-center">-->
 <!--           <img src="https://cdn-icons-png.flaticon.com/512/1949/1949638.png" width="48px" height="48px">-->
 <!--          </div>-->
 <!--         <h5 class="text-center">Th??ng tin t???ng quan</h5>-->
 <!--         <p class="text-center"><strong>T??n ????? t??i: </strong>H??? th???ng IoT c???nh b??o l?? l???t s???m-->
 <!--         </br><strong>Th??nh vi??n: </strong></br>- D????ng L?? Do??n ?????c</br>-->
 <!---Tr???nh Ho??ng Nguy??n-->
 <!--        </p>-->
          
 <!--       </div>-->

        <div class="col-sm-3">
         <div class="row d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/512/921/921305.png" width="48px" height="48px">
         </div>
          <h5 class="text-center">M???c ????ch ????? t??i</h5>
          <p class="text-justity">????? t??i ???????c th???c hi???n v???i mong mu???n ??p d???ng c??c th??? m???nh c???a h??? th???ng IoT trong vi???c c???nh b??o s???m nh???m 
            ph??ng tr??nh nh???ng h???u qu??? do l?? l???t g??y ra.
         </p>
        </div>

        <div class="col-sm-3">
         <div class="row d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/512/841/841743.png" width="48px" height="48px">
         </div>
          <h5 class="text-center">?? t?????ng</h5>
          <p class="text-justity">H??? th???ng s??? d???ng m???ch arduino thu th???p d??? li???u m???c n?????c, th??ng tin ???????c l??u tr??? v?? 
            x??? l?? d??? li???u b???i web server t??? ???? g???i c???nh b??o ph??t thanh v?? email ?????n ng?????i d??ng.</p>
        </div>
        
        <div class="col-sm-3">
         <div class="row d-flex justify-content-center">
            <img src="https://cdn-icons-png.flaticon.com/512/3094/3094843.png" width="48px" height="48px">
         </div>
          <h5 class="text-center">?????nh h?????ng ph??t tri???n</h5>
          <p class="text-justity">B??? xung t??ch h???p c??c c???m bi???n ??nh s??ng, nhi???t ?????, l????ng m??a, kh??ng kh?? ????? ????nh gi?? ch???t l?????ng m??i tr?????ng s???ng khu v???c.</p>
        </div>
      </div>
   </div>
   <div class="row bg-dark d-flex justify-content-center">
         <h1 class="mt-3 pb-1 text-center bg-dark text-white col-sm-3" >V??? ch??ng t??i</h1>
      </div> 
         <div class="row bg-dark d-flex justify-content-center text-white" style="font-size:medium;">
        <div class="col-sm-4">
           <div class="row d-flex justify-content-left">
            <img style="margin-left: 16px;" src="./img/nguyen.jpg" width="64px" height="64px">
            <h4 style="margin-left: 20px; margin-top: 12px;"><strong>Tr???nh Ho??ng Nguy??n</strong></h4>
           </div>
          <p class="text-left">
            <strong>Email: hoangnguyen.1999lmht@gmail.com</strong>
            </br><strong>??i???n tho???i: (+84)039 3356 824</strong>
            </br><strong>Sinh vi??n khoa C??ng Ngh??? Th??ng Tin - tr?????ng ??H C??ng Nghi???p TPHCM</strong>
            </br><strong>L?? m???t ng?????i c?? ni???m ??am m?? v???i l???p tr??nh, mong mu???n ???????c h???c h???i nhi???u tri th???c m???i.  </strong>
         </p>
        </div>
        <div class="col-sm-4">
           <div class="row d-flex justify-content-left">
            <img style="margin-left: 16px;" src="./img/duc.jpg" width="64px" height="64px">
            <h4 style="margin-left: 20px; margin-top: 12px;"><strong>D????ng L?? Do??n ?????c</strong></h4>
           </div>
          <p class="text-left">
            <strong>Email: phanmem16789@gmail.com</strong>
            </br><strong>??i???n tho???i: (+84)098 5067 046</strong>
            </br><strong>Sinh vi??n khoa C??ng Ngh??? Th??ng Tin - tr?????ng ??H C??ng Nghi???p TPHCM</strong>
            </br><strong>L?? m???t sinh vi??n c??ng ngh??? th??ng tin mong mu???n ???????c t??ch l??y nhi???u h??n v??? k??? n??ng v?? kinh nghi???m l???p tr??nh.</strong>
         </p>
        </div>
        </div>

  </div>

</body>
</html>