<?php
    include_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/BannerDao.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    $bannerDao = new BannerDao();
    $isDone = 0;
    if($isAll == "true") {
        $isDone = $bannerDao->deleteAll();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            $deleteItem = $bannerDao->delete($data[$i]);
            if($deleteItem >= 1) {
                $isDone = 1;
            }
        }
    }
    if($isDone >= 1) {
        echo "true";
    } else {
        echo "false";
    }
?>