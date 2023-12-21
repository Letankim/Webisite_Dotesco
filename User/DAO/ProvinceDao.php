<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Province.php";
class ProvinceDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function province($row) {
        $province_id = $row['province_id'];
        $name = $row['name'];
        $province = new Province($province_id, $name);
        return $province;
    }

    function getAll() {
        $sql = "SELECT * FROM province ORDER BY name ASC";
        $resultSQL = self::$db->getAll($sql);
        $provinces = array();
        foreach ($resultSQL as $row) {
            $provinces[] = $this->province($row);
        }
        return $provinces;
    }

    function getOneByID($idProvince) {
        $params = array(":idProvince"=>$idProvince);
        $sql = "SELECT * FROM province WHERE province_id = :idProvince";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->province($row);
        }
        return null;
    }
}
?>