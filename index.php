<?php
    ob_start();
    session_start();
    $typeUser = 0;
    include_once "./config/config.php";
    include_once "./config/include.php";
    $categoryDao = new CategoryDao();
    $originDao = new OriginDao();
    $introductionDao = new IntroductionDao();
    $companyDao = new CompanyDao();
    $allCategoryActive = array();
    $allOriginActive = array();
    $categoryFooter = $categoryDao->getCategoryByNumber(6);
    $introduction = $introductionDao->getOne();
    $companyActive = $companyDao->getCompanyActive();   
    include_once "./User/header.php";
    $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_GET['act']) && $_GET['act']) {
        switch($_GET['act']) {
            case 'san-pham':
                include_once PATH_ROOT_USER."/controller/ProductController.php";
                $productController = new ProductController();
                $productController->userProduct();
                break;
            case 'san-pham-danh-muc':
                include_once PATH_ROOT_USER."/controller/CategoryController.php";
                $categoryController = new CategoryController();
                $categoryController->userProductCategory();
                break;
            case 'san-pham-nha-san-xuat':
                include_once PATH_ROOT_USER."/controller/OriginController.php";
                $originController = new OriginController();
                $originController->userProductOrigin();
                break;
            case 'tim-kiem':
                include_once PATH_ROOT_USER."/controller/ProductController.php";
                $productController = new ProductController();
                $productController->userSearchProduct();
                break;
            case 'chi-tiet-san-pham':
                include_once PATH_ROOT_USER."/controller/DetailProductController.php";
                $detailProductController = new DetailProductController();
                $detailProductController->userDetailProduct();
                break;
            case 'lien-he':
                include_once PATH_ROOT_USER."/controller/ContactController.php";
                $contactController = new ContactController();
                $contactController->userContact();
                break;
            case 'gui-tin-nhan':
            case 'gui-tin-nhan-san-pham':
                include_once PATH_ROOT_USER."/controller/ContactController.php";
                $contactController = new ContactController();
                $contactController->userSendMain();
                break;
            case 'gioi-thieu':
                include_once PATH_ROOT_USER."/controller/IntroductionController.php";
                $introductionController = new IntroductionController();
                $introductionController->userIntroduction();
                break;
            case 'dang-nhap':
                include_once PATH_ROOT_USER."/controller/AuthController.php";
                $authController = new AuthController();
                $authController->login();
                break;
            case 'dang-ki':
                include_once PATH_ROOT_USER."/controller/AuthController.php";
                $authController = new AuthController();
                $authController->signup();
                break;
            case 'quen-mat-khau':
                include_once PATH_ROOT_USER."/controller/AuthController.php";
                $authController = new AuthController();
                $authController->forget();
                break;
            case 'don-hang':
                include_once PATH_ROOT_USER."/controller/OrderController.php";
                $orderController = new OrderController();
                if(isset($_GET['isCart']) && $_GET['isCart'] == 'true') {
                    $orderController->orderByCart();
                } else if(isset($_GET['isCart']) && $_GET['isCart'] != 'true'){
                    header("Location: ?act=404");
                } else{
                    $orderController->orderBuyNow();
                }         
                break;
            case 'gio-hang':
                include_once PATH_ROOT_USER."/controller/CartController.php";
                $cartController = new CartController();
                $cartController->userCart();
                break;
            case 'them-gio-hang':
                include_once PATH_ROOT_USER."/controller/CartController.php";
                $cartController = new CartController();
                $cartController->addToCart();
                break;
            case 'deleteItemCart':
                include_once PATH_ROOT_USER."/controller/CartController.php";
                $cartController = new CartController();
                $cartController->deleteItemCart();
                break;
            case 'xoa-gio-hang':
                include_once PATH_ROOT_USER."/controller/CartController.php";
                $cartController = new CartController();
                $cartController->deleteAllCart();
                break;
            case 'xac-nhan-dat-hang':
                include_once PATH_ROOT_USER."/controller/OrderController.php";
                $orderController = new OrderController();
                $orderController->order();
                break;
            case "order-status-vnpay":
                include_once PATH_ROOT_USER."/controller/OrderController.php";
                $orderController = new OrderController();
                $orderController->orderNowWithVnPay();
                break;
            case "order-success":
                include_once PATH_ROOT_USER."/controller/OrderController.php";
                $orderController = new OrderController();
                $orderController->orderStatus("success");
                break;
            case "order-fail":
                include_once PATH_ROOT_USER."/controller/OrderController.php";
                $orderController = new OrderController();
                $orderController->orderStatus("fail");
                break;
            case 'ca-nhan':
                include_once PATH_ROOT_USER."/controller/PersonalController.php";
                $personalController  = new PersonalController();
                $personalController->userPersonal();
                break;
            case "xem-chi-tiet-don-hang":
                include_once PATH_ROOT_USER."/controller/PersonalController.php";
                $personalController  = new PersonalController();
                $personalController->detailBill();
                break;
            case "404":
                include_once PATH_ROOT_USER."/controller/ErrorController.php";
                $errorController = new ErrorController();
                $errorController->error404();
                break;
            case "dang-xuat":
                unset($_SESSION["isLogin"]);
                unset($_SESSION["username"]);
                unset($_SESSION["idUser"]);
                unset($_SESSION["emailUser"] );
                unset($_SESSION["roleLogin"]);
                header("Location: .");
                break;
            default:
                include_once PATH_ROOT_USER."/controller/HomeController.php";
                $homeController  = new HomeController();
                $homeController->userHome();
                break;
        }
    } else {
        include_once PATH_ROOT_USER."/controller/HomeController.php";
        $homeController  = new HomeController();
        $homeController->userHome();
    }
    include_once  PATH_ROOT_USER."/footer.php";
?>