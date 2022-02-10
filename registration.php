<?php 
    require_once 'database.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Đăng ký | W-Tracker</title>
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
      .section{padding-top: 100px;}
    body{
        background: url(./img/song-sai-gon-o-nhiem-nang.jpg);
        background-size: 100% 100%;
      } 
  </style>

</head>
  <body>
    
    <div class="container">
       <div class="section">
        <div class="bg-white">
        <form action="registration.php" method="POST">
            <div class="row">
                <div class="col-sm-4 offset-5">
                  <a href="index.php" style="text-decoration:none"><h1 class="my-3 text-dark" style="font-weight:1000;">W-Tracker</h1></a>
                </div>
                <hr class="mb-3">
            </div>
            <hr class="mb-3">
            <div class="form-group col-6 offset-3">
               <label for="email">Email</label>
               <input type="email" class="form-control"
                  id="email"  name="email" placeholder="user@gmail.com" required>
           </div>
            <div class="form-group col-6 offset-3">
              <label for="passWord">Mật khẩu</label>
              <input type="password" class="form-control"
                 id="passWord" name="passWord" placeholder="Enter password" required>
           </div>
           
           <div class="form-group col-6 offset-3">
            <label for="fullName">Họ tên</label>
            <input type="text" class="form-control"
               id="fullName" name="fullName" placeholder="Your name" required>
          </div>
         
          <div class="form-group col-6 offset-3">
          <label for="phoneNumber">Số điện thoại</label>
          <input type="text" class="form-control"
             id="phoneNumber" name="phoneNumber" placeholder="Phone number" required>
          </div>
          <div class="row d-flex justify-content-center">
                <input type="submit" class="btn btn-primary mb-2 mr-2" id="register" name="create" value="Đăng ký">
            </div>
            <hr class="mb-3">
            
            <div class="row d-flex justify-content-center">
                <p>Đã có tài khoản ?</p>
                <a href="login.php">Đăng nhập</a>
                
            </div>
        </form>  
        </div>
      </div>   

    </div>
    <script type="text/javascript">
        $(function(){
            $('#register').click(function(e){
                
                var valid = this.form.checkValidity();
                if(valid){
                    
                    var email       = $('#email').val();
                    var password    = $('#passWord').val();
                    var name        = $('#fullName').val();
                    var phone       = $('#phoneNumber').val();
                    
                    e.preventDefault();
                    
                    $.ajax({
                       type: 'POST',
                       url: 'process.php',
                       data: {email: email, passWord: password, fullName: name, phoneNumber: phone},
                       success: function(data){
                            if($.trim(data) === "1"){
                                Swal.fire({
                                 'title': 'THÀNH CÔNG',
                                 'icon': 'success',
                                 'text': 'Đăng ký thành công, bạn sẽ trở lại trang đăng nhập trong giây lát',
                                 'confirmButtonColor': '#3085d6',
                                 'confirmButtonText': 'Đồng ý'
                                })
                                setTimeout('window.location.href = "login.php"',2000);
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
    </script>
</body>
</html>