<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/BillDetail.php";
class BillDetailDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
    }

    private function billDetail($row) {
        $id = $row['id'];
        $idProduct = $row['idProduct'];
        $model = $row['model'];
        $name = $row['name'];
        $idBill = $row['idBill'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $total = $row['total'];
        $billDetail = new BillDetail($id, $idProduct, $model, $name, $idBill, $quantity, $price, $total);
        return $billDetail;
    }

    function getDetailBill($idBill) {
        $params = array('idBill' => $idBill);
        $sql = "SELECT * FROM tbl_bill_details WHERE idBill = :idBill";
        $resultSQL = self::$db->getAll($sql, $params);
        $billDetails = array();
        foreach ($resultSQL as $row) {
            $billDetails[] = $this->billDetail($row);
        }
        return $billDetails;
    }
}

?>