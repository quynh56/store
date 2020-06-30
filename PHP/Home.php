<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <link rel="stylesheet" href="../css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!--    <script-->
    <!--            src="https://code.jquery.com/jquery-3.3.1.js"-->
    <!--            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="-->
    <!--            crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <script src="../js/owl.carousel.min.js"></script>
    <style type="text/css">
        .owl-theme .owl-nav [class*=owl-]{
            margin:0px;
            outline:none;
        }
        .owl-theme .owl-dots .owl-dot.active span,.owl-theme .owl-dots .owl-dot:hover span{
            background:#01C7D8;
            color:white;
        }
        .owl-theme .owl-nav [class*=owl-]:hover{
            background:#01C7D8;
            color:white;
        }
        .carousel-item img{height:600px;}
    </style>
</head>
<body>
<div class="wrapper">
    <?php require_once 'header.php'?>
    <div class="main">
        <div class="container">
            <div class="carousel slide" data-ride="carousel" id="myCarousel">
                <div class="carousel-inner">

                    <?php
                    $con =mysqli_connect('localhost','root','','gdt_store');
                    mysqli_query($con,'set names utf8');
                    $sql= "SELECT * FROM images  LIMIT 0,1";
                    $result = mysqli_query($con,$sql);
                    if(!$result){
                        die("khong thuc hien duoc". mysqli_error($con));
                        exit();
                    }
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="carousel-item active">
                            <a href="../Detail/detail.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['image']?>" alt="">
                            </a>
                        </div>
                        <?php
                    }

                    ?>
                    <?php
                    $con =mysqli_connect('localhost','root','','gdt_store');
                    mysqli_query($con,'set names utf8');
                    $sql= "SELECT  * FROM images  LIMIT 1,1";
                    $result = mysqli_query($con,$sql);
                    if(!$result){
                        die("khong thuc hien duoc". mysqli_error($con));
                        exit();
                    }
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="carousel-item">
                            <a href="../Detail/detail.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['image']?>" alt="">
                            </a>
                        </div>
                        <?php
                    }

                    ?>
                    <?php
                    $con =mysqli_connect('localhost','root','','gdt_store');
                    mysqli_query($con,'set names utf8');
                    $sql= "SELECT * FROM images  LIMIT 2,1";
                    $result = mysqli_query($con,$sql);
                    if(!$result){
                        die("khong thuc hien duoc". mysqli_error($con));
                        exit();
                    }
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="carousel-item">
                            <a href="../Detail/detail.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['image']?>" alt="">
                            </a>
                        </div>
                        <?php
                    }

                    ?>
                    <?php
                    $con =mysqli_connect('localhost','root','','gdt_store');
                    mysqli_query($con,'set names utf8');
                    $sql= "SELECT * FROM images  LIMIT 4,1";
                    $result = mysqli_query($con,$sql);
                    if(!$result){
                        die("khong thuc hien duoc". mysqli_error($con));
                        exit();
                    }
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="carousel-item">
                            <a href="../Detail/detail.php?id=<?php echo $row['id']?>">
                                <img src="<?php echo $row['image']?>" alt="">
                            </a>
                        </div>
                        <?php
                    }

                    ?>
                    <?php
                    $con =mysqli_connect('localhost','root','','gdt_store');
                    mysqli_query($con,'set names utf8');
                    $sql= "SELECT * FROM images  LIMIT 6,1";
                    $result = mysqli_query($con,$sql);
                    if(!$result){
                        die("khong thuc hien duoc". mysqli_error($con));
                        exit();
                    }
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="carousel-item">
                            <a href="../Detail/detail.php?id=<?php echo $row['id']?>" height="600px">
                                <img src="<?php echo $row['image']?>" alt="">
                            </a>
                        </div>
                        <?php
                    }

                    ?>
                    <a href="#myCarousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a href="#myCarousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <ol class="carousel-indicators" >
                    <li data-slide-to="0" data-target="#myCarousel" class="dot active"></li>
                    <li data-slide-to="1" data-target="#myCarousel" class="dot"></li>
                    <li data-slide-to="2" data-target="#myCarousel" class="dot"></li>
                    <li data-slide-to="3" data-target="#myCarousel" class="dot" ></li>
                    <li data-slide-to="4" data-target="#myCarousel" class="dot"></li>
                </ol>
            </div>
            <div class="new-item">
                <h2 class="title">New Item</h2>
                <div class="row">

                    <div class="col-md-4">
                        <div class="item-img">
                            <div class="positionImg">
                                <div class="show-img">
                                    <a href="../Detail/MiniSkirt-07.html">
                                        <img src="../images/chanvay-07.jpg" alt="" >
                                    </a>
                                </div>
                                <div class="img-hover">
                                    <a href="../Detail/MiniSkirt-07.html"><img src="../images/chanvay-07.1.jpg" alt=""></a>
                                </div>
                                <button class="text-cart"> Thêm vào giỏ hàng</button>
                            </div>
                            <a href="../Detail/MiniSkirt-07.html">
                                <div class="group-3">
                                    <p class="description">Chân váy họa tiết </p>
                                    <p class="price">270,000 đ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item-img">
                            <div class="positionImg">
                                <div class="show-img">
                                    <a href="#">
                                        <img src="../images/jacket-06.jpg" alt="" >
                                    </a>
                                </div>
                                <div class="img-hover">
                                    <a href="#"><img src="../images/jacket-06.1.jpg" alt=""></a>
                                </div>
                                <button class="text-cart">Thêm vào giỏ hàng</button>
                            </div>
                            <a href="#">
                                <div class="group-3">
                                    <p class="description">Áo dạ Hàn Quốc</p>
                                    <p class="price">550,000 đ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item-img">
                            <div class="positionImg">
                                <div class="show-img">
                                    <a href="#">
                                        <img src="../images/quan-08.jpg" alt="" >
                                    </a>
                                </div>
                                <div class="img-hover">
                                    <a href="#"><img src="../images/quan-08.2.jpg" alt=""></a>
                                </div>
                                <button class="text-cart">Thêm vào giỏ hàng</button>
                            </div>
                            <a href="#">
                                <div class="group-3">
                                    <p class="description">Quần thể thao</p>
                                    <p class="price">290,000 đ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="item-img">
                            <div class="positionImg">
                                <div class="show-img">
                                    <a href="#">
                                        <img src="../images/jacket-09.jpg" alt="" >
                                    </a>
                                </div>
                                <div class="img-hover">
                                    <a href="#"><img src="../images/jacket-09.1.jpg" alt=""></a>
                                </div>
                                <button class="text-cart">Thêm vào giỏ hàng</button>
                            </div>
                            <a href="#">
                                <div class="group-3">
                                    <p class="description">Áo khoác</p>
                                    <p class="price">570,000 đ</p>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item-img">
                            <div class="positionImg">
                                <div class="show-img">
                                    <a href="#">
                                        <img src="../images/chanvay-02.jpg" alt="" >
                                    </a>
                                </div>
                                <div class="img-hover">
                                    <a href="#"><img src="../images/chanvay-03.jpg" alt=""></a>
                                </div>
                                <button class="text-cart">Thêm vào giỏ hàng</button>
                            </div>
                            <a href="#">
                                <div class="group-3">
                                    <p class="description">Chân Váy dạ</p>
                                    <p class="price">290,000 đ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item-img">
                            <div class="positionImg">
                                <div class="show-img">
                                    <a href="#">
                                        <img src="../images/blazer-01.jpg" alt="" >
                                    </a>
                                </div>
                                <div class="img-hover">
                                    <a href="#"><img src="../images/blazer-01.3.jpg" alt=""></a>
                                </div>
                                <button class="text-cart">Thêm vào giỏ hàng</button>
                            </div>
                            <a href="#">
                                <div class="group-3">
                                    <p class="description">Blazer</p>
                                    <p class="price">650,000 đ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item-more">
                    <button type="button" class="btn-item-more btn-hidden" onclick="showNewItem()" id="hidden-btn">Xem Thêm</button>
                    <div id="more-newItem" class="new-item-more ">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="item-img">
                                    <div class="positionImg">
                                        <div class="show-img">
                                            <a href="#">
                                                <img src="../images/vay-03.jpg" alt="" >
                                            </a>
                                        </div>
                                        <div class="img-hover">
                                            <a href="#"><img src="../images/vay-03.jpg" alt=""></a>
                                        </div>
                                        <button class="text-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                    <a href="#">
                                        <div class="group-3">
                                            <p class="description">Dahlia Dress</p>
                                            <p class="price">500,000 đ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item-img">
                                    <div class="positionImg">
                                        <div class="show-img">
                                            <a href="#">
                                                <img src="../images/ao-09.jpg" alt="" >
                                            </a>
                                        </div>
                                        <div class="img-hover">
                                            <a href="#"><img src="../images/ao-09.1.jpg" alt=""></a>
                                        </div>
                                        <button class="text-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                    <a href="#">
                                        <div class="group-3">
                                            <p class="description">Áo phông</p>
                                            <p class="price">230,000 đ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item-img">
                                    <div class="positionImg">
                                        <div class="show-img">
                                            <a href="#">
                                                <img src="../images/vay-02.jpg" alt="" >
                                            </a>
                                        </div>
                                        <div class="img-hover">
                                            <a href="#"><img src="../images/vay-02.3.jpg" alt=""></a>
                                        </div>
                                        <button class="text-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                    <a href="#">
                                        <div class="group-3">
                                            <p class="description">Dress</p>
                                            <p class="price">470,000 đ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="item-img">
                                    <div class="positionImg">
                                        <div class="show-img">
                                            <a href="#">
                                                <img src="../images/jacket-07.jpg" alt="" >
                                            </a>
                                        </div>
                                        <div class="img-hover">
                                            <a href="#">
                                                <img src="../images/jacket-07.1.jpg" alt="">
                                            </a>
                                        </div>
                                        <button class="text-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                    <a href="#">
                                        <div class="group-3">
                                            <p class="description">Áo khoác bò</p>
                                            <p class="price">390,000 đ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item-img">
                                    <div class="positionImg">
                                        <div class="show-img">
                                            <a href="#">
                                                <img src="../images/quan-02.jpg" alt="" >
                                            </a>
                                        </div>
                                        <div class="img-hover">
                                            <a href="#"><img src="../images/quan-02.1.jpg" alt=""></a>
                                        </div>
                                        <button class="text-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                    <a href="#">
                                        <div class="group-3">
                                            <p class="description">Quần thể thao basic</p>
                                            <p class="price">230,000 đ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item-img">
                                    <div class="positionImg">
                                        <div class="show-img">
                                            <a href="#">
                                                <img src="../images/jacket-03.jpg" alt="" >
                                            </a>
                                        </div>
                                        <div class="img-hover">
                                            <a href="#"><img src="../images/jacket-03.1.jpg" alt=""></a>
                                        </div>
                                        <button class="text-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                    <a href="#">
                                        <div class="group-3">
                                            <p class="description">Áo khoác lông</p>
                                            <p class="price">800,000 đ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clothing">
                <h2 class="title">Clothing</h2>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="#">
                            <img src="../images/ao-05.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Áo sơ mi kẻ</p>
                                <p class="price">350,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/jacket-04.jpg" alt="" >
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Áo khoác </p>
                                <p class="price">450,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/jacket-05.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Áo khoác dạ</p>
                                <p class="price">550,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/quan-04.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Quần sooc</p>
                                <p class="price">350,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/vay-04.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Set váy</p>
                                <p class="price">650,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/blazer-02.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Blazer white</p>
                                <p class="price">550,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/vay-05.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Váy xuông</p>
                                <p class="price">270,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/jacket-08.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Áo khoác bò gile</p>
                                <p class="price">470,000 đ</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="../images/vay-11.jpg" alt="">
                        </a>
                        <a href="#">
                            <div class="group-3">
                                <p class="description">Váy len dáng xuông</p>
                                <p class="price">370,000 đ</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<!--            <div class="accessories">-->
