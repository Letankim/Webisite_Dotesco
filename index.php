<?php
    ob_start();
    session_start();
    include_once "./define.php";
    include_once "./mail/sendmail.php";
    include_once "./mail/sendForget.php";
    include_once "./mail/sendContact.php";
    include_once "./mail/mailThank.php";
    include_once "./User/header.php";
    include_once "./User/model/auth.php";
    include_once "./User/model/connect.php";
    include_once "./User/model/category.php";
    include_once "./User/model/banner.php";
    include_once "./User/model/product.php";
    include_once "./User/model/origin.php";
    include_once "./User/model/introduction.php";
    include_once "./User/components/category.php";
    include_once "./User/components/banner.php";
    include_once "./User/components/product.php";
    include_once "./User/components/productByCategory.php";
    $allCategoryActive = getAllCategoryActive();
    $allOriginActive = getAllOriginActive();
    if(isset($_GET['act']) && $_GET['act']) {

        switch($_GET['act']) {
            case 'product':
                $heading = "Tất cả sản phẩm";
                $allProduct = getAllProductActive();
                include_once "./User/product.php";
                break;
            case 'trangsanphamdanhmuc':
                if(isset($_GET['id']) && $_GET['id']) {
                    $categoryID = $_GET['id'];
                    $currentCategory = getCategoryByID($categoryID);
                    $heading = $currentCategory['name'];
                    if($currentCategory['status'] != 1) {
                        // chuyển hướng đến trang lỗi
                        header("Location: index.php");
                    }
                    $allProduct = selectAllProductByCategory($categoryID);
                }
                include_once "./User/product.php";
                break;
            case 'trangsanphamnhasanxuat':
                if(isset($_GET['id']) && $_GET['id']) {
                    $originID = $_GET['id'];
                    $currentOrigin = getOriginByID($originID);
                    $heading = $currentOrigin['name'];
                    if($currentOrigin['status'] != 1) {
                        // chuyển hướng đến trang lỗi
                        header("Location: index.php");
                    }
                    $allProduct = selectAllProductByOrigin($originID);
                }
                include_once "./User/product.php";
                break;
            case 'trangchitietsanpham':
                if(isset($_GET['id']) && $_GET['id']) {
                    $idProduct = $_GET['id'];
                    $currentProduct = getProductByID($idProduct);
                    if($currentProduct['status'] != 1) {
                        // chuyển hướng đến trang lỗi
                        header("Location: index.php");
                    } else {
                        $imageDescProduct = getImageDescProduct($idProduct);
                        $currentCategory = getCategoryByID($currentProduct['idCategory']);
                        $currentOrigin = getOriginByID($currentProduct['idOrigin']);
                        $productRelated=selectAllProductByCategory($currentProduct['idCategory']);
                    }
                }
                include_once "./User/itemProduct.php";
                break;
            case 'search':
                if (isset ($_POST ['keyword'])) {
                    $keywordSearch = trim($_POST ["keyword"]);
                    $searchResult = searchProductByKeyword($keywordSearch);
                }
                include_once "./User/search.php";
                break;
            case 'contact':
                include_once "./User/contact.php";
                break;
            case 'sendContact':
                if(isset($_POST['contact'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $message = $_POST['message'];
                    $mailContact = sendMailContact($name, $email, $phone, $message);
                    $mailThank = sendMailThank($name);
                    $isSendContack = sendmail("Message from customer", $mailContact, "letankim2003@gmail.com", "LeTanKim");
                    $isSendTank = sendmail("Thank-you letter", $mailThank, $email, $name);
                    include_once "./User/thankyou.php";
                }
                break;
            case 'sendContactItemPage':
                if(isset($_POST['contact'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $message = $_POST['message'];
                    $mailContact = sendMailContact($name, $email, $phone, $message);
                    $mailThank = sendMailThank($name);
                    $isSendContack = sendmail("Message from customer", $mailContact, "letankim2003@gmail.com", "LeTanKim");
                    $isSendTank = sendmail("Thank-you letter", $mailThank, $email, $name);
                    include_once "./User/thankyou.php";
                }
                break;
            case 'introduction':
                $introduction = getIntroduction();
                include_once "./User/introduction.php";
                break;
            case 'login':
                $message = "";
                if(isset ($_POST ['login'])) {
                    $username = trim($_POST ["username"]);
                    $password = trim($_POST ["password"]);
                    $user = isExistAccount($username);
                    if($user) {
                        if($user['role'] == 0) {
                            $isValidPassword = password_verify($password, $user['password']);
                            if($user['status'] == 0) {
                                $message = "Tài khoản này đang bị khóa.";
                                include_once "./User/auth/login.php";
                            } else
                            if($isValidPassword) {
                                $_SESSION["isLogin"] = true;
                                $_SESSION["username"] = $user['username'];
                                $_SESSION["roleLogin"] = 0;
                                header("Location: ./index.php");
                            } else {
                                $message = "Mật khẩu không chính xác.";
                                include_once "./User/auth/login.php";
                            }
                        } else {
                            $message = "Hãy sử dụng form đăng nhập với vai trò được cung cấp.";
                            include_once "./User/auth/login.php";
                        }
                    } else {
                        $message = "Tài khoản không tồn tại.";
                        include_once "./User/auth/login.php";
                    } 
                }
                else {
                    include_once "./User/auth/login.php";
                }
                break;
            case 'signup':
                $message = "";
                if(isset($_POST['signup'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $user = isExistAccount($username);
                    if($user) {
                        $message = "Tên đăng nhập đã tồn tại.";
                    } else {
                        addAccount($username, $email,password_hash($password, PASSWORD_DEFAULT));
                        $message = "Đăng kí tài khoản thành công.";
                    }
                } 
                include_once "./User/auth/signup.php";
                break;
            case 'forget':
                $message = "";
                if(isset($_POST['forget'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $user = isExistAccountForget($username,$email);
                    if($user) { 
                        if($user['status'] == 0) {
                            $message = "Tài khoản này đang bị khóa.";
                        } else if($user['role'] == 1) {
                            $message = "Tài khoản này không được phép cấp lại mật khẩu ở đây.";
                        } else {
                            $newPassword =  implode(resetPassword(9));
                            $isSend = sendmail("Reset password", sendMailForgetPassword($username,$newPassword), $email, $username);
                            if($isSend) {
                                updatePassword($user['id'], password_hash($newPassword, PASSWORD_DEFAULT));
                                $message = "Cấp lại mật khẩu thành công. Kiểm tra mail để lấy mật khẩu mới.";
                            } else {
                                $message = "Chưa cấp lại mật khẩu thành công.";
                            }
                        }
                    } else {
                        $message = "Tài khoản không tồn tại.";
                    }
                }
                include_once "./User/auth/forget.php";
                break;
            case "logout":
                unset($_SESSION["isLogin"]);
                unset($_SESSION["username"]);
                unset($_SESSION["roleLogin"]);
                header("Location: ./index.php");
                break;
        }
    } else {
        
        $allBannerActive = getAllBannerActive();
        $allProductActive = getAllProductActive();
        $allProductFeatured = getAllProductActiveFeatured();
        $categoryLimit = getCategoryNewLimit(6);
        include './User/main.php';
    }
    include_once "./User/footer.php";
?>