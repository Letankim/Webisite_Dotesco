<?php
require_once PATH_ROOT_USER."/DAO/ProductDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_USER."/DAO/BannerDao.php";
include_once PATH_ROOT_USER."/components/banner.php";
include_once PATH_ROOT_USER."/components/product.php";
class HomeController {
    public function userHome() {
        $bannerDao = new BannerDao();
        $productDao = new ProductDao();
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $allCategoryActive = $categoryDao->getAllActive();
        $allOriginActive = $originDao->getAllActive();
        $allBannerActive = $bannerDao->getActiveByNumber(6);
        $allProductActive = $productDao->getAllActiveByNumber(0, 12);
        $allProductFeatured = $productDao->getAllActiveByNumber(1, 12);
        $categoryLimit = $categoryDao->getCategoryNewLimit(6);
        include_once PATH_ROOT_USER.'/main.php';
    }
}
?>