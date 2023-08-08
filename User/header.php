<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./uploads/logo.jpg" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/css_bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/itemProduct.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>DOTESCO</title>
</head>
<body>
    <header>
        <div class="wrapper-info background_main">
            <div class="container info-company">
                <ul class="list-info-contact">
                    <li class="item-info-contact">
                        <i class='bx bx-location-plus'></i>
                        Số 02 Hoa Phượng, P. 2, Q. Phú Nhuận, TP. HCM
                    </li>
                    <li class="item-info-contact">
                        <i class='bx bx-phone'></i>
                        0357710941
                    </li>
                </ul>
                <ul class="list-info-contact-social">
                    <li class="item-info-contact-social">
                        <a href="" class="item-info-contact-social-link">
                            <i class='bx bxl-facebook-circle' ></i>
                        </a>
                    </li>
                    <li class="item-info-contact-social">
                        <a href="" class="item-info-contact-social-link">
                            <i class='bx bxl-twitter' ></i>
                        </a>
                    </li>
                    <li class="item-info-contact-social">
                        <a href="" class="item-info-contact-social-link">
                            <i class='bx bxl-instagram' ></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-login container">
            <div class="logo">
                <img class="logo__image" src="./uploads/logo.jpg" alt="Logo">
            </div>
            <div class="name-company">
                <h1>công ty TNHH Dịch Vụ Kỹ thuật DOTESCO</h1>
            </div>
            <div class="auth">
            <div class='wrapper-auth background_main'>
                <?php
                    if(isset($_SESSION["isLogin"]) && isset($_SESSION["roleLogin"]) &&$_SESSION["roleLogin"] == 0) {
                        echo "<span style='font-weight: 600;
                        text-align: center;
                        color: #fff;'>Xin chào ".$_SESSION["username"]."</span>
                        <a href='index.php?act=logout' class='btn sign-up'>Đăng xuất</a>";
                    } else {
                        echo "
                        <a href='index.php?act=login' class='btn login'>Đăng nhập</a>
                        <span class ='space'>/</span>
                        <a href='index.php?act=signup' class='btn sign-up'>Đăng kí</a>";
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="box-nav">
            <nav class="navbar navbar-expand-lg navbar-light background_main">
                <div class="container position-relative">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="." class="nav-link text-uppercase nav-item-link menu-item-link" aria-current="page">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a href="./index.php?act=introduction" class="nav-link text-uppercase nav-item-link menu-item-link" aria-current="page">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a href="./index.php?act=product" class="nav-link text-uppercase nav-item-link menu-item-link">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="./index.php?act=contact" class="nav-link text-uppercase nav-item-link menu-item-link">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <form class="search-in-mobile" action="index.php?act=search" method="post">
                        <input name="keyword" class="input-search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn-search" name="seach" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <main>