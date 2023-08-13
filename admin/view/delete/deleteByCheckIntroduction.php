<?php
    include_once "../../model/connect.php";
    include_once "../../model/introduction.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    if($isAll == "true") {
        deleteAllIntroduction();
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            deleteIntroduction($data[$i]);
        }
    }
?>