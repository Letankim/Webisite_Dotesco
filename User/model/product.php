<?php
    function getAllProductActive() {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.status=1 and C.status = 1 AND O.status = 1 ORDER BY P.id desc";
        return getAll($sql);
    }

    function getAllProductActiveHome() {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.status=1 and C.status = 1 AND P.priority <> 1 AND O.status = 1 ORDER BY P.id desc LIMIT 12";
        return getAll($sql);
    }

    function getAllProductActiveFeatured() {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.status=1 and C.status = 1 AND P.priority = 1 AND O.status = 1 ORDER BY P.priority desc, P.id desc LIMIT 12";
        return getAll($sql);
    }

    function selectAllProductByCategoryLimit($categoryID) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = $categoryID AND P.status=1 AND O.status = 1 ORDER BY P.id desc LIMIT 4";
        return getAll($sql);
    }

    function selectAllProductByCategory($categoryID) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = $categoryID AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
        return getAll($sql);
    }
    
    function selectAllProductRelated($categoryID, $idProduct) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = $categoryID AND P.id <> $idProduct AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc LIMIT 4";
        return getAll($sql);
    }

    function selectAllProductByOrigin($originID) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idOrigin = $originID AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
        return getAll($sql);
    }

    function selectAllProductByCategoryInPage($categoryID, $indexStart, $count) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = $categoryID AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function selectAllProductByOriginInPage($originID, $indexStart, $count) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idOrigin = $originID AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function getProductByID($id) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.id = $id AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
        return getByID($sql);
    }

    function getImageDescProduct($idProduct) {
        $sql = "SELECT * FROM tbl_image WHERE idProduct = $idProduct";
        return getAll($sql);
    }

    function searchProductByKeyword($keyword) {
        $keyword = validationInput($keyword);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.name LIKE '%$keyword%' AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
        return getAll($sql);
    }

    function devicePageProduct($indexStart, $count) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function updateView($id) {
        $currentProduct = getByID("SELECT view FROM tbl_product WHERE id = $id");
        $currentProduct = $currentProduct['view'] + 1;
        $sql = "UPDATE tbl_product SET view = '$currentProduct'";
        update($sql);
    }
?>