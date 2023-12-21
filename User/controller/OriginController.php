<?php
require_once PATH_ROOT_USER."/DAO/ProductDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
include_once PATH_ROOT_USER."/components/product.php";
class OriginController { 
    private static $productDao;
    function __construct() {
        self::$productDao = new ProductDao();
    }

    public function userProductOrigin() {
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $allCategoryActive = $categoryDao->getAllActive();
        $allOriginActive = $originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        if(isset($_GET['id']) && $_GET['id']) {
            $originID = $_GET['id'];
            $currentOrigin = $originDao->getOneByID($originID);
            $isOrigin = $currentOrigin == null ||
            ($currentOrigin != null && $currentOrigin->getStatus() == 0) ? false : true;
            if(!$isOrigin) {
                header("Location: ?act=404");
            } 
            $heading = $currentOrigin->getName();
            $allProduct = self::$productDao->getNumberOfProductByOrigin($originID);
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
            $product = false;
            $origin = true;
            $allProduct = self::$productDao->getProductByOriginInPage($originID, $startPage, NUMBER_PRODUCT_IN_PAGE);
        }
        include_once PATH_ROOT_USER."/product.php";
    }
}
?>