<?php
    session_start();
    ob_start();
    if(isset($_SESSION['roleAdmin']) && $_SESSION['roleAdmin'] == 1 && $_SESSION['isAdminLogin']) {
        include_once "./config/include.php";
        include_once "../lib/Time.php";
        if((isset($_GET['page']) && $_GET['page'] != 'print-bill') || !isset($_GET['page'])) {
            include_once PATH_ROOT_ADMIN."/view/header.php";
        }
        if(isset($_GET['page']) &&  $_GET['page']) {
            switch($_GET['page']) {
                case 'company':
                    require_once PATH_ROOT_ADMIN."/controller/CompanyController.php";
                    $companyController = new CompanyController();
                    $companyController->adminCompany();
                    break;
                case 'add-company':
                    if(isset($_POST['add-new'])) {
                        require_once PATH_ROOT_ADMIN."/controller/CompanyController.php";
                        $companyController = new CompanyController();
                        $companyController->adminAddNew();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'update-company':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/CompanyController.php";
                        $companyController = new CompanyController();
                        $companyController->adminFormUpdate();
                    }else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'updated-company':
                    if(isset($_POST['update'])) {
                        require_once PATH_ROOT_ADMIN."/controller/CompanyController.php";
                        $companyController = new CompanyController();
                        $companyController->adminUpdate();
                    } else {
                        header("Location: index.php?page=404");
                    }
                    break;
                case 'delete-company':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/CompanyController.php";
                        $companyController = new CompanyController();
                        $companyController->adminDelete();
                    }
                    break;
                case 'introduction':
                    require_once PATH_ROOT_ADMIN."/controller/IntroductionController.php";
                    $introductionController = new IntroductionController();
                    $introductionController->adminIntroduction();
                    break;
                case 'add-introduction':
                    if(isset($_POST['add-introduction'])) {
                        require_once PATH_ROOT_ADMIN."/controller/IntroductionController.php";
                        $introductionController = new IntroductionController();
                        $introductionController->adminAddNew();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'update-introduction':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/IntroductionController.php";
                        $introductionController = new IntroductionController();
                        $introductionController->adminFormUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'updated-introduction':
                    if(isset($_POST['update-introduction'])) {
                        require_once PATH_ROOT_ADMIN."/controller/IntroductionController.php";
                        $introductionController = new IntroductionController();
                        $introductionController->adminUpdate();
                    }else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'delete-introduction':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/IntroductionController.php";
                        $introductionController = new IntroductionController();
                        $introductionController->adminDelete();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'replyEmail':
                    require_once PATH_ROOT_ADMIN."/controller/EmailController.php";
                    $emailController = new EmailController();
                    $emailController->adminEmail();
                    break;
                case 'add-email':
                    if(isset($_POST['add-email'])) {
                        require_once PATH_ROOT_ADMIN."/controller/EmailController.php";
                        $emailController = new EmailController();
                        $emailController->adminAddNew();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'update-reply-email':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/EmailController.php";
                        $emailController = new EmailController();
                        $emailController->adminFormUpdate(); 
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'updated-email':
                    if(isset($_POST['update-email'])) {
                        require_once PATH_ROOT_ADMIN."/controller/EmailController.php";
                        $emailController = new EmailController();
                        $emailController->adminUpdate(); 
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'delete-reply-email':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/EmailController.php";
                        $emailController = new EmailController();
                        $emailController->adminDelete(); 
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'ordered':
                    require_once PATH_ROOT_ADMIN."/controller/BillController.php";
                    $billController = new BillController();
                    $billController->adminBill(); 
                    break;
                case 'detail-bill':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/BillController.php";
                        $billController = new BillController();
                        $billController->adminBillDetail(); 
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'update-status-bill':
                    if(isset($_POST['update-status-bill'])) {
                        require_once PATH_ROOT_ADMIN."/controller/BillController.php";
                        $billController = new BillController();
                        $billController->adminUpdateStatus(); 
                    } else {
                        header("Location: index.php?page=404");
                    }
                    break;
                case 'print-bill':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/BillController.php";
                        $billController = new BillController();
                        $billController->adminPrintBill(); 
                    } else {
                        header("Location: index.php?page=404");
                    }
                    break;
                case 'delete-bill':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/BillController.php";
                        $billController = new BillController();
                        $billController->adminDelete(); 
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'category':
                    require_once PATH_ROOT_ADMIN."/controller/CategoryController.php";
                    $categoryController = new CategoryController();
                    $categoryController->adminCategory();
                    break;
                case 'add-category': 
                    if(isset($_POST['add-category'])) {
                        require_once PATH_ROOT_ADMIN."/controller/CategoryController.php";
                        $categoryController = new CategoryController();
                        $categoryController->adminAddNew();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'update-category':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/CategoryController.php";
                        $categoryController = new CategoryController();
                        $categoryController->adminFormUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'updated-category':
                    if(isset($_POST['update-category'])) {
                        require_once PATH_ROOT_ADMIN."/controller/CategoryController.php";
                        $categoryController = new CategoryController();
                        $categoryController->adminUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'delete-category':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/CategoryController.php";
                        $categoryController = new CategoryController();
                        $categoryController->adminDelete();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'origin':
                    require_once PATH_ROOT_ADMIN."/controller/OriginController.php";
                    $originController = new OriginController();
                    $originController->adminOrigin();
                    break;
                case 'add-origin':
                    if(isset($_POST['add-origin'])) {
                        require_once PATH_ROOT_ADMIN."/controller/OriginController.php";
                        $originController = new OriginController();
                        $originController->adminAddNew();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'update-origin':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/OriginController.php";
                        $originController = new OriginController();
                        $originController->adminFormUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'updated-origin':
                    if(isset($_POST['update-origin'])) {
                        require_once PATH_ROOT_ADMIN."/controller/OriginController.php";
                        $originController = new OriginController();
                        $originController->adminUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'delete-origin':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/OriginController.php";
                        $originController = new OriginController();
                        $originController->adminDelete();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'product':
                    require_once PATH_ROOT_ADMIN."/controller/ProductController.php";
                    $productController = new ProductController();
                    $productController->adminProduct();
                    break;
                case 'add-product':
                    if(isset($_POST['add-product'])) {
                        require_once PATH_ROOT_ADMIN."/controller/ProductController.php";
                        $productController = new ProductController();
                        $productController->adminAddNew();
                    } else {
                        header("Location: ?page=404");
                    }
                    header("Location: index.php?page=product");
                    break;
                case 'delete-product':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/ProductController.php";
                        $productController = new ProductController();
                        $productController->adminDelete();
                    } else {
                        header("Location: index.php?page=404");
                    }
                    break;
                case 'update-product':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/ProductController.php";
                        $productController = new ProductController();
                        $productController->adminFormUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'updated-product':
                    if(isset($_POST['update-product'])) {
                        require_once PATH_ROOT_ADMIN."/controller/ProductController.php";
                        $productController = new ProductController();
                        $productController->adminUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'detail-product':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/ProductController.php";
                        $productController = new ProductController();
                        $productController->adminDetailProduct();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'account':
                    require_once PATH_ROOT_ADMIN."/controller/AccountController.php";
                    $accountController = new AccountController();
                    $accountController->adminAccount();
                    break;
                case 'add-account':
                    if(isset($_POST['add-account'])) {
                        require_once PATH_ROOT_ADMIN."/controller/AccountController.php";
                        $accountController = new AccountController();
                        $accountController->adminAddNew();
                    } else {
                        header("Location: index.php?page=404");
                    }
                    break;
                case "update-account":
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/AccountController.php";
                        $accountController = new AccountController();
                        $accountController->adminFormUpdate();
                    } else {
                        header("Location: index.php?page=404");
                    }
                    break;
                case 'updated-account':
                    if(isset($_POST['update-account'])) {
                        require_once PATH_ROOT_ADMIN."/controller/AccountController.php";
                        $accountController = new AccountController();
                        $accountController->adminUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'delete-account':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/AccountController.php";
                        $accountController = new AccountController();
                        $accountController->adminDelete();
                    } else {
                        header("Location:  ?page=404");
                    }
                    break;
                case "personal":
                    require_once PATH_ROOT_ADMIN."/controller/PersonalController.php";
                    $personalController = new PersonalController();
                    $personalController->adminPersonal();
                    break;
                case "updated-personal":
                    if(isset($_POST['update-personal'])) {
                        require_once PATH_ROOT_ADMIN."/controller/PersonalController.php";
                        $personalController = new PersonalController();
                        $personalController->adminUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'banner':
                    require_once PATH_ROOT_ADMIN."/controller/BannerController.php";
                    $bannerController = new BannerController();
                    $bannerController = $bannerController->adminBanner();
                    break;
                case 'add-banner':
                    if(isset($_POST['add-banner'])) {
                        require_once PATH_ROOT_ADMIN."/controller/BannerController.php";
                        $bannerController = new BannerController();
                        $bannerController = $bannerController->adminAddNew();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'update-banner':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/BannerController.php";
                        $bannerController = new BannerController();
                        $bannerController = $bannerController->adminFormUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'updated-banner':
                    if(isset($_POST['update-banner'])) {
                        require_once PATH_ROOT_ADMIN."/controller/BannerController.php";
                        $bannerController = new BannerController();
                        $bannerController = $bannerController->adminUpdate();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'delete-banner':
                    if(isset($_GET['id']) && $_GET['id']) {
                        require_once PATH_ROOT_ADMIN."/controller/BannerController.php";
                        $bannerController = new BannerController();
                        $bannerController = $bannerController->adminDelete();
                    } else {
                        header("Location: ?page=404");
                    }
                    break;
                case 'logout':
                    session_unset();
                    session_destroy();
                    header("Location: ./auth/login.php");
                    break;
                case 'default':
                    require_once PATH_ROOT_ADMIN."/controller/HomeController.php";
                    $homeController = new HomeController();
                    $homeController->adminHome();
                    break;
            } 
        } else {
            require_once PATH_ROOT_ADMIN."/controller/HomeController.php";
            $homeController = new HomeController();
            $homeController->adminHome();
        }
        if((isset($_GET['page']) && $_GET['page'] != 'print-bill') || !isset($_GET['page'])) {
            include_once PATH_ROOT_ADMIN."/view/footer.php";
        }
    } else {
        header("Location: ./auth/login.php");
    }
?>