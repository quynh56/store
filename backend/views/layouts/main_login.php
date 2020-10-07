<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GDT-store</title>
    <base href="<?php echo $_SERVER['SCRIPT_NAME']?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <link rel="stylesheet" href="assets/css/login.css">
<!--    <link rel="stylesheet" href="assets/css/mystyle.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!--    <script-->
    <!--            src="https://code.jquery.com/jquery-3.3.1.js"-->
    <!--            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="-->
    <!--            crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <script src="assets/js/owl.carousel.min.js"></script>
    <style>
        .main-login{
            background-image: url("assets/images/bg.jpg");
        }
        @font-face {
            src: url("assets/fonts/QlassikBold_TB.ttf");
            font-family: QlassikBold;
        }
        @font-face {
            src: url("assets/fonts/Pacifico.ttf");
            font-family: Pacifico;
        }
        @font-face {
            src: url("assets/fonts/PlayfairDisplay-Regular.ttf");
            font-family: playfairdisplay;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="container">
            <div class="logo-login">
                <a href="home"><img src="../frontend/assets/images/logo-1.png" alt=""></a>
            </div>
        </div>
        <div>
            <?php
            if(!empty($this->error)):
                ?>
                <div class="alert alert-danger"><?php echo $this->error?></div>
            <?php endif;?>
            <?php
            if(isset($_SESSION['error'])):?>
                <div class="alert alert-danger"><?php echo $_SESSION['error'];
                    unset($_SESSION['error']);?></div>
            <?php endif;?>
            <?php
            if(isset($_SESSION['success'])):?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif;?>
        </div>
    </div>

   <div class="main main-login">
       <?php
       echo $this->content;
       ?>
   </div>
    <div class="footer footer-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-6 padd-1">
                    <div class="row">
                        <div class="col-md-4">
                            <h2 class="title">THÔNG TIN CỬA HÀNG</h2>
                            <div class="group-4">
                                <ul>
                                    <li><a href="">Giới Thiệu GDT-Store</a></li>
                                    <li><a href="">Chương Trình Affiliate</a></li>
                                    <li><a href="">Blog Thời Trang</a></li>
                                    <li><a href="">Chiết Khấu Cho SInh Viên</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2 class="title">HỖ TRỢ KHÁCH HÀNG</h2>
                            <div class="group-4">
                                <ul>
                                    <li><a href="">Phí Vận Chuyển</a></li>
                                    <li><a href="">Trả Lại</a></li>
                                    <li><a href="">Hướng Dẫn Đặt Hàng</a></li>
                                    <li><a href="">Làm Thế Nào Để Theo Dõi</a></li>
                                    <li><a href="">Hướng Dẫn Kích Thước</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2 class="title">DỊCH VỤ KHÁCH HÀNG</h2>
                            <div class="group-4">
                                <ul>
                                    <li><a href="">Liên Hệ Chúng Tôi</a></li>
                                    <li><a href="">Phương Thức Thanh Toán</a></li>
                                    <li><a href="">Điểm Thưởng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6 padd-2">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h2 class="title">KẾT NỐI VỚI CHÚNG TÔI</h2>
                            <div class="group-4 card-content">
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href=""><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="title">APP</h2>
                            <div class="group-4 app-content">
                                <ul>
                                    <li><a href=""><i class="fa fa-apple" aria-hidden="true"></i></a></li>
                                    <li> <a href=""><i class="fa fa-android" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pay-card">
                        <h2 class="title">CHÚNG TÔI CHẤP NHẬN</h2>
                        <div class="img-card">
                            <img src="assets/images/card-paypal.jfif">
                            <img src="assets/images/card-american.jfif">
                            <img src="assets/images/card-master.png">
                            <img src="assets/images/card-maestro.png">
                            <img src="assets/images/card-visa.jpg">
                            <img src="assets/images/card-bidv.png">
                            <img src="assets/images/card-jcb.jfif">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>