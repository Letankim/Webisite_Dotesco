<?php
    function getAllProduct() {
        $sql = "SELECT * FROM tbl_product ORDER BY id DESC";
        return getAll($sql);
    }

    function getAllImgDescByIDProduct($idProduct) {
        $sql = "SELECT * FROM tbl_image WHERE idProduct = $idProduct";
        return getAll($sql);
    }

    function getAllProductByCategory($idCategory) {
        $sql = "SELECT * FROM tbl_product WHERE idCategory = $idCategory";
        return count(getAll($sql));
    }

    function getAllProductByOrigin($idOrigin) {
        $sql = "SELECT * FROM tbl_product WHERE idOrigin = $idOrigin";
        return count(getAll($sql));
    }


    function searchProduct($searchProduct) {
        $searchProduct = validationInput($searchProduct);
        $sql = "SELECT * FROM tbl_product WHERE name like '%".$searchProduct."%' ORDER BY id DESC";
        return getAll($sql);
    }

    function filterByProduct($status, $priority) {
        $sql = "SELECT * FROM tbl_product WHERE status=$status and priority = $priority ORDER BY id DESC";
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
    function addNewProduct($iddm, $idNguonGoc, $model, $name, $desc, $mainImg ,$status, $priority, $date) {
        $conn = connect();
        $name = validationInput($name);
        $model = validationInput($model);
        $desc = validationInput($desc);
        $sql = "INSERT INTO tbl_product (idCategory, idOrigin, modelID, name, description, img,status, priority, date) 
        VALUES ('$iddm', '$idNguonGoc','$model', '$name', '$desc','$mainImg', '$status', '$priority','$date')";
        $conn->exec($sql);
        return $conn->lastInsertId();
    }

    function addImgDesc($idProduct, $source) {
        $sql = "INSERT INTO tbl_image (idProduct, source) VALUES ('$idProduct', '$source')"; 
        insert($sql);
    }

    function updateProduct($iddm, $idNguonGoc, $model, $name, $desc, $mainImg ,$status, $id, $priority) {
        $name = validationInput($name);
        $desc = validationInput($desc);
        $desc = validationInput($desc);
        if($mainImg!= "") {
            $sql = "UPDATE tbl_product SET idCategory='".$iddm."', idOrigin = '".$idNguonGoc."',modelID='".$model."',
            name = '".$name."', description='".$desc."', img = '".$mainImg."', status='".$status."', priority = '".$priority."'
            WHERE id=$id";
        } else {
            $sql = "UPDATE tbl_product SET idCategory='".$iddm."', idOrigin = '".$idNguonGoc."',modelID='".$model."',
            name = '".$name."', description='".$desc."', status='".$status."', priority = '".$priority."'
            WHERE id=$id";
        }
        
        update($sql);
    }

    function deleteProduct($id) {
        $sql = "DELETE FROM tbl_product WHERE id=$id";
        delete($sql);
    }
    function deleteAllProduct() {
        $sql = "DELETE FROM tbl_product";
        delete($sql);
    }

    function deleteImgDescProduct($idProduct) {
        $sql = "DELETE FROM tbl_image WHERE idProduct=$idProduct";
        delete($sql);
    }
    function deleteAllImgDescProduct() {
        $sql = "DELETE FROM tbl_image";
        delete($sql);
    }
?>