<!--                <h2 class="title">Accessories</h2>-->
<!--                <div class="owl-carousel owl-theme">-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/tui-02.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Túi</p>-->
<!--                                <p class="price">370,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/boots-01.jpg" alt="" >-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Boots </p>-->
<!--                                <p class="price">550,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/mu-01.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Mũ</p>-->
<!--                                <p class="price">450,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/mu-04.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Mũ </p>-->
<!--                                <p class="price">270,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/khan-01.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Khăn </p>-->
<!--                                <p class="price">220,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/boots-02.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Boots</p>-->
<!--                                <p class="price">650,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/mu-02.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Mũ len</p>-->
<!--                                <p class="price">270,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/tui-01.png" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Túi mini</p>-->
<!--                                <p class="price">270,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item">-->
<!--                        <a href="#">-->
<!--                            <img src="images/mu-03.jpg" alt="">-->
<!--                        </a>-->
<!--                        <a href="#">-->
<!--                            <div class="group-3">-->
<!--                                <p class="description">Mũ </p>-->
<!--                                <p class="price">190,000 đ</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="form-signin" id=formLogin>
                <form action="" class="form-signin-content" onsubmit="return LoginFunction()" >
                    <div class="header-title clearfix">
                        <span class="close-right" id="close">&times;</span>
                        <h2 class="form-title">Login now</h2>
                    </div>
                    <div class="form-group clearfix">
                        <input type="email" class="form-control" name="email" id="LoginEmail" placeholder="Email hoặc Số Điện Thoại">
                        <span class="input-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="thongbao" id="tb-account"></span>
                    </div>
                    <div class="form-group clearfix">
                        <input type="password" name="pwd" class="form-control" id="LoginPwd" placeholder="Mật khẩu">
                        <span class="input-icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                        <span class="thongbao" id="tb-pwd"></span>
                    </div>
                    <div class="form-group form-check clearfix">
                        <div class="checkbox ">
                            <label class="form-check-label check-content">
                                <input type="checkbox" class="form-check-input" name="remember">
                                <span class="checkafter"></span>
                                Remember Me
                            </label>
                        </div>
                        <div class=" form-right ">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="form-group form-center">
                        <input type="submit" value="Đăng Nhập" class="btn btn-outline-primary" id="submitForm">
                    </div>
                    <div class="form-group loginForm-group">
                        <p class="align-items-center">To Register New Account →  <a href="Signup.html" class="loginbtn btn">Tạo tài khoản</a></p>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'?>
</div>

<script src="../js/myscript.js" type="text/javascript"></script>
<script type="text/javascript">
    function showNewItem(){
        var x =document.getElementById("hidden-btn");
        var y = document.getElementById("more-newItem");
        x.style.display="none";
        y.style.display ="block";
    }
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    item:1
                },
                600:{
                    item:3
                },
                1000:{
                    item:5
                }
            }
        });
    });
</script>

<!--<script>
    var slideIndex=1;
    showSlide(slideIndex);
    function plusSlides(n){
        showSlide(slideIndex += n);
    }
    function currentSlide(n){
        showSlide(slideIndex = n);
    }
    function showSlide(n){
        var slides,i,dots;
        slides = document.getElementsByClassName("slide-img");
        dots =document.getElementsByClassName("dot");
        if(n > slides.length){slideIndex=1}
        if(n < 1){
             slideIndex= slides.length ;
        }
        for(i=0; i < slides.length;i++){
            slides[i].style.display ="none";
        }
        for(i=0; i < dots.length; i++){
            dots[i].className = dots[i].className.replace(" active","");
        }
        slides[slideIndex-1].style.display ="block";
        dots[slideIndex-1].className += " active";
    }
</script>
-->
</body>
</html>