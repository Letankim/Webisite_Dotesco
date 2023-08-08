<!DOCTYPE html>
    <head>
    <title>ADMIN - DOTESCO</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='keywords' content='Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design' />
    <script type='application/x-javascript'> addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel='stylesheet' href='./assets/css/bootstrap.min.css' >
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href='./assets/css/style.css' rel='stylesheet' type='text/css' />
    <link href='./assets/css/style-responsive.css' rel='stylesheet'/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel='stylesheet' href='./assets/css/font.css' type='text/css'/>
    <link href='./assets/css/font-awesome.css' rel='stylesheet'> 
    <!-- calendar -->
    <link rel='stylesheet' href='./assets/css/monthly.css'>
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src='./assets/js/jquery2.0.3.min.js'></script>
    <!-- <script src='./assets/js/raphael-min.js'></script>
    <script src='./assets/js/morris.js'></script> -->
    </head>
    <body>
    <section id='container'>
    <!--header start-->
    <header class='header fixed-top clearfix'>
    <!--logo start-->
    <div class='brand'>
        <a href='./index.php' class='logo'>
            DOTESCO
        </a>
        <div class='sidebar-toggle-box'>
            <div class='fa fa-bars'></div>
        </div>
    </div>
    <!--logo end-->
    <div class='top-nav clearfix'>
        <!--user info start-->
        <ul class='nav pull-right top-menu'>
            <!-- user login dropdown start-->
            <li class='dropdown'>
                <a data-toggle='dropdown' class='dropdown-toggle' href='#'>
                    <img alt='' src='./assets/images/default-avatar-profile.jpg'>
                    <span class='username'><?=$_SESSION['usernameAdmin']?></span>
                    <b class='caret'></b>
                </a>
                <ul class='dropdown-menu extended logout'>
                    <li><a href='#'><i class='fa fa-suitcase'></i>Profile</a></li>
                    <li><a href='login.html'><i class='fa fa-key'></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
    </header>
    <aside>
        <div id='sidebar' class='nav-collapse'>
            <!-- sidebar menu start-->
            <div class='leftside-navigation'>
                <ul class='sidebar-menu' id='nav-accordion'>
                    <li>
                        <a class='active' href='index.php'>
                            <i class='fa fa-dashboard'></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li><a href='index.php?page=introduction'>Giới thiệu về công ty</a></li>
                    <li><a href='index.php?page=banner'>Banner</a></li>
                    <li><a href='index.php?page=danhmuc'>Danh mục</a></li>
                    <li><a href='index.php?page=nguongoc'>Nguồn góc</a></li>
                    <li><a href='index.php?page=product'>Sản phẩm</a></li>
                    <li><a href='index.php?page=account'>Tất cả tài khoản</a></li>
                    <li><a href='index.php?page=logout'>Đăng xuất</a></li>
                </ul>            
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>