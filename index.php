<?php
    ob_start();
    session_start();
    $typeUser = 0;
    include_once "./define.php";
    include_once "./mail/sendmail.php";
    include_once "./mail/sendForget.php";
    include_once "./mail/sendContact.php";
    include_once "./mail/mailThank.php";
    include_once "./User/header.php";
    include_once "./User/model/auth.php";
    include_once "./User/components/renameURL.php";
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
    include_once "./User/components/pagination.php";
    $allCategoryActive = getAllCategoryActive();
    $allOriginActive = getAllOriginActive();
    $introduction = getIntroduction();
    if(isset($_GET['act']) && $_GET['act']) {
        switch($_GET['act']) {
            case 'san-pham':
                include_once "./User/components/navigation.php";
                $heading = "Tất cả sản phẩm";
                $allProduct = getAllProductActive();
                $pages = ceil(count($allProduct) / 12);
                $pageNumber = 1;
                if(isset($_GET['trang']) && $_GET['trang']) {
                    $pageNumber = $_GET['trang'];
                    $page = ($pageNumber - 1) * 12;
                } else {
                    $page = 0;
                }
                // pagination
                $product = true;
                $origin = false;
                $allProduct = devicePageProduct($page, 12);
                include_once "./User/product.php";
                break;
            case 'san-pham-danh-muc':
                include_once "./User/components/navigation.php";
                if(isset($_GET['id']) && $_GET['id']) {
                    $categoryID = $_GET['id'];
                    $currentCategory = getCategoryByID($categoryID);
                    $heading = $currentCategory['name'];
                    if(!$currentCategory || $currentCategory['status'] != 1) {
                        // chuyển hướng đến trang lỗi
                        header("Location: ../../../");
                    }
                    $allProduct = selectAllProductByCategory($categoryID);
                    $pages = ceil(count($allProduct) / 12);
                    $pageNumber = 1;
                    if(isset($_GET['trang']) && $_GET['trang']) {
                        $pageNumber = $_GET['trang'];
                        $page = ($pageNumber - 1) * 12;
                    } else {
                        $page = 0;
                    }
                    // pagination
                    $product = false;
                    $origin = false;
                    $allProduct = selectAllProductByCategoryInPage($categoryID,$page, 12);
                }
                include_once "./User/product.php";
                break;
            case 'san-pham-nha-san-xuat':
                include_once "./User/components/navigation.php";
                if(isset($_GET['id']) && $_GET['id']) {
                    $originID = $_GET['id'];
                    $currentOrigin = getOriginByID($originID);
                    $heading = $currentOrigin['name'];
                    if(!$currentOrigin || $currentOrigin['status'] != 1) {
                        // chuyển hướng đến trang lỗi
                        header("Location: ../../../");
                    }
                    $allProduct = selectAllProductByOrigin($originID);
                    $pages = ceil(count($allProduct) / 12);
                    $pageNumber = 1;
                    if(isset($_GET['trang']) && $_GET['trang']) {
                        $pageNumber = $_GET['trang'];
                        $page = ($pageNumber - 1) * 12;
                    } else {
                        $page = 0;
                    }
                    $product = false;
                    $origin = true;
                    $allProduct = selectAllProductByOriginInPage($originID, $page, 12);
                }
                include_once "./User/product.php";
                break;
            case 'chi-tiet-san-pham':
                include_once "./User/components/navigation.php";
                if(isset($_GET['id']) && $_GET['id']) {
                    $idProduct = $_GET['id'];
                    $currentProduct = getProductByID($idProduct);
                    if(!$currentProduct || $currentProduct['status'] == 0) {
                        // chuyển hướng đến trang lỗi
                        header("Location: ../../../");
                    } else {
                        updateView($idProduct);
                        $imageDescProduct = getImageDescProduct($idProduct);
                        $currentCategory = getCategoryByID($currentProduct['idCategory']);
                        $currentOrigin = getOriginByID($currentProduct['idOrigin']);
                        $productRelated=selectAllProductRelated($currentProduct['idCategory'], $idProduct);
                    }
                }
                include_once "./User/itemProduct.php";
                break;
            case 'tim-kiem':
                include_once "./User/components/navigation.php";
                if (isset($_POST['keyword'])) {
                    $keywordSearch = trim($_POST["keyword"]);
                    $searchResult = searchProductByKeyword($keywordSearch);
                    include_once "./User/search.php";
                }
                break;
            case 'lien-he':
                include_once "./User/components/navigation.php";
                include_once "./User/contact.php";
                break;
            case 'gui-tin-nhan':
                include_once "./User/components/navigation.php";
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
            case 'gui-tin-nhan-san-pham':
                include_once "./User/components/navigation.php";
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
            case 'gioi-thieu':
                include_once "./User/components/navigation.php";
                include_once "./User/introduction.php";
                break;
            case 'dang-nhap':
                include_once "./User/components/navigation.php";
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
                                $_SESSION["idUser"] = $user['id'];
                                $_SESSION["emailUser"] = $user['email'];
                                $_SESSION["roleLogin"] = 0;
                                header("Location: .");
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
            case 'dang-ki':
                include_once "./User/components/navigation.php";
                $message = "";
                if(isset($_POST['signup'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $user = isExistAccount($username);
                    if($user) {
                        $message = "Tên đăng nhập đã tồn tại.";
                    } else {
                        $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date= date('Y/m/d H:i:s');
                        addAccount($username, $email,password_hash($password, PASSWORD_DEFAULT), $date);
                        $message = "Đăng kí tài khoản thành công.";
                    }
                } 
                include_once "./User/auth/signup.php";
                break;
            case 'quen-mat-khau':
                include_once "./User/components/navigation.php";
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
            case 'ca-nhan':
                include_once "./User/components/navigation.php";
                $message = "";
                if(isset($_POST['changePassword'])) {
                    $id = $_SESSION["idUser"];
                    $oldPasseword = $_POST['password'];
                    $newPassword = $_POST['newPassword'];
                    $currentUser = getUserById($id);
                    $isValidPassword = password_verify($oldPasseword, $currentUser['password']);
                    if($isValidPassword) {
                        updatePassword($id, password_hash($newPassword, PASSWORD_DEFAULT));
                        $message = "Cập nhật mật khẩu thành công";
                    } else {
                        $message = "Mật khẩu cũ không hợp lệ";
                    }
                }
                include_once "./User/personal.php";
                break;
            case "dang-xuat":
                session_unset();
                session_destroy();
                header("Location: .");
                break;
            default:
                $allBannerActive = getAllBannerActive();
                $allProductActive = getAllProductActiveHome();
                $allProductFeatured = getAllProductActiveFeatured();
                $categoryLimit = getCategoryNewLimit(6);
                include './User/main.php';
                break;
        }
    } else {
        $allBannerActive = getAllBannerActive();
        $allProductActive = getAllProductActiveHome();
        $allProductFeatured = getAllProductActiveFeatured();
        $categoryLimit = getCategoryNewLimit(6);
        include './User/main.php';
    }
    include_once "./User/footer.php";
?>