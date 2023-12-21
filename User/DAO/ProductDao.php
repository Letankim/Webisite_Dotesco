<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Product.php";
class ProductDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function product($row) {
        $id = $row['id'];
        $modelID = $row['modelID'];
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $priceSale = $row['priceSale'];
        $idCategory = $row['idCategory'];
        $idOrigin = $row['idOrigin'];
        $createAt = $row['createAt'];
        $createBy = $row['createBy'];
        $modifiedAt = $row['modifiedAt'];
        $modifiedBy = $row['modifiedBy'];
        $status = $row['status'];
        $priority = $row['priority'];
        $view = $row['view'];
        $img = $row['img'];
        $product = new Product($id, $modelID, $name, $description, $price, $priceSale, $idCategory, $idOrigin, $createAt, $modifiedAt, $createBy, $modifiedBy, $status, $priority, $view, $img);
        return $product;
    }   

    function getNumberOfProductActive() {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.status=1 and C.status = 1 AND O.status = 1 ORDER BY P.id desc";
        $resultSQL = self::$db->getAll($sql);
        return count($resultSQL);
    }

    function getAllActiveByNumber($type, $number) {
        $params = array(
            ":priority" => $type
        );
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.status=1 and C.status = 1 AND P.priority=:priority AND O.status = 1 ORDER BY P.id desc LIMIT ".$number."";
        $resultSQl = self::$db->getAll($sql, $params);
        $products = array();
        foreach ($resultSQl as $row) {
            $products[] = $this->product($row);
        }
        return $products;
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

    function getProductByCategoryLimit($categoryID) {
        $params = array(":categoryID"=>$categoryID);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = :categoryID AND P.status=1 AND O.status = 1 ORDER BY P.id desc LIMIT 4";
        $resultSQl = self::$db->getAll($sql, $params);
        $products = array();
        foreach ($resultSQl as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }

    function getNumberOfProductByCategory($categoryID) {
        $params = array(":categoryID"=>$categoryID);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = :categoryID AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
        $resultSQl = self::$db->getAll($sql, $params);
        return count($resultSQl);
    }

    function getNumberOfProductByOrigin($originID) {
        $params = array(":originID"=>$originID);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idOrigin = :originID AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
        $resultSQl = self::$db->getAll($sql, $params);
        return count($resultSQl);
    }
    
    function getProductRelated($categoryID, $idProduct) {
        $params = array(
            ":categoryID"=>$categoryID,
            ":idProduct"=>$idProduct
        );
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = :categoryID AND P.id <> :idProduct AND P.status=1
        AND O.status = 1 AND C.status = 1 ORDER BY P.id desc LIMIT 4";
        $resultSQL = self::$db->getAll($sql, $params);
        $products = array();
        foreach ($resultSQL as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }

    function getProductByCategoryInPage($categoryID, $indexStart, $count) {
        $params = array(":categoryID"=>$categoryID);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idCategory = :categoryID AND P.status=1 AND O.status = 1
        AND C.status = 1 ORDER BY P.id desc LIMIT $indexStart, $count";
        $resultSQL = self::$db->getAll($sql, $params);
        $products = array();
        foreach ($resultSQL as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }

    function getProductByOriginInPage($originID, $indexStart, $count) {
        $params = array(":originID"=>$originID);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.idOrigin = :originID AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc LIMIT $indexStart, $count";
        $resultSQL = self::$db->getAll($sql, $params);
        $products = array();
        foreach ($resultSQL as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.id = :id AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->product($row);
        }
        return null;
    }

    function searchProductByKeyword($keyword) {
        $keyword = '%' . $keyword . '%'; 
        $params = array(":keyword"=>$keyword);
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.name LIKE :keyword AND P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc";
    
        $resultSQL = self::$db->getAll($sql, $params);
        $products = array();
        foreach ($resultSQL as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }
    

    function getProductInPage($indexStart, $count) {
        $sql = "SELECT P.* FROM tbl_product as P 
        join tbl_category as C on P.idCategory = C.id
        join tbl_origin as O on P.idOrigin = O.id
        WHERE P.status=1 AND O.status = 1 AND C.status = 1 ORDER BY P.id desc LIMIT $indexStart, $count";
        $resultSQl = self::$db->getAll($sql);
        $products = array();
        foreach ($resultSQl as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }

    function updateView($id, $view) {
        $params = array(
            ":id"=>$id,
            ":view"=>$view
        );
        $sql = "UPDATE tbl_product SET view = :view WHERE id = :id";
        return self::$db->update($sql,$params);
    }
}
?>