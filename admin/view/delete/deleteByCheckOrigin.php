<?php
    include_once "../../model/connect.php";
    include_once "../../model/nguongoc.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    if($isAll == "true") {
        deleteAllNguonGoc();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            deleteNguonGoc($data[$i]);
        }
    }
?>