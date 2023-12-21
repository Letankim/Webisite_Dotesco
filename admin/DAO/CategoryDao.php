<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Category.php";
class CategoryDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
    }

    private function category($row) {
        $id = $row['id'];
        $name = $row['name'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $createBy = $row['createBy'];
        $modifiedBy = $row['modifiedBy'];
        $status = $row['status'];
        $category = new Category($id, $name, $createAt, $modifiedAt, $createBy, $modifiedBy, $status);
        return $category;
    }

    function getAll() {
        $sql = "SELECT * FROM tbl_category ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $categories = array();
        foreach ($resultSQL as $row) {
            $categories[] = $this->category($row);
        }
        return $categories;
    }

    function filterByCategory($status) {
        $sql = "SELECT * FROM tbl_category WHERE status=$status ORDER BY id DESC";
        return getAll($sql);
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_category WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->category($row);
        }
        return null;
    }

    function getNumberOfProductByCategory($idCategory) {
        $params = array(":idCategory"=>$idCategory);
        $sql = "SELECT * FROM tbl_product WHERE idCategory = :idCategory";
        return count(self::$db->getAll($sql, $params));
    }

    function addNew($category) {
        $name = $category->getName();
        $params = array(
            ":name"=>$name,
            ":createAt"=>$category->getCreateAt(),
            ":createBy"=>$category->getCreateBy(),
            ":status"=>$category->getStatus()
        );
        $sql = "INSERT INTO tbl_category (name, status, createAt, createBy) VALUES (:name, :status, :createAt, :createBy)";
        return self::$db->insert($sql, $params);
    }

    function update($category) {
        $name = $category->getName();
        $params = array(
            ":id"=>$category->getId(),
            ":name"=>$name,
            ":modifiedAt"=>$category->getModifiedAt(),
            ":modifiedBy"=>$category->getModifiedBy(),
            ":status"=>$category->getStatus()
        );
        $sql = "UPDATE tbl_category SET name=:name, status=:status, modifiedBy=:modifiedBy, modifiedAt=:modifiedAt WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_category WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
    
    function deleteAll() {
        $sql = "DELETE FROM tbl_category";
        return self::$db->delete($sql);
    }
}
?>