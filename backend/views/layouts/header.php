<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

    <style>
        .menu-sidebar .logo{
            background:white;
        }
    </style>
</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="../frontend/index.php">
                        <img src="assets/images/icon/logo-2.png" alt="GDT.store" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="">
                        <a  href="index.php?controller=category&action=index">
                            <i class="fas fa-tachometer-alt"></i>Quản lý danh mục</a>
                    </li>
                    <li class="has-sub">
                        <a href="#" class="js-arrow">
                            <i class="fas fa-chart-bar"></i>Quản lý sản phẩm</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li><a href="index.php?controller=product&action=index">Sản phẩm</a></li>
                            <li>
                                <a href="index.php?controller=size&action=index">Size</a>
                            </li>
                            <li>
                                <a href="index.php?controller=color&action=index">Color</a>
                            </li>
                            <li>
                                <a href="index.php?controller=slide&action=index">slides</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="form.html">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Pages</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="forget-pass.html">Forget Password</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="../frontend/index.php">
                <img src="assets/images/icon/logo-2.png" alt="">
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="">
                        <a  href="index.php?controller=category&action=index">
                            <i class="fas fa-tachometer-alt"></i>Quản lý danh mục</a>
                    </li>
                    <li class="has-sub">
                        <a href="#" class="js-arrow">
                            <i class="fas fa-chart-bar"></i>Quản lý sản phẩm</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li><a href="index.php?controller=product&action=index">Sản phẩm</a></li>
                            <li>
                                <a href="index.php?controller=size&action=index">Size</a>
                            </li>
                            <li>
                                <a href="index.php?controller=color&action=index">Color</a>
                            </li>
                            <li>
                                <a href="index.php?controller=slide&action=index">slides</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="form.html">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Pages</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="forget-pass.html">Forget Password</a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </nav>
        </div>
    </aside>
