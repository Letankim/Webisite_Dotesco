<?php
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_USER."/DAO/IntroductionDao.php";
class IntroductionController {
    private static $introductionDao;
    function __construct() {
        self::$introductionDao = new IntroductionDao();
    }

    public function userIntroduction() {
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $allCategoryActive = $categoryDao->getAllActive();
        $allOriginActive = $originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $introduction = self::$introductionDao->getOne();
        include_once PATH_ROOT_USER."/introduction.php";
    }
}
?>