<?php
    function getAllProduct() {
        $sql = "SELECT * FROM tbl_product ORDER BY id DESC";
        return getAll($sql);
    }

    function getAllImgDescByIDProduct($idProduct) {
        $sql = "SELECT * FROM tbl_image WHERE idProduct = $idProduct";
        return getAll($sql);
    }

    function searchProduct($searchCategory) {
        $searchCategory = validationInput($searchCategory);
        $sql = "SELECT * FROM tbl_product WHERE name like '%".$searchCategory."%' ORDER BY id DESC";
        return getAll($sql);
    }

    function filterByProduct($status) {
        $sql = "SELECT * FROM tbl_product WHERE status=$status ORDER BY id DESC";
        return getAll($sql);
    }

    function devicePageProduct($indexStart, $count) {
        $sql = "SELECT * FROM tbl_product ORDER BY id DESC LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function getProductByID($id) {
        $sql = "SELECT * FROM tbl_product WHERE id='$id'";
        return getByID($sql);
    }
    function addNewProduct($iddm, $idNguonGoc, $model, $name, $desc, $mainImg ,$status) {
        $conn = connect();
        $name = validationInput($name);
        $model = validationInput($model);
        $desc = validationInput($desc);
        $sql = "INSERT INTO tbl_product (idCategory, idOrigin, modelID, name, description, img,status) 
        VALUES ('$iddm', '$idNguonGoc','$model', '$name', '$desc','$mainImg', '$status')";
        $conn->exec($sql);
        return $conn->lastInsertId();
    }

    function addImgDesc($idProduct, $source) {
        $sql = "INSERT INTO tbl_image (idProduct, source) VALUES ('$idProduct', '$source')"; 
        insert($sql);
    }

    function updateProduct($iddm, $idNguonGoc, $model, $name, $desc, $mainImg ,$status, $id) {
        $name = validationInput($name);
        $desc = validationInput($desc);
        $desc = validationInput($desc);
        if($mainImg!= "") {
            $sql = "UPDATE tbl_product SET idCategory='".$iddm."', idOrigin = '".$idNguonGoc."',modelID='".$model."',
            name = '".$name."', description='".$desc."', img = '".$mainImg."', status='".$status."'
            WHERE id=$id";
        } else {
            $sql = "UPDATE tbl_product SET idCategory='".$iddm."', idOrigin = '".$idNguonGoc."',modelID='".$model."',
            name = '".$name."', description='".$desc."', status='".$status."'
            WHERE id=$id";
        }
        
        update($sql);
    }

    function deleteProduct($id) {
        $sql = "DELETE FROM tbl_product WHERE id=$id";
        delete($sql);
    }

    function deleteImgDescProduct($idProduct) {
        $sql = "DELETE FROM tbl_image WHERE idProduct=$idProduct";
        delete($sql);
    }
?>