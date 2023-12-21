<?php
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
class ErrorController {
    private static $categoryDao;
    private static $originDao;

    function __construct() {
        self::$categoryDao = new CategoryDao();
        self::$originDao = new OriginDao();
    }

    public function error404() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        include_once PATH_ROOT_USER."/404.php";
    }
}
?>