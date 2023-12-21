<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Introduction.php";
class IntroductionDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function introduction($row) {
        $id = $row['id'];
        $content = $row['content'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $createBy = $row['createBy'];
        $modifiedBy = $row['modifiedBy'];
        $status = $row['status'];
        $introduction = new Introduction($id, $content, $createAt, $modifiedAt, $createBy, $modifiedBy, $status);
        return $introduction;
    }

    function getOne() {
        $sql = "SELECT * FROM tbl_introduction WHERE status = 1 ORDER BY id desc LIMIT 1";
        $row = self::$db->get_one($sql);
        if($row) {
            return $this->introduction($row);
        }
        return null;
    }
}
?>