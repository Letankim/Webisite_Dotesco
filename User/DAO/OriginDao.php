<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Origin.php";
class OriginDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
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

    function getAllActive() {
        $sql = "SELECT * FROM tbl_origin WHERE status=1 ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $origins = array();
        foreach ($resultSQL as $row) {
            $origins[] = $this->origin($row);
        }
        return $origins;
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_origin WHERE status=1 AND id=:id";
        $row =  self::$db->get_one($sql, $params);
        if($row) {
            return $this->origin($row);
        }
        return null;
    }
    
}

?>