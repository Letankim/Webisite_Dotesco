<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/District.php";
class DistrictDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function district($row) {
        $district_id = $row['district_id'];
        $province_id = $row['province_id'];
        $name = $row['name'];
        $district = new District($district_id, $province_id, $name);
        return $district;
    }

    function getAllByProvince($idProvince) {
        $params = array(":idProvince"=>$idProvince);
        $sql = "SELECT * FROM district WHERE province_id=:idProvince";
        $resultSQL = self::$db->getAll($sql, $params);
        $districts = array();
        foreach ($resultSQL as $row) {
            $districts[] = $this->district($row);
        }
        return $districts;
    }

    function getOneByID($idDistrict) {
        $params = array(":idDistrict"=>$idDistrict);
        $sql = "SELECT * FROM district WHERE district_id = :idDistrict";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->district($row);
        }
        return null;
    }
}
?>