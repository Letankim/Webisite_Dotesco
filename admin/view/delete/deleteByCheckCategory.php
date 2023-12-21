<?php
    include_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/CategoryDao.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    $categoryDao = new CategoryDao();
    $isDone = 0;
    if($isAll == "true") {
        $isDone = $categoryDao->deleteAll();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            $item = $categoryDao->delete($data[$i]);
            if($item >= 1) {
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