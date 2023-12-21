<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Introduction.php";
class IntroductionDao {
    private static $db;

    public function __construct()
    {
        self::$db = new ConnectionAdmin();
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

    function getAll() {
        $sql = "SELECT * FROM tbl_introduction ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $introductions = array();
        foreach ($resultSQL as $row) {
            $introductions[] = $this->introduction($row);
        }
        return $introductions;
    }

    function getOneByID($id) {
        $params = array(":id"=>$id);
        $sql = "SELECT * FROM tbl_introduction WHERE id=:id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->introduction($row);
        }
        return null;
    }

    function addNew($introduction) {
        $content = $introduction->getContent();
        $params = array(
            ":content"=>$content,
            ":status"=>$introduction->getStatus(),
            ":createAt"=>$introduction->getCreateAt(),
            ":createBy"=>$introduction->getCreateBy()
        );
        $sql = "INSERT INTO tbl_introduction (content, status, createAt, createBy) VALUES (:content, :status, :createAt, :createBy)";
        return self::$db->insert($sql, $params);
    }

    function update($introduction) {
        $content = $introduction->getContent();
        $params = array(
            ":id"=>$introduction->getId(),
            ":content"=>$content,
            ":status"=>$introduction->getStatus(),
            ":modifiedAt"=>$introduction->getModifiedAt(),
            ":modifiedBy"=>$introduction->getModifiedBy()
        );
        $sql = "UPDATE tbl_introduction SET content=:content, status=:status, modifiedAt=:modifiedAt, modifiedBy=:modifiedBy WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(':id' => $id);
        $sql = "DELETE FROM tbl_introduction WHERE id=:id";
        return self::$db->delete($sql, $params);
    }
    function deleteAll() {
        $sql = "DELETE FROM tbl_introduction";
        return self::$db->delete($sql);
    }
}

?>