<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Banner.php";
class BannerDao {
    private static $db;

    public function __construct()
    {
        self::$db = new ConnectionAdmin();
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

    function getAll() {
        $sql = "SELECT * FROM tbl_banner ORDER BY priority desc, id DESC";
        $resultSQL = self::$db->getAll($sql);
        $banners = array();
        foreach ($resultSQL as $row) {
            $banners[] = $this->banner($row);
        }
        return $banners;
    }

    function filterByBanner($status, $priority) {
        $sql = "SELECT * FROM tbl_banner WHERE status=$status AND priority = $priority ORDER BY id DESC";
        return getAll($sql);
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_banner WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->banner($row);
        }
        return null;
    }

    function addNew($banner) {
        $params = array(
            ":img"=>$banner->getImg(),
            ":status"=>$banner->getStatus(),
            ":priority"=>$banner->getPriority(),
            ":createAt"=>$banner->getCreateAt(),
            ":createBy"=>$banner->getCreateBy()
        );
        $sql = "INSERT INTO tbl_banner (img, status, priority, createAt, createBy) 
        VALUES (:img, :status, :priority, :createAt, :createBy)";
        return self::$db->insert($sql, $params);
    }

    function update($banner) {
        $params = array(
            ":id"=>$banner->getId(),
            ":img"=>$banner->getImg(),
            ":status"=>$banner->getStatus(),
            ":priority"=>$banner->getPriority(),
            ":modifiedAt"=>$banner->getModifiedAt(),
            ":modifiedBy"=>$banner->getModifiedBy()
        );
        $sql = "UPDATE tbl_banner SET img=:img, status=:status,priority=:priority
        ,modifiedAt=:modifiedAt, modifiedBy=:modifiedBy WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_banner WHERE id=:id";
        return self::$db->delete($sql, $params);
    }

    function deleteAll() {
        $sql = "DELETE FROM tbl_banner";
        return self::$db->delete($sql);
    }
}
?>