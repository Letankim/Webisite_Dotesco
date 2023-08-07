<?php
    session_start();
    ob_start();
    if(isset($_SESSION['roleAdmin']) && $_SESSION['roleAdmin'] == 1) {

        include_once "./model/connect.php";
        include_once "../encode.php";
        include_once "./model/upload.php";
        include_once "../define.php";
        include_once "./model/validation.php";
        include_once "./model/deleteImgInFile.php";
        include_once "./model/category.php";
        include_once "./model/nguongoc.php";
        include_once "./model/product.php";
        include_once "./model/account.php";
        include_once "./view/header.php";
        include_once "./view/hanleShow/showDanhMuc.php";
        include_once "./view/hanleShow/showNguonGoc.php";
        include_once "./view/hanleShow/showSanPham.php";
        include_once "./view/hanleShow/showAccount.php";
        connect();
        if(isset( $_GET['page']) &&  $_GET['page']) {
            switch( $_GET['page']) {
                case 'danhmuc':
                    $allCategory = getAllCategory();
                    $pages = ceil(count($allCategory) / 20);
                    $pageNumber = 1;
                    if(isset($_GET['trang']) && $_GET['trang']) {
                        $pageNumber = $_GET['trang'];
                        $page = ($pageNumber - 1) * 20;
                    } else {
                        $page = 0;
                    }
                    $allCategory = devicePage($page, 20);
                    include_once "./view/danhmuc.php";
                    break;
                case 'addCategory': 
                    if(isset($_POST['addCategory'])) {
                        $name = $_POST['nameCategory'];
                        $status = $_POST['status'];
                        addNewCategory($name, $status);
                    }
                    header("Location: index.php?page=danhmuc");
                    break;
                case 'updateCategory':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $currentCategory = getCategoryByID($id);
                        include_once "./view/editForm/editDanhMuc.php";
                    }
                    break;
                case 'updatedCategory':
                    if(isset($_POST['updateCategory'])) {
                        $id = $_POST['idCategory'];
                        $name = $_POST['nameCategory'];
                        $status = $_POST['status'];
                        updateCategory($id, $name, $status);
                    }
                    header("Location: index.php?page=danhmuc");
                    break;
                case 'deleteCategory':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteCategory($id);
                    }
                    header("Location: index.php?page=danhmuc");
                    break;
                case 'searchCategory':
                    if(isset($_POST['search'])) {
                        $key = $_POST['key'];
                        $status = 1;
                        $filterCategory = searchCategory($key);
                        include_once "./view/handleFilter/filterDanhmuc.php";
                    }
                    break;
                case 'filterByCategory':
                    if(isset($_POST['filter'])) {
                        $status = $_POST['status'];
                        $filterCategory = filterByCategory($status);
                        include_once "./view/handleFilter/filterDanhmuc.php";
                    }
                    break;
                case 'nguongoc':
                    $allNguonGoc = getAllNguonGoc();
                    $pages = ceil(count($allNguonGoc) / 20);
                    $pageNumber = 1;
                    if(isset($_GET['trang']) && $_GET['trang']) {
                        $pageNumber = $_GET['trang'];
                        $page = ($pageNumber - 1) * 20;
                    } else {
                        $page = 0;
                    }
                    $allNguonGoc = devicePageNguonGoc($page, 20);
                    include_once "./view/nguongoc.php";
                    break;
                case 'addNguonGoc':
                    if(isset($_POST['addNguonGoc'])) {
                        $name = $_POST['nameNguonGoc'];
                        $country = $_POST['country'];
                        $status = $_POST['status'];
                        addNewNguonGoc($name, $country, $status);
                    }
                    header("Location: index.php?page=nguongoc");
                    break;
                case 'updateNguonGoc':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $currentNguonGoc = getNguonGocByID($id);
                        include_once "./view/editForm/editNguonGoc.php";
                    }
                    break;
                case 'updatedNguonGoc':
                    if(isset($_POST['updateNguonGoc'])) {
                        $id = $_POST['id'];
                        $name = $_POST['nameNguonGoc'];
                        $country = $_POST['country'];
                        $status = $_POST['status'];
                        updateNguonGoc($id, $name, $country,$status);
                    }
                    header("Location: index.php?page=nguongoc");
                    break;
                case 'deleteNguonGoc':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteNguonGoc($id);
                    }
                    header("Location: index.php?page=nguongoc");
                    break;
                case 'searchNguonGoc':
                    if(isset($_POST['search'])) {
                        $key = $_POST['key'];
                        $status = 1;
                        $filterNguonGoc = searchNguonGoc($key);
                        include_once "./view/handleFilter/filterOrigin.php";
                    }
                    break;
                case 'filterByNguonGoc':
                    if(isset($_POST['filter'])) {
                        $status = $_POST['status'];
                        $filterNguonGoc = filterByNguonGoc($status);
                        include_once "./view/handleFilter/filterOrigin.php";
                    }
                    break;
                case 'product':
                    $allProduct = getAllProduct();
                    $pages = ceil(count($allProduct) / 20);
                    $pageNumber = 1;
                    if(isset($_GET['trang']) && $_GET['trang']) {
                        $pageNumber = $_GET['trang'];
                        $page = ($pageNumber - 1) * 20;
                    } else {
                        $page = 0;
                    }
                    $allProduct = devicePageProduct($page, 20);
                    $allCategory = getAllCategory();
                    $allNguonGoc = getAllNguonGoc();
                    include_once "./view/product.php";
                    break;
                case 'addSanPham':
                    if(isset($_POST['addSanPham'])) {
                        $idDm = $_POST['danhmuc'];
                        $idNG = $_POST['nguonGoc'];
                        $model = $_POST['model'];
                        $name = $_POST['name'];
                        $desc = $_POST['desc'];
                        $status = $_POST['status'];
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($_FILES['mainImg']["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            $uploadOk = 0;
                        }
                        if($uploadOk == 1) {
                            move_uploaded_file($_FILES['mainImg']["tmp_name"], $target_file);
                            $img = basename($_FILES['mainImg']["name"]);
                            $last_id = addNewProduct($idDm,$idNG,$model,$name,$desc,$img,$status);
                        }
                        // add anh mo ta
                        $filename = $_FILES['descImg']['name'];
                        $filetmp = $_FILES['descImg']['tmp_name'];
                        foreach ($filename as $key => $val)
                        {
                            move_uploaded_file($filetmp[$key], "../uploads/" .$val);
                            addImgDesc($last_id, $val);
                        }
                    }
                    header("Location: index.php?page=product");
                    break;
                case 'deleteSanPham':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $pathCurrent = getProductByID($id)['img'];
                        unlink(PATH_UPLOADS.$pathCurrent);
                        deletePathInFile(getAllImgDescByIDProduct($id));
                        deleteProduct($id);
                    }
                    header("Location: index.php?page=product");
                    break;
                case 'updateSanPham':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $allCategory = getAllCategory();
                        $allNguonGoc = getAllNguonGoc();
                        $currentProduct = getProductByID($id);
                        $allImgPreview = getAllImgDescByIDProduct($id);
                        include_once "./view/editForm/editSanPham.php";
                    }
                    break;
                case 'updatedSanPham':
                    if(isset($_POST['updateSanPham'])) {
                        $id = $_POST['id'];
                        $idDm = $_POST['danhmuc'];
                        $idNG = $_POST['nguonGoc'];
                        $model = $_POST['model'];
                        $name = $_POST['name'];
                        $desc = $_POST['desc'];
                        $status = $_POST['status'];
                        $mainImg = $_FILES['mainImg'];
                        if($mainImg["name"]) {
                            $currentPath = getProductByID($id)['img'];
                            if(unlink(PATH_UPLOADS.$currentPath)) {
                                echo "xoa thanh cong";
                            }
                            uploadImg($mainImg);
                            $mainImg = basename($mainImg["name"]);
                        } else {
                            $mainImg = "";
                        }
                        updateProduct($idDm,$idNG,$model,$name,$desc,$mainImg,$status, $id);
                        // add anh mo ta
                        if($_FILES['descImg']['name'][0] != "") {
                            deletePathInFile(getAllImgDescByIDProduct($id));
                            deleteImgDescProduct($id);
                            $filename = $_FILES['descImg']['name'];
                            $filetmp = $_FILES['descImg']['tmp_name'];
                            foreach ($filename as $key => $val)
                            {
                                move_uploaded_file($filetmp[$key], PATH_UPLOADS.$val);
                                addImgDesc($id, $val);
                            }
                        }
                    }
                    header("Location: index.php?page=product");
                    break;
                case 'xemSanPhamChiTiet':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $allCategory = getAllCategory();
                        $allNguonGoc = getAllNguonGoc();
                        $currentProduct = getProductByID($id);
                        $allImgPreview = getAllImgDescByIDProduct($id);
                        include_once "./view/hanleShow/showChiTietSanPham.php";
                    }
                    break;
                case 'searchSanPham':
                    if(isset($_POST['search'])) {
                        $key = $_POST['key'];
                        $status = 1;
                        $filterProduct = searchProduct($key);
                        include_once "./view/handleFilter/filterProduct.php";
                    }
                    break;
                case 'filterBySanPham':
                    if(isset($_POST['filter'])) {
                        $status = $_POST['status'];
                        $filterProduct = filterByProduct($status);
                        include_once "./view/handleFilter/filterProduct.php";
                    }
                    break;
                case 'account':
                    $allAccount = getAllAccount();
                    $pages = ceil(count($allAccount) / 20);
                    $pageNumber = 1;
                    if(isset($_GET['trang']) && $_GET['trang']) {
                        $pageNumber = $_GET['trang'];
                        $page = ($pageNumber - 1) * 20;
                    } else {
                        $page = 0;
                    }
                    $message = "";
                    if(isset($_GET['message']) && $_GET['message']) {
                        $message = $_GET['message'];
                    }
                    $allAccount = devicePageAccount($page, 20);
                    include_once "./view/account.php";
                    break;
                case 'addAccount':
                    if(isset($_POST['addAccount'])) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $role = $_POST['role'];
                        $status = $_POST['status'];
                        if(getAccountByUsername($username)['username'] != "") {
                            $message = 'Tài khoản đã tồn tại';
                            header("Location: index.php?page=account&message=" . urlencode($message));
                        } else {
                            addNewAccount($username, $email,$password,$role, $status);
                            header("Location: index.php?page=account");
                        }
                    }
                    break;
                case "updateAccount":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $currentAccount = getAccountByID($id);
                    }
                    include_once "./view/editForm/editFormAccount.php";
                    break;
                case 'updatedAccount':
                    if(isset($_POST['updateAccount'])) {
                        $id = $_POST['id'];
                        $password = $_POST['password'];
                        $status = $_POST['status'];
                        $email = $_POST['email'];
                        $role = $_POST['role'];
                        $currentAccount = getAccountByID($id);
                        if($password == "") {
                            $password = $currentAccount['password'];
                        }
                        updateAccount($id, $password, $email, $status, $role);
                    }
                    header("Location: index.php?page=account");
                    break;
                case 'deleteAccount':
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $pathCurrent = getAccountByID($id)['avatar'];
                        unlink(PATH_UPLOADS.$pathCurrent);
                        deleteAccount($id);
                    }
                    header("Location: index.php?page=account");
                    break;
                case 'searchAccount':
                    if(isset($_POST['search'])) {
                        $key = $_POST['key'];
                        $status = 1;
                        $filterAccount = searchAccount($key);
                        include_once "./view/handleFilter/filterAccount.php";
                    }
                    break;
                case 'filterByAccount':
                    if(isset($_POST['filter'])) {
                        $status = $_POST['status'];
                        $filterAccount = filterByAccount($status);
                        include_once "./view/handleFilter/filterAccount.php";
                    }
                    break;
                case 'logout':
                    unset($_SESSION['roleAdmin']);
                    unset($_SESSION['usernameAdmin']);
                    header("Location: ./auth/login.php");
                    break;
                case 'default':
                    $allCategory = getAllCategory();
                    $allNguonGoc = getAllNguonGoc();
                    $allProduct = getAllProduct();
                    $allAccount = getAllAccount();
                    include_once "./view/main.php";
                    break;
                
            } 
        } else {
            $allCategory = getAllCategory();
            $allNguonGoc = getAllNguonGoc();
            $allProduct = getAllProduct();
            $allAccount = getAllAccount();
            include_once "./view/main.php";
        }
        include_once "./view/footer.php";
    } else {
        header("Location: ./auth/login.php");
    }
?>