<?php
    include_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/CompanyDao.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    $companyDao = new CompanyDao($data);
    $isDone = 0;
    if($isAll == "true") {
        $isDone = $companyDao->deleteAll();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            $item = $companyDao->delete($data[$i]);
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