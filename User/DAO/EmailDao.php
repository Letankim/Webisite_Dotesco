<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Email.php";
class EmailDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
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

    function getEmailReply() {
        $sql = "SELECT * FROM tbl_email WHERE status=1 ORDER BY id DESC LIMIT 1";
        $row = self::$db->get_one($sql);
        if($row) {
            return $this->email($row);
        }
        return null;
    }
}
?>