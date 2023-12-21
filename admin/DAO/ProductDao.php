<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Product.php";
class ProductDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
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

    function getAll() {
        $sql = "SELECT * FROM tbl_product ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $products = array();
        foreach ($resultSQL as $row) {
            $products[] = $this->product($row);
        }
        return $products;
    }

    function filterByProduct($status, $priority) {
        $sql = "SELECT * FROM tbl_product WHERE status=$status and priority = $priority ORDER BY id DESC";
        return getAll($sql);
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_product WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->product($row);
        }
        return null;
    }

    function addNew($product) {
        $name = $product->getName();
        $model = $product->getModelID();
        $desc = $product->getDescription();
        $mainImg = $product->getImg();
        $params = array(
            ":name"=>$name,
            ":modelID"=>$model,
            ":description"=>$desc,
            ":img"=>$mainImg,
            ":idCategory"=>$product->getIdCategory(),
            ":idOrigin"=>$product->getIdOrigin(),
            ":status"=>$product->getStatus(),
            ":priority"=>$product->getPriority(),
            ":createAt"=>$product->getCreateAt(),
            ":createBy"=>$product->getCreateBy(),
            ":price"=>$product->getPrice(),
            ":priceSale"=>$product->getPriceSale()
        );
        $sql = "INSERT INTO tbl_product (idCategory, idOrigin, modelID, name, description, img,status, priority, createAt, createBy, price, priceSale) 
        VALUES (:idCategory, :idOrigin,:modelID,:name, :description,:img,:status,:priority,:createAt, :createBy,:price, :priceSale)";
        return self::$db->insertProduct($sql, $params);
    }
    function update($product) {
        $name = $product->getName();
        $model = $product->getModelID();
        $desc = $product->getDescription();
        $mainImg = $product->getImg();
        $params = array(
            ":id"=>$product->getId(),
            ":name"=>$name,
            ":modelID"=>$model,
            ":description"=>$desc,
            ":img"=>$mainImg,
            ":idCategory"=>$product->getIdCategory(),
            ":idOrigin"=>$product->getIdOrigin(),
            ":status"=>$product->getStatus(),
            ":priority"=>$product->getPriority(),
            ":modifiedAt"=>$product->getModifiedAt(),
            ":modifiedBy"=>$product->getModifiedBy(),
            ":price"=>$product->getPrice(),
            ":priceSale"=>$product->getPriceSale()
        );
        $sql = "UPDATE tbl_product SET idCategory=:idCategory, 
        idOrigin=:idOrigin,modelID=:modelID,name=:name, 
        description=:description, img=:img,status=:status, 
        priority=:priority, price=:price, priceSale=:priceSale,
        modifiedAt=:modifiedAt, modifiedBy=:modifiedBy WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_product WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
    function deleteAll() {
        $sql = "DELETE FROM tbl_product";
        return self::$db->delete($sql);
    }
}
?>