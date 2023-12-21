<?php
require_once PATH_ROOT_USER."/DAO/ProductDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
include_once PATH_ROOT_USER."/components/product.php";
class ProductController {
    private static $productDao;
    private static $categoryDao;
    private static $originDao;
    function __construct() {
        self::$productDao = new ProductDao();
        self::$categoryDao = new CategoryDao();
        self::$originDao = new OriginDao();
    }

    public function userProduct() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $heading = "Tất cả sản phẩm";
        $allProduct = self::$productDao->getNumberOfProductActive();
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
        $product = true;
        $origin = false;
        $allProduct = self::$productDao->getProductInPage($startPage, NUMBER_PRODUCT_IN_PAGE);
        include_once PATH_ROOT_USER."/product.php";
    }

    public function userSearchProduct() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        if (isset($_POST['keyword'])) {
            $keywordSearch = trim($_POST["keyword"]);
            $searchResult = self::$productDao->searchProductByKeyword($keywordSearch);
            include_once PATH_ROOT_USER."/search.php";
        } else {
            header("Location: ?act=404");
        }
    }
}
?>