<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Ward.php";
class WardDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function ward($row) {
        $ward_id = $row['wards_id'];
        $district_id = $row['district_id'];
        $name = $row['name'];
        $ward = new Ward($ward_id, $district_id, $name);
        return $ward;
    }

    function getAllByDistrict($idDistrict) {
        $params = array(":idDistrict"=>$idDistrict);
        $sql = "SELECT * FROM wards WHERE district_id =:idDistrict";
        $resultSQL = self::$db->getAll($sql, $params);
        $wards = array();
        foreach ($resultSQL as $row) {
            $wards[] = $this->ward($row);
        }
        return $wards;
    }

    function getOneByID($idWards) {
        $params = array(":idWards"=>$idWards);
        $sql = "SELECT * FROM wards WHERE wards_id = :idWards";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->ward($row);
        }
        return null;
    }
}
?>