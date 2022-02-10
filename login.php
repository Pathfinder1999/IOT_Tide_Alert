<?php
    if(session_id() === '')
        session_start();
    if(isset($_SESSION['userlogin'])){
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Đăng nhập | W-Tracker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet"/>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* dc */
    /* a:hover{background-color: yellow} */ 
    .nav-item a {color: whitesmoke;}
    .nav-item a:hover{background-color: yellow; color: black}
      label{color: black;
          font-weight: bold;
      }
      .container{
         height: 100vh;
      }
      .section{padding-top: 220px;}
    body{
        background: url(./img/song-sai-gon-o-nhiem-nang.jpg);
        background-size: 100% 100%;
      } 
  </style>
    
</head>
  <body>
    <div class="container">
      <!--<a class="btn btn-primary mt-3" href="index.php"> Trang chủ </a>-->
       <div class="section">
        <div class="bg-white">

         <div class="row">
            <div class="col-sm-4 offset-5">
              <a href="index.php" style="text-decoration:none"><h1 class="my-3 text-dark" style="font-weight:1000;">W-Tracker</h1></a>
            </div>
        </div>
        <hr class="mb-3">
        <form>
            <div class="form-group col-6 offset-3">
               <label for="myEmail">Email</label>
               <input type="email" class="form-control"
                  id="email" name="myEmail" placeholder="Email" required>
            </div>
            <div class="form-group col-6 offset-3">
               <label for="myPassword">Mật khẩu</label>
               <input type="password" class="form-control"
                  id="password" name="myPassword" placeholder="Password" required>
            </div>
         
         <div class="row d-flex justify-content-center">
            <input type="submit" class="btn btn-primary mb-2 mr-2" id="login" value="Đăng nhập">
         </div>
         <div class="row d-flex justify-content-center">
             <a id="forgotPsw" href=#><p class="text-secondary">Quên mật khẩu?</p></a>
        </div>
        <hr class="mb-3">
        <div class="row d-flex justify-content-center">
            <a href="registration.php"><p class="text-secondary" style="margin-top:40%">Tạo tài khoản mới</p></a>
        </div>
        </form>  
        </div>
      </div>   

    </div>
    <script type="text/javascript">
        $(function(){
            $('#login').click(function(e){
                
                var valid = this.form.checkValidity();
                if(valid){
                    
                    var email       = $('#email').val();
                    var password    = $('#password').val();
                    
                    e.preventDefault();
                    
                    $.ajax({
                       type: 'POST',
                       url: 'jslogin.php',
                       data: {email: email, passWord: password},
                       success: function(data){
                           if($.trim(data) === "1"){
                               Swal.fire({
                                 'title': 'THÀNH CÔNG',
                                 'icon': 'success',
                                 'text': 'Đăng nhập thành công, đang trở về trang chủ',
                                 'confirmButtonColor': '#3085d6',
                                 'confirmButtonText': 'Đồng ý'
                               })
                               setTimeout('window.location.href = "index.php"', 2000);
                           }else{
                               Swal.fire({
                                 'title': 'THẤT BẠI',
                                 'icon': 'error',
                                 'text': data,
                                 'confirmButtonColor': '#3085d6',
                                 'confirmButtonText': 'Đồng ý'
                               })
                           }
                           
                       },
                       error: function(data){
                           Swal.fire({
                             'title': 'THẤT BẠI',
                             'icon': 'error',
                             'text': 'Lỗi hệ thống',
                             'confirmButtonColor': '#3085d6',
                             'confirmButtonText': 'Đồng ý'
                           })
                       }
                    });
                    
                }
                else{

                }
                
            });
            
        });
        
        $(function(){
            $('#forgotPsw').click(function(e){
               alert("Vui lòng liên hệ tổng đài để được hỗ trợ lấy lại mật khẩu."); 
            });
        });
    </script>
</body>
</html>