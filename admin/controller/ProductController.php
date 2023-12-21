<?php
require_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/DAO/ImgDescriptionDao.php";
require_once PATH_ROOT_ADMIN."/DAO/CategoryDao.php";
require_once PATH_ROOT_ADMIN."/DAO/OriginDao.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showProduct.php";
require_once PATH_ROOT."/model/Product.php";
require_once PATH_ROOT."/model/Image.php";
require_once PATH_ROOT."/lib/Upload.php";
class ProductController {
    private static $imgDescDao;
    private static $productDao;

    function __construct() {
        self::$imgDescDao = new ImgDescriptionDao();
        self::$productDao = new ProductDao();
    }

    public function adminProduct() {
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $allProduct = self::$productDao->getAll();
        $allCategory = $categoryDao->getAll();
        $allOrigin = $originDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/productView.php";
    }

    public function adminAddNew() {
        $idCategory = $_POST['category'];
        $idOrigin = $_POST['origin'];
        $modelID = $_POST['model'];
        $name = $_POST['name'];
        $description = $_POST['desc'];
        $price = $_POST['price'];
        $priceSale = $_POST['priceSale'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $target_dir = PATH_ROOT."/uploads/";
        $pathFile = $_FILES['mainImg'];
        $mainImg = uploadImage($target_dir, $pathFile);
        $createAt = getCurrentTime();
        $createBy = $_SESSION['idAdmin'];
        $product = new Product(null, $modelID, $name, $description, $price, $priceSale, $idCategory, $idOrigin, $createAt, null, $createBy, null, $status, $priority, null, $mainImg);
        $last_id = self::$productDao->addNew($product);
        $imgDao = new ImgDescriptionDao();
        if($last_id >= 1) {
            // add anh mo ta
            $isDone = uploadImgDesc($target_dir, $_FILES['descImg'], $imgDao, $last_id);
            $type = "fail";
            if($isDone) {
                $type = "success";
            }
            header("Location: index.php?page=product&status=".$type);
        } else {
            header("Location: index.php?page=product&status=fail&message=Thêm sản phẩm thất bại");
        }
    }

    public function adminFormUpdate() {
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $id = $_GET['id'];
        $allCategory = $categoryDao->getAll();
        $allOrigin = $originDao->getAll();
        $currentProduct = self::$productDao->getOneByID($id);
        $allImgPreview = self::$imgDescDao->getImageDescByProduct($id);
        include_once PATH_ROOT_ADMIN."/view/editForm/editProduct.php";
    }

    public function adminUpdate() {
        $id = $_POST['id'];
        $idCategory = $_POST['category'];
        $idOrigin = $_POST['origin'];
        $modelID = $_POST['model'];
        $name = $_POST['name'];
        $description = $_POST['desc'];
        $price = $_POST['price'];
        $priceSale = $_POST['priceSale'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $target_dir = PATH_ROOT."/uploads/";
        $pathFile = $_FILES['mainImg'];
        $mainImg = uploadImage($target_dir, $pathFile);
        $modifiedAt = getCurrentTime();
        $modifiedBy = $_SESSION['idAdmin'];
        if($mainImg == "") {
            $mainImg = $_POST['oldMainImg'];
        } else {
            $currentPath = self::$productDao->getOneByID($id)->getImg();
            unlink($target_dir.$currentPath);
        }
        $product = new Product($id, $modelID, $name, $description, $price, $priceSale, $idCategory, $idOrigin, null, $modifiedAt, null, $modifiedBy, $status, $priority, null, $mainImg);
        // add anh mo ta
        if($_FILES['descImg']['name'][0] != "") {
            deletePathInFile($target_dir, self::$imgDescDao->getImageDescByProduct($id));
            self::$imgDescDao->deleteImgDescProduct($id);
            uploadImgDesc($target_dir, $_FILES['descImg'], self::$imgDescDao, $id);
        }
        $isDone = self::$productDao->update($product);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=product&status=".$type);
    }

    public function adminDetailProduct() {
        $id = $_GET['id'];
        $currentProduct = self::$productDao->getOneByID($id);
        $allImgPreview = self::$imgDescDao->getImageDescByProduct($id);
        include_once PATH_ROOT_ADMIN."/view/handleShow/showDetailProduct.php";
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $target_dir = PATH_ROOT."/uploads/";
        $currentProduct = self::$productDao->getOneByID($id);
        if($currentProduct != null) {
            unlink($target_dir.$currentProduct->getName());
            deletePathInFile($target_dir, self::$imgDescDao->getImageDescByProduct($id));
            $isDone = self::$productDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: index.php?page=product&status=".$type);
        }
    }
}
?>