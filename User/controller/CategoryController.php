<?php
require_once PATH_ROOT_USER."/DAO/ProductDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
include_once PATH_ROOT_USER."/components/product.php";
class CategoryController {
    private static $productDao;
    function __construct() {
        self::$productDao = new ProductDao();
    }
    public function userProductCategory() {
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $allCategoryActive = $categoryDao->getAllActive();
        $allOriginActive = $originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        if(isset($_GET['id']) && $_GET['id']) {
            $categoryID = $_GET['id'];
            $currentCategory = $categoryDao->getOneByID($categoryID);
            // kiem tra day co phai la category hop le hay khong
            $isCategory = $currentCategory == null ||
            ($currentCategory != null && $currentCategory->getStatus() == 0) ? false : true;
            if(!$isCategory) {
                header("Location: ?act=404");
            }
            $heading = $currentCategory->getName();
            $allProduct = self::$productDao->getNumberOfProductByCategory($categoryID);
            $pages = ceil($allProduct / NUMBER_PRODUCT_IN_PAGE);
            $pageNumber = 1;
            if(isset($_GET['trang']) && $_GET['trang']) {
                $pageNumber = $_GET['trang'];
                $startPage = ($pageNumber - 1) * NUMBER_PRODUCT_IN_PAGE;
                if(!is_numeric($pageNumber) || $pageNumber > $pages || $pageNumber < 0) {
                    header("Location: ?act=404");
                }
            } else {
                $startPage = 0;
            }
            // pagination
            $product = false;
            $origin = false;
            $allProduct = self::$productDao->getProductByCategoryInPage($categoryID, $startPage, NUMBER_PRODUCT_IN_PAGE);
            include_once PATH_ROOT_USER."/product.php";
        } else {
            header("Location: ?act=404");
        }
    }
}
?>