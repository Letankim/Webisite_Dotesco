<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Category.php";
class CategoryDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
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

    function getAllActive() {
        $sql = "SELECT * FROM tbl_category WHERE status=1 ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $categories = array();
        foreach ($resultSQL as $row) {
            $categories[] = $this->category($row);
        }
        return $categories;
    }

    function getCategoryNewLimit($number) {
        $sql = "SELECT C.id FROM tbl_category as C join tbl_product as P 
        on C.id = P.idCategory
        WHERE C.status=1 and P.status = 1
        GROUP BY C.id HAVING count(P.id) > 0
        ORDER BY id desc LIMIT ".$number."";
        $resultSQL = self::$db->getAll($sql);
        $categories = array();
        foreach ($resultSQL as $row) {
            $categories[] = $row['id'];
        }
        return $categories;
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_category WHERE id =:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->category($row);
        }
        return null;
    }

    function getCategoryByNumber($number) {
        $sql = "SELECT * from tbl_category where status=1 LIMIT ".$number."";
        $resultSQL = self::$db->getAll($sql);
        $categories = array();
        foreach ($resultSQL as $row) {
            $categories[] = $this->category($row);
        }
        return $categories;
    }
}
?>