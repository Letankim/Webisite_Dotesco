<?php
    if(isset($_GET['act']) && isset($_GET['id']) && $_GET['act'] == "chi-tiet-san-pham" ) {
        include_once PATH_ROOT_USER."/DAO/ProductDao.php";
        $productDao  = new ProductDao();
        $titleProduct = $productDao->getOneByID($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if(isset($titleProduct)) {
            echo '<meta name="keywords" content="'.$titleProduct->getName().', Dotesco, Công ty công nghệ">
            <meta property="og:image" content="https://dotesco.com/uploads/'.$titleProduct->getImg().'">
            <meta property="og:title" content="'.$titleProduct->getName().'" />
            <meta property="og:description" content="'.$titleProduct->getName().'" />
            <meta property="og:url" content="https://dotesco.com/?act=chi-tiet-san-pham&id='.$titleProduct->getId().'"/>
            ';
        } else {
            echo '<meta name="keywords" content="Dotesco, Công ty công nghệ, TNHH dịch vụ kĩ thuật, dụng cụ kĩ thuật">
            <meta property="og:title" content="Công ty TNHH dịch vụ kĩ thuật Dotesco, Dotesco, dụng cụ kĩ thuật" />
            <meta property="og:description" content="Công ty TNHH dịch vụ kĩ thuật Dotesco là công ty chuyên cung cấp các vật dụng kĩ thuật trong các lĩnh vực" />
            <meta property="og:url" content="https://dotesco.com/"/>
            <meta property="og:image" content="https://dotesco.com/uploads/logo.jpg">
            ';
        }
    ?>
    <link rel="shortcut icon" href="./uploads/logo.jpg" type="image/x-icon">
    <base href="http://localhost/WebsiteThietBiFullThongKe/">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/form.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/itemProduct.css">
    <link rel="stylesheet" href="./assets/css/order.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>
        <?php
            if(isset($titleProduct)) {
                echo $titleProduct->getName();
            } else {
                echo "DOTESCO";
            }
        ?>
    </title>
</head>
<body>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="mJGCnQSm"></script>
    <header>
        <?php
            $nameCompany = "";
            $address = "";
            $phone = "";
            $email = "";
            if($companyActive != null) {
                $nameCompany = $companyActive->getName();
                $address = $companyActive->getAddress();
                $phone = $companyActive->getPhone();
                $email = $companyActive->getEmail();
            }
        ?>
        <div class="wrapper-info background_main">
            <div class="container info-company">
                <ul class="list-info-contact">
                    <li class="item-info-contact">
                        <i class='bx bx-location-plus'></i>
                        <?=$address?>
                    </li>
                    <li class="item-info-contact">
                        <i class='bx bx-phone'></i>
                        <a style='text-decoration: none; color: #fff;' href="tel:<?=$phone?>"><?=$phone?></a>
                    </li>
                </ul>
                <ul class="list-info-contact-social">
                    <li class="item-info-contact-social">
                        <a href="./?act=gio-hang" class="item-info-contact-social-link cart-link">
                            <?php
                                $numberOfCart = 0;
                                $allCartSaved = isset($_SESSION['cart']) ? $_SESSION['cart'] : '';
                                if(is_string($allCartSaved)) {
                                    $allCartSaved = unserialize($allCartSaved);
                                } else {
                                    $allCartSaved = [];
                                }
                                $numberOfCart = is_array($allCartSaved) ? sizeof($allCartSaved): 0;
                            ?>
                            <span class = "pop-up-cart"><?=$numberOfCart?></span>
                            Giỏ hàng
                        </a>
                    </li>
                    <li class="item-info-contact-social">
                        <a href="https://www.facebook.com/profile.php?id=100029561799951" class="item-info-contact-social-link">
                            <img class = "item-info-contact-social-icon" src="./uploads/icon-zalo.png" alt="zalo">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-login container">
            <div class="logo">
                <a href=".">
                    <img class="logo__image" src="./uploads/logo.jpg" alt="Logo">
                </a>
            </div>
            <div class="name-company">
                <h1><?=$nameCompany?></h1>
                <h2><?=$address?></h2>
                <h3><?=$email?></h3>
                <h3><?=$phone?></h3>
            </div>
            <div class="auth">
            <div class='wrapper-auth background_main'>
                <?php
                    if(isset($_SESSION["isLogin"]) && isset($_SESSION["roleLogin"]) &&$_SESSION["roleLogin"] == 0) {
                ?>
                        <a href="./?act=ca-nhan" class="btn sign-up">
                            <span style="font-weight: 600;
                                text-align: center;
                                color: #fff;">
                                <?=$_SESSION["username"]?>
                            </span>
                        </a>
                        <a href="./?act=dang-xuat" class="btn sign-up">
                            Đăng xuất
                        </a>
                <?php
                    } else {
                    ?>
                        <a href="./?act=dang-nhap" class="btn login">Đăng nhập</a>
                        <span class ="space">/</span>
                        <a href="./?act=dang-ki" class="btn sign-up">Đăng kí</a>
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="box-nav">
            <nav class="navbar navbar-expand-lg navbar-light background_main">
                <div class="container position-relative">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="." class="nav-link text-uppercase nav-item-link menu-item-link" aria-current="page">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a href="./?act=gioi-thieu" class="nav-link text-uppercase nav-item-link menu-item-link" aria-current="page">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a href="./?act=san-pham" class="nav-link text-uppercase nav-item-link menu-item-link">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="./?act=lien-he" class="nav-link text-uppercase nav-item-link menu-item-link">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <form class="search-in-mobile" action="./?act=tim-kiem" method="post">
                        <input required name="keyword" class="input-search" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn-search" name="seach" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
<main>
<script>    
    const changeImgToDefault = (item) => {
        let srcRoot = item.src;
        var fixedPart = srcRoot.substring(0, srcRoot.lastIndexOf('/') + 1);
        item.src = (fixedPart  + "base/image-load.png");
    }
</script>