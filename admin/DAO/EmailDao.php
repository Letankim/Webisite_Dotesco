<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Email.php";
class EmailDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
    }
    private function email($row) {
        $id = $row['id'];
        $email = $row['email'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $createBy = $row['createBy'];
        $modifiedBy = $row['modifiedBy'];
        $status = $row['status'];
        $email = new Email($id, $email, $createAt, $modifiedAt, $createBy, $modifiedBy, $status);
        return $email;
    }
    function getAll() {
        $sql = "SELECT * FROM tbl_email ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $emails = array();
        foreach ($resultSQL as $row) {
            $emails[] = $this->email($row);
        }
        return $emails;
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_email WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->email($row);
        }
        return null;
    }

    function addNew($email) {
        $emailReply = $email->getEmail();
        $params = array(
            ":email"=>$emailReply,
            ":createAt"=>$email->getCreateAt(),
            ":createBy"=>$email->getCreateBy(),
            ":status"=>$email->getStatus()
        );
        $sql = "INSERT INTO tbl_email (email, status, createAt, createBy) VALUES (:email, :status, :createAt, :createBy)";
        return self::$db->insert($sql, $params);
    }

    function update($email) {
        $emailReply = $email->getEmail();
        $params = array(
            ":id"=>$email->getId(),
            ":email"=>$emailReply,
            ":modifiedAt"=>$email->getModifiedAt(),
            ":modifiedBy"=>$email->getModifiedBy(),
            ":status"=>$email->getStatus()
        );
        $sql = "UPDATE tbl_email SET email=:email, status=:status, modifiedAt=:modifiedAt, modifiedBy=:modifiedBy WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_email WHERE id=:id AND 
        (((SELECT count(*) FROM tbl_email WHERE status = 1) > 1) OR
        (SELECT count(*) FROM tbl_email WHERE status = 1) = 1 AND status = 0) ";
        return self::$db->delete($sql, $params);
    }
}
?>