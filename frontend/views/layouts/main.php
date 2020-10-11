<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <base href="<?php echo $_SERVER['SCRIPT_NAME']?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link rel="stylesheet" href="assets/theme.css">
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
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
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
        /*@media (min-width: 1200px){*/
        /**/
        /*}*/
        .main .women-banner .container, .container-slide{
            max-width: 1400px;
            margin:auto;
        }
        .nav>li>a:hover, .nav>li>a:active, .nav>li>a:focus {
            background: white;
        }
        .dropdown-menu{
            max-width:200px;
            box-shadow: 0 0 8px #777;
        }
        .proceed-checkout img{width: 100px}
        /*.size-intro label {*/
            /*margin: 0;*/
        /*}*/
        /*.size-intro input.title-size {*/
            /*width: 0;*/
            /*height: 0;*/
        /*}*/

    </style>

</head>
<body>
<div class="wrapper">
   <?php require_once "views/layouts/header.php"?>
    <div class="main">
        <?php
        if(isset($_SESSION['error'])){
            //hiển thị mảng theo key trong 1 chuỗi mà không cần nối chuỗi sử dụng ký tự {} bao lấy mảng
            echo"<div class='alert alert-danger'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }
        if(!empty($this->error)){
            echo"<div class='alert alert-danger'>$this->error</div>";
        }
        if(isset($_SESSION['success'])){
            echo"<div class='alert alert-success'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']);
        }
        ?>
        <?php
//        echo"<pre>";
//            print_r($_SESSION);
//        echo "</pre>";
        echo $this->content;
        ?>


        <!-- Latest Blog Section End -->
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 padd-1">
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
                <div class="col-md-6 padd-2">
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
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!--<script src="assets/js/bootstrap.min.js"></script>-->
<!--<script src="assets/js/jquery-ui.min.js"></script>-->
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.zoom.min.js"></script>
<script src="assets/js/jquery.dd.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/myscript.js" type="text/javascript"></script>

<!--<script src="assets/js/jquery-3.3.1.min.js"></script>-->

<script>
    // DETAIL
    // slide images
    var slideIndex =1;
    showSlide(slideIndex);
    function plusSlide(n){
        showSlide(slideIndex +=n);
    }
    function currentFunction(n){
        showSlide(slideIndex =n);
    }
    function showSlide(n){
        var slideImg =document.getElementsByClassName("slideImg");
        var dots = document.getElementsByClassName("opacityImg");
        var i;
        if(n > slideImg.length){slideIndex = 1}
        if(n < 1){slideIndex = slideImg.length}
        for(i=0;i<slideImg.length;i++){
            slideImg[i].style.display ="none";
        }
        for(i=0;i<dots.length;i++){
            dots[i].className = dots[i].className.replace(" active"," ");
        }
        slideImg[slideIndex-1].style.display="block";
        dots[slideIndex-1].className += " active";
    }
    var close =document.getElementsByClassName("close");
    var sizeGuideline =document.getElementById("sizeGuideline");
    var sizeTitle =document.getElementsByClassName("size-title")[0];
    var priceShip =document.getElementById("priceShip");
    var rule = document.getElementById("rule");

    sizeTitle.addEventListener("click", function () {
        sizeGuideline.style.display ="block";
    });

    //Close
    for(i=0;i<close.length;i++){
        close[i].addEventListener("click",function () {
            sizeGuideline.style.display="none";
            rule.style.display="none";
            priceShip.style.display="none";
        });
    }
    window.onclick=function (event) {
        if(event.target == sizeGuideline){
            sizeGuideline.style.display ="none";
        }
        if(event.target == priceShip){
            priceShip.style.display ="none";
        }
        if(event.target == rule){
            rule.style.display ="none";
        }
    };


    //SIZE
    // var btnsize =document.getElementsByClassName("btnsize");
    // var i;
    // for(i=0;i<btnsize.length;i++){
    //     btnsize[i].addEventListener("click", function () {
    //         var myTable = document.getElementsByClassName("myTable");
    //         var current =document.getElementsByClassName("active");
    //         for(i=0;i<myTable.length;i++){
    //             myTable[i].style.display ="none";
    //         }
    //         current[0].className =current[0].className.replace(" active", "");
    //         this.className += " active";
    //
    //     });
    // };

    //Vận chuyển và chính sách
    var productIntro =document.getElementsByClassName("product-intro-free");
    for(i=0;i<productIntro.length;i++){
        productIntro[i].addEventListener("click", function () {
            var wrapShip = this.nextElementSibling;
            if(wrapShip.style.display =="block"){
                wrapShip.style.display ="none";
            }else{
                wrapShip.style.display ="block";
            }
        });
    }


    //show kich thuoc va mieu ta
    var filterTitle =document.getElementsByClassName("filter-title");
    for (i=0;i<filterTitle.length;i++){
        filterTitle[i].addEventListener("click",function () {
            this.classList.toggle("active");
            var filterContent =this.nextElementSibling;
            if(filterContent.style.display == "block"){
                filterContent.style.display ="none";
            }else{
                filterContent.style.display ="block";

            }
        })
    }
    //Đo kích thước
    // c1
    function OpenSize(evt,sizeName){
        var btnsize =document.getElementsByClassName("btnsize2");
        var myTable =document.getElementsByClassName("myTable2");
        var i;
        for(i=0;i<myTable.length;i++){
            myTable[i].style.display ="none";
        }
        for(i=0;i<btnsize.length;i++){
            btnsize[i].className = btnsize[i].className.replace(" active"," ");
        }
        document.getElementById(sizeName).style.display ="block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen2").click();
    function OpenSizeMini(evt,sizeName){
        var btnsize =document.getElementsByClassName("btnsize1");
        var myTable =document.getElementsByClassName("myTable1");
        var i;
        for(i=0;i<myTable.length;i++){
            myTable[i].style.display ="none";
        }
        for(i=0;i<btnsize.length;i++){
            btnsize[i].className = btnsize[i].className.replace(" active"," ");
        }
        document.getElementById(sizeName).style.display ="block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();

    // var filterTitle,i;
    // filterTitle=document.getElementsByClassName("filter-title");
    // for(i=0;i<filterTitle.length;i++){
    //     filterTitle[i].addEventListener("click",function () {
    //
    //         this.classList.toggle("active");
    //         var filterOption = this.nextElementSibling;
    //         if(filterOption.style.display =="block"){
    //             filterOption.style.display ="none";
    //             // filterOption.style.opacity ="0";
    //         }else{
    //             // filterOption.style.maxHeight += filterOption.scrollHeight+ "px";
    //             filterOption.style.display ="block";
    //             // filterOption.style.opacity = "1";
    //         }
    //     })
    // }
</script>

</body>
</html>