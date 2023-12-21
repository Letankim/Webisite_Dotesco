<?php
require_once PATH_ROOT_USER."/DAO/ProductDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_USER."/DAO/ImageDescriptionDao.php";
include_once PATH_ROOT_USER."/components/product.php";
class DetailProductController {
    private static $productDao;
    function __construct() {
        self::$productDao = new ProductDao();
    }

    public function userDetailProduct() {
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $imageDescriptionDao = new ImageDescriptionDao();
        $allCategoryActive = $categoryDao->getAllActive();
        $allOriginActive = $originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        if(isset($_GET['id']) && $_GET['id']) {
            $idProduct = $_GET['id'];
            $currentProduct = self::$productDao->getOneByID($idProduct);
            if($currentProduct == null) {
                header("Location: ?act=404");
            } else {
                $idCategory = $currentProduct->getIdCategory();
                $idOrigin = $currentProduct->getIdOrigin();
                $isDone = self::$productDao->updateView($idProduct, $currentProduct->getView() + 1);
                $imageDescProduct = $imageDescriptionDao->getImageDescByProduct($idProduct);
                $currentCategory = $categoryDao->getOneByID($idCategory);
                $currentOrigin = $originDao->getOneByID($idOrigin);
                $productRelated = self::$productDao->getProductRelated($idCategory, $idProduct);
            }
            include_once PATH_ROOT_USER."/detailProduct.php";
        } else {
            header("Location: ?act=404");
        }
    }
}
?>