<?php
    include_once "../../model/connect.php";
    include_once "../../model/account.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    if($isAll == "true") {
        deleteAllAccount();
    }
    else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            deleteAccount($data[$i]);
        }
    }
?>