<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Statistical.php";
class StatisticalDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
    }

    private function statistical($row) {
        $id  = $row['id'];
        $date = $row['date'];
        $soluongdonhang = $row['soluongdonhang'];
        $doanhthu = $row['doanhthu'];
        $soluongsanpham = $row['soluongsanpham'];
        $statistical = new Statistical($id, $date, $soluongdonhang, $doanhthu, $soluongsanpham);
        return $statistical;
    }

    function getAllThongKe() {
        $sql = "SELECT DISTINCT date FROM tbl_thongke ORDER BY date DESC";
        $resultSQL = self::$db->getAll($sql);
        $results = array();
        foreach ($resultSQL as $row) {
            $results[] = $this->statistical($row);
        }
        return $results;
    }

    function getAllThongByDate($form, $to) {
        $params = array(
            ":form" => $form,
            ":to" => $to
        );
        $sql = "SELECT * FROM tbl_thongke WHERE date BETWEEN :form AND :to";
        $resultSQL = self::$db->getAll($sql, $params);
        $results = array();
        foreach ($resultSQL as $row) {
            $results[] = $this->statistical($row);
        }
        return $results;
    }
}
?>