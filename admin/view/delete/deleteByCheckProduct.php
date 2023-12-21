<?php
    include_once "../../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
    include_once PATH_ROOT_ADMIN."/DAO/ImgDescriptionDao.php";
    include_once PATH_ROOT."/lib/Upload.php";
    $data = $_POST['dataDelete'];
    $numberOfDelete = $_POST['numberOfDelete'];
    $isAll = $_POST['isAll'];
    $productDao = new ProductDao();
    $imgDescDao = new ImgDescriptionDao();
    $isDone = 0;
    $target_dir = PATH_ROOT."/uploads/";
    if($isAll == "true") {
        $allProduct = $productDao->getAll();
        foreach($allProduct as $product) {
            $id = $product->getId();
            deletePathInFile($target_dir, $imgDescDao->getImageDescByProduct($id));
            $item = $productDao->delete($id);
            if($item >= 1) {
                $isDone = 1;
            }
        }
    } else {
        for($i = 0; $i < $numberOfDelete; $i++) {
            $id = $data[$i];
            deletePathInFile($target_dir, $imgDescDao->getImageDescByProduct($id));
            $item = $productDao->delete($id);
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