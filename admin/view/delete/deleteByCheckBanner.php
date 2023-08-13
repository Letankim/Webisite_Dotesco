<?php
    include_once "../../model/connect.php";
    include_once "../../model/banner.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    if($isAll == "true") {
        deleteAllBanner();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            deleteBanner($data[$i]);
        }
    }
?>