<?php
    include_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/EmailDao.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    $emailDao = new EmailDao();
    $isDone = 0;
    if($isAll == "true") {
        // $isDone = $emailDao->deleteAll();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            $item = $emailDao->delete($data[$i]);
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