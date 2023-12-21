<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Company.php";
class CompanyDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionAdmin();
    }

    function getAll() {
        $sql = "SELECT * FROM tbl_company ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $company = array();
        foreach ($resultSQL as $row) {
            $company[] = $this->company($row);
        }
        return $company;
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

    function filterByStatus($status) {
        $params = array(':status'=>$status);
        $sql = "SELECT * FROM tbl_company WHERE status=:status ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql, $params);
        $company = array();
        foreach ($resultSQL as $row) {
            $company[] = $this->company($row);
        }
        return $company;
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_company WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        return $this->company($row);
    }

    function addNew($company) {
        $name = $company->getName();
        $address = $company->getAddress();
        $email = $company->getEmail();
        $phone = $company->getPhone();
        $params = array(
            ":name"=> $name,
            ":address"=>$address,
            ":email"=>$email,
            ":phone"=>$phone,
            ":status"=>$company->getStatus(),
            ":createAt"=>$company->getCreateAt(),
            ":createBy"=>$company->getCreateBy()
        );
        $sql = "INSERT INTO tbl_company (name, address,email,phone,status, createAt, createBy) 
        VALUES (:name, :address, :email, :phone, :status,:createAt, :createBy)";
        return self::$db->insert($sql, $params);
    }

    function update($company) {
        $name = $company->getName();
        $address = $company->getAddress();
        $email = $company->getEmail();
        $phone = $company->getPhone();
        $params = array(
            ":id" => $company->getId(),
            ":name"=> $name,
            ":address"=>$address,
            ":email"=>$email,
            ":phone"=>$phone,
            ":status"=>$company->getStatus(),
            ":modifiedAt"=>$company->getModifiedAt(),
            ":modifiedBy"=>$company->getModifiedBy()
        );
        $sql = "UPDATE tbl_company SET name=:name, status=:status, 
        address = :address, email = :email, phone=:phone, modifiedAt=:modifiedAt, modifiedBy=:modifiedBy WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_company WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
    
    function deleteAll() {
        $sql = "DELETE FROM tbl_company";
        return self::$db->delete($sql);
    }
}
?>