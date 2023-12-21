<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Company.php";
class CompanyDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function company($row) {
        $id  = $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $phone = $row['phone'];
        $email = $row['email'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $createBy = $row['createBy'];
        $modifiedBy = $row['modifiedBy'];
        $status = $row['status'];
        $company = new Company($id, $name, $address, $phone, $email, $createAt, $modifiedAt, $createBy, $modifiedBy, $status);
        return $company;
    }

    function getCompanyActive() {
        $sql = "SELECT * FROM tbl_company WHERE status=1 ORDER BY id DESC LIMIT 1";
        $row = self::$db->get_one($sql);
        if($row) {
            return $this->company($row);
        }
        return null;
    }
}
?>