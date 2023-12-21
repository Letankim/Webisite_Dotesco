<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Origin.php";
class OriginDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
    }

    private function origin($row) {
        $id = $row['id'];
        $name = $row['name'];
        $country = $row['country'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $createBy = $row['createBy'];
        $modifiedBy = $row['modifiedBy'];
        $status = $row['status'];
        $origin = new Origin($id, $name, $country, $createAt, $modifiedAt, $createBy, $modifiedBy, $status);
        return $origin;
    }

    function getAll() {
        $sql = "SELECT * FROM tbl_origin ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $origins = array();
        foreach ($resultSQL as $row) {
            $origins[] = $this->origin($row);
        }
        return $origins;
    }

    function getNumberOfProductByOrigin($idOrigin) {
        $params = array(":idOrigin"=>$idOrigin);
        $sql = "SELECT * FROM tbl_product WHERE idOrigin=:idOrigin";
        return count(self::$db->getAll($sql, $params));
    }

    function filterByNguonGoc($status) {
        $sql = "SELECT * FROM tbl_origin WHERE status=$status ORDER BY id DESC";
        return getAll($sql);
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_origin WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->origin($row);
        }
        return null;
    }

    function addNew($origin) {
        $name = $origin->getName();
        $country = $origin->getCountry();
        $params = array(
            ":name"=>$name,
            ":country"=>$country,
            ":createAt"=>$origin->getCreateAt(),
            ":createBy"=>$origin->getCreateBy(),
            ":status"=>$origin->getStatus()
        );
        $sql = "INSERT INTO tbl_origin (name,country,status, createAt, createBy) VALUES
         (:name, :country,:status, :createAt, :createBy)";
        return self::$db->insert($sql, $params);
    }

    function update($origin) {
        $name = $origin->getName();
        $country = $origin->getCountry();
        $params = array(
            ":id"=>$origin->getId(),
            ":name"=>$name,
            ":country"=>$country,
            ":modifiedAt"=>$origin->getModifiedAt(),
            ":modifiedBy"=>$origin->getModifiedBy(),
            ":status"=>$origin->getStatus()
        );
        $sql = "UPDATE tbl_origin SET name=:name, country=:country
        ,status=:status, modifiedAt=:modifiedAt, modifiedBy=:modifiedBy WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_origin WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
    function deleteAll() {
        $sql = "DELETE FROM tbl_origin";
        return self::$db->delete($sql);
    }
}
?>