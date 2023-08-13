<?php
    include_once "../../model/connect.php";
    include_once "../../model/category.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    if($isAll == "true") {
        deleteAllCategory();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            deleteCategory($data[$i]);
        }
    }
?>