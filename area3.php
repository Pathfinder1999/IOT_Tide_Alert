<?php
    if(session_id() === '')
        session_start();

    // if(!isset($_SESSION['userlogin'])){
    //     header("Location: login.php");
    // }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("Location: area3.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Khu vực 3 | W-Tracker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="3600"> <!--reload page per 1h-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet"/>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style>
    /* dc */
    /* a:hover{background-color: yellow} */ 
    .nav-item a {color: whitesmoke;}
    .nav-item a:hover{background-color: orange; color: black}

    #div-center {
       height: 800px;
       background: url(https://media.moitruong.net.vn/2019/09/song-sai-gon-o-nhiem-nang.jpg);
       background-size: 100% 100%;
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
                        <a class="dropdown-item" style="color: black;" href="area3.php">Khu vực 3</a>
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
                            <a class="nav-link" href="area3.php?logout=true">ĐĂNG XUẤT</a>
                        <?php
                        }
                        ?>
                   </li>
                </ul>
             </nav>
        </div>
    </div>
    <div id="div-center" >
       <div class="bg-white container h-100">
           
           <h1 class="mt-3">Biểu đồ mực nước khu vực 3</h1>
           
            <figcaption>Biểu đồ theo giờ</figcaption>
            <div id="chart_today"></div>

            <figcaption>Biểu đồ theo tuần </figcaption>
            <div id="chart_this_week"></div>

            <figcaption>Biểu đồ theo tháng</figcaption>
            <div id="chart_this_month"></div>

            <figcaption>Biểu đồ từ trước đến nay</figcaption>
            <div id="chart_all"></div>
         
    </div>
      
   </div>
   <div id="dashboard" style="position: fixed; top: 185px; width: 20%; height: 150px; z-index: 5; font-weight: bold;">
       <h2>Tình trạng</h2>
       <div id="warninglevel"></div>
       <div id="status"></div>
       <div id="now"></div>
       <div id="previous"></div>
       
   </div>
  <!--<div class="container">-->
  <!-- <div class="footer-container">-->
  <!--    <h1 class="mt-3">Tại sao sử dụng W-Tracker?</h1>-->
  <!--    <div class="row">-->
  <!--      <div class="col-sm-3">-->
  <!--         <div class="row d-flex justify-content-center">-->
  <!--          <img src="./img/money.JPG" width="48px" height="48px">-->
  <!--         </div>-->
  <!--        <h5 class="text-center">Chi phí thấp</h5>-->
  <!--        <p class="text-center">W-Tracker mang mục tiêu phổ cập giải pháp nhằm khắc phục hậu quả lũ lụt gây ra.</p>-->
  <!--      </div>-->

  <!--      <div class="col-sm-3">-->
  <!--       <div class="row d-flex justify-content-center">-->
  <!--          <img src="./img/memorable.JPG" width="48px" height="48px">-->
  <!--       </div>-->
  <!--        <h5 class="text-center">Tính năng mở rộng</h5>-->
  <!--        <p class="text-center">Được xây dựng trên các giải pháp mã nguồn mở, W-Tracker mang khả năng nâng cấp tính năng linh động.</p>-->
  <!--      </div>-->

  <!--      <div class="col-sm-3">-->
  <!--       <div class="row d-flex justify-content-center">-->
  <!--          <img src="./img/quality.JPG" width="48px" height="48px">-->
  <!--       </div>-->
  <!--        <h5 class="text-center">Chất lượng là sự ưu tiên</h5>-->
  <!--        <p class="text-center">Chất lượng cao, sử dụng rộng rãi là điều W-Tracker luôn mong muốn mang lại cho người dùng.</p>-->
  <!--      </div>-->
        
  <!--      <div class="col-sm-3">-->
  <!--       <div class="row d-flex justify-content-center">-->
  <!--          <img src="./img/cup.JPG" width="48px" height="48px">-->
  <!--       </div>-->
  <!--        <h5 class="text-center">Tin cậy hàng đầu</h5>-->
  <!--        <p class="text-center">W-Tracker luôn mang lại sự hiệu quả trong quá trình sử dụng.</p>-->
  <!--      </div>-->
  <!--    </div>-->
  <!-- </div>-->

  <!--</div>-->
<script>
    $.ajax({
      url: "data.php",
      method: "POST", 
      datatype: "json",
      success: function(data) {
        Morris.Line({
          element: 'chart_all',
          data: data,
          xkey: 'time_act',
          ykeys: ['value'],
          labels: ['Level'],
          ymax: 300,
          ymin: 0,
          xLabels: 'day',
          xLabelAngle: 45,
          xLabelFormat: function (d) {
            var weekdays = new Array(7);
            weekdays[0] = "SUN";
            weekdays[1] = "MON";
            weekdays[2] = "TUE";
            weekdays[3] = "WED";
            weekdays[4] = "THU";
            weekdays[5] = "FRI";
            weekdays[6] = "SAT";
        
            return weekdays[d.getDay()] + '-' + 
                   ("0" + (d.getMonth() + 1)).slice(-2) + '-' + 
                   ("0" + (d.getDate())).slice(-2);
          },
          resize: true
        });
      }
    });
    
    //Current Week
    $.ajax({
      url: "data_current_week.php",
      method: "POST",
      datatype: "json",
      success: function(data) {
        Morris.Line({
          element: 'chart_this_week',
          data: data,
          xkey: 'time_act',
          ykeys: ['value'],
          labels: ['Level'],
          ymax: 300,
          ymin: 0,
          xLabels: 'day',
          xLabelAngle: 45,
          xLabelFormat: function (d) {
            var weekdays = new Array(7);
            weekdays[0] = "SUN";
            weekdays[1] = "MON";
            weekdays[2] = "TUE";
            weekdays[3] = "WED";
            weekdays[4] = "THU";
            weekdays[5] = "FRI";
            weekdays[6] = "SAT";
        
            return weekdays[d.getDay()] + '-' + 
                   ("0" + (d.getMonth() + 1)).slice(-2) + '-' + 
                   ("0" + (d.getDate())).slice(-2);
          },
          resize: true
        });
      }
    });
    //Current month
    $.ajax({
      url: "data_current_month.php",
      method: "POST",
      datatype: "json",
      success: function(data) {
        Morris.Line({
          element: 'chart_this_month',
          data: data,
          xkey: 'time_act',
          ykeys: ['value'],
          labels: ['Level'],
          ymax: 300,
          ymin: 0,
          xLabels: 'day',
          xLabelAngle: 45,
          xLabelFormat: function (d) {
            var weekdays = new Array(7);
            weekdays[0] = "SUN";
            weekdays[1] = "MON";
            weekdays[2] = "TUE";
            weekdays[3] = "WED";
            weekdays[4] = "THU";
            weekdays[5] = "FRI";
            weekdays[6] = "SAT";
        
            return weekdays[d.getDay()] + '-' + 
                   ("0" + (d.getMonth() + 1)).slice(-2) + '-' + 
                   ("0" + (d.getDate())).slice(-2);
          },
          resize: true
        });
      }
    });
    //Today
    $.ajax({
      url: "data_today.php",
      method: "POST", 
      datatype: "json",
      success: function(data) {
        Morris.Line({
          element: 'chart_today',
          data: data,
          xkey: 'time_act',
          ykeys: ['value'],
          labels: ['Level'],
          ymax: 300,
          ymin: 0,
          xLabels: 'day',
          xLabelAngle: 45,
          xLabelFormat: function (d) {
            var weekdays = new Array(7);
            weekdays[0] = "SUN";
            weekdays[1] = "MON";
            weekdays[2] = "TUE";
            weekdays[3] = "WED";
            weekdays[4] = "THU";
            weekdays[5] = "FRI";
            weekdays[6] = "SAT";
        
            return weekdays[d.getDay()] + '-' + 
                   ("0" + (d.getMonth() + 1)).slice(-2) + '-' + 
                   ("0" + (d.getDate())).slice(-2);
          },
          resize: true
        });
      }
    });
    //Status
    $.ajax({
      url: "status.php", 
      method: "POST",
      datatype: "json",
      success: function(data) {
          var lastestValue = data[0]['value'];
          var previousValue = data[1]['value'];
          
          lastestValue = Number(lastestValue);
          previousValue = Number(previousValue);
          
          if(lastestValue > previousValue){
              document.getElementById("status").innerHTML = "Mực nước đã tăng. (+"+(lastestValue-previousValue)+")";
          }else if(lastestValue < previousValue){
              document.getElementById("status").innerHTML = "Mực nước đã giảm. ("+(lastestValue-previousValue)+")";
              
          }else{
              document.getElementById("status").innerHTML = "Mực nước không đổi. (+0)";
          }
          document.getElementById("now").innerHTML = "Mực nước hiện tại: "+lastestValue;
          document.getElementById("previous").innerHTML = "Mực nước lần đo trước: "+previousValue;
            var warning='';
            var colorOutput = '';
          if(lastestValue <= 60){
            warning = "Cấp 1";
            colorOutput = "#0080FF";
          }else if(lastestValue <= 120){
            warning = "Cấp 2";
            colorOutput = "yellow";
          }else if(lastestValue <= 180){
            warning = "Cấp 3";
            colorOutput = "orange";
          }else if(lastestValue <= 240){
            warning = "Cấp 4";
            colorOutput = "red";
          }else{
            warning = "Cấp 5";
            colorOutput = "purple";
          }
          document.getElementById("warninglevel").innerHTML = "Cấp độ cảnh báo: "+warning;
           
           
         $('#dashboard').css('background',colorOutput); 
         
      }
    });
    </script>
</body>
</html>