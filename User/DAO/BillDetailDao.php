<?php
require_once PATH_ROOT_APP."/model/BillDetail.php";
class BillDetailDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
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

    function addToDetailBill($billDetail) {
        $params = array(
            ":idProduct" => $billDetail->getIdProduct(),
            ":idBill" => $billDetail->getIdBill(),
            ":quantity" => $billDetail->getQuantity(),
            ":total" => $billDetail->getTotal(),
            ":price" => $billDetail->getPrice(),
            ":name" => $billDetail->getName(),
            ":model" => $billDetail->getModel()
        );
        $sql = "INSERT INTO tbl_bill_details (idProduct, idBill, quantity, total, price, name, model) 
        VALUES (:idProduct, :idBill, :quantity, :total, :price, :name, :model)";
        return self::$db->insert($sql, $params);
    }

    function getDetailBills($idBill) {
        $params = array(":idBill"=>$idBill);
        $sql = "SELECT * FROM tbl_bill_details WHERE idBill = :idBill";
        $resultSQL = self::$db->getAll($sql, $params);
        $bills = array();
        foreach($resultSQL as $row) {
            $bills[] = $this->billDetail($row);
        }
        return $bills;
    }

}
?>