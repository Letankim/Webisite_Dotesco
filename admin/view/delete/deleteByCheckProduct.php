<?php
    include_once "../../model/connect.php";
    include_once "../../model/product.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    if($isAll == "true") {
        deleteAllProduct();
        deleteAllImgDescProduct();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            deleteProduct($data[$i]);
        }
    }
    
?>