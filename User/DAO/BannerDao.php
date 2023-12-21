<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Banner.php";
class BannerDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function banner($row) {
        $id = $row['id'];
        $img = $row['img'];
        $status = $row['status'];
        $priority = $row['priority'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $createBy = $row['createBy'];
        $modifiedBy  = $row['modifiedBy'];
        $banner = new Banner($id, $img, $status, $priority, $createAt, $modifiedAt, $createBy, $modifiedBy);
        return $banner;
    }

    function getActiveByNumber($number) {
        $sql = "SELECT * FROM tbl_banner WHERE status = 1 ORDER BY priority desc, id desc LIMIT ".$number."";
        $resultSQL = self::$db->getAll($sql);
        $banners = array();
        foreach($resultSQL as $row) {
            $banners[] = $this->banner($row);
        }
        return $banners;
    }
}
?>