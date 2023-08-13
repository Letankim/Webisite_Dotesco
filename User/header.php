<?php
    if(isset($_GET['act']) && isset($_GET['id']) && $_GET['act'] == "chi-tiet-san-pham" ) {
        include_once "./User/model/connect.php";
        include_once "./User/model/product.php";
        $titleProduct = getProductByID($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if(isset($titleProduct)) {
            echo "<meta property='og:image' content='https://letankim2003.000webhostapp.com/uploads/".$titleProduct['img']."'>
            <meta property='og:title' content='".$titleProduct['name']."' />
            <meta property='og:description' content='".$titleProduct['description']."' />
            ";
        }
    ?>
    <link rel="shortcut icon" href="./uploads/logo.jpg" type="image/x-icon">
    <base href="http://localhost/WebsiteThietBiFull/">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/css_bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/itemProduct.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>
        <?php
            if(isset($titleProduct)) {
                echo $titleProduct['name'];
            } else {
                echo "DOTESCO";
            }
        ?>
    </title>
    <!-- <script type='text/javascript'>
        document.onkeydown = function(event){
            if(event.keyCode==123){
                return false;
            }
            else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
                return false;  
            }
        };
        document.oncontextmenu = new Function("return false");
    </script> -->
</head>
<body>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="mJGCnQSm"></script>
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
                        <a href="https://www.facebook.com/profile.php?id=100029561799951" class="item-info-contact-social-link">
                            <i class='bx bxl-facebook-circle' ></i>
                        </a>
                    </li>
                    <li class="item-info-contact-social">
                        <a href="https://www.facebook.com/profile.php?id=100029561799951" class="item-info-contact-social-link">
                            <i class='bx bxl-twitter' ></i>
                        </a>
                    </li>
                    <li class="item-info-contact-social">
                        <a href="https://www.facebook.com/profile.php?id=100029561799951" class="item-info-contact-social-link">
                            <i class='bx bxl-instagram' ></i>
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
                <h1>công ty TNHH Dịch Vụ Kỹ thuật DOTESCO</h1>
            </div>
            <div class="auth">
            <div class='wrapper-auth background_main'>
                <?php
                    if(isset($_SESSION["isLogin"]) && isset($_SESSION["roleLogin"]) &&$_SESSION["roleLogin"] == 0) {
                        echo "<a href='ca-nhan' class='btn sign-up'><span style='font-weight: 600;
                        text-align: center;
                        color: #fff;'>Xin chào ".$_SESSION["username"]."</span></a>
                        <a href='dang-xuat' class='btn sign-up'>Đăng xuất</a>";
                    } else {
                        echo "
                        <a href='./dang-nhap' class='btn login'>Đăng nhập</a>
                        <span class ='space'>/</span>
                        <a href='./dang-ki' class='btn sign-up'>Đăng kí</a>";
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="box-nav">
            <nav class="navbar navbar-expand-lg navbar-light background_main">
                <div class="container position-relative">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="." class="nav-link text-uppercase nav-item-link menu-item-link" aria-current="page">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a href="./gioi-thieu" class="nav-link text-uppercase nav-item-link menu-item-link" aria-current="page">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a href="./san-pham" class="nav-link text-uppercase nav-item-link menu-item-link">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="./lien-he" class="nav-link text-uppercase nav-item-link menu-item-link">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <form class="search-in-mobile" action="./tim-kiem" method="post">
                        <input required name="keyword" class="input-search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn-search" name="seach" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <main>