<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Bill.php";
class BillDao {
    private static $db;
    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function bill($row) {
        $id = $row['id'];
        $name  = $row['name'];
        $address = $row['address'];
        $detailAddress = $row['detailAddress'];
        $phone = $row['phone'];
        $email = $row['email'];
        $idUser = $row['idUser'];
        $createAt = $row['createAt'];
        $modifiedAt = $row['modifiedAt'];
        $modifiedBy = $row['modifiedBy'];
        $status = $row['status'];
        $payment = $row['payment'];
        $transactionCode = $row['transactionCode'];
        $total = $row['total'];
        $note = $row['note'];
        $bill = new Bill($id, $name, $address, $detailAddress, $phone, $email,$idUser, $createAt, $modifiedAt, $modifiedBy,$status, $payment, $transactionCode,$total, $note);
        return $bill;
    }

    function addToBill($bill) {
        $params = array(
            ":name"=>$bill->getName(),
            ":address"=>$bill->getAddress(),
            ":phone" => $bill->getPhone(),
            ":email" => $bill->getEmail(),
            ":detailAddress"=>$bill->getDetailAddress(),
            ":createAt" =>$bill->getCreateAt(),
            ":total" => $bill->getTotal(),
            ":idUser" => $bill->getIdUser(),
            ":payment" => $bill->getPayment(),
            ":transactionCode"=>$bill->getTransactionCode()
        );
        $sql = "INSERT INTO tbl_bill (name, address, phone, email, detailAddress, createAt, total, idUser, payment, transactionCode) 
        VALUES (:name, :address, :phone,:email ,:detailAddress, :createAt, :total, :idUser, :payment, :transactionCode)";
        return self::$db->insertBill($sql, $params);
    }

    function addToDetailBill($idProduct, $idBill, $numberOfProduct, $total, $price, $name, $model) {
        $params = array(
            ":idProduct" => $idProduct,
            ":idBill" => $idBill,
            ":quantity" => $numberOfProduct,
            ":total" => $total,
            ":price" => $price,
            ":name" => $name,
            ":model" => $model
        );
        $sql = "INSERT INTO tbl_bill_details (idProduct, idBill, quantity, total, price, name, model) 
        VALUES (:idProduct, :idBill, :quantity, :total, :price, :name, :model)";
        return insert($sql, $params);
    }

    function getBillByIdUser($idUser) {
        $params = array(":idUser"=>$idUser);
        $sql = "SELECT * FROM tbl_bill WHERE idUser =:idUser ORDER BY id desc";
        $resultSQL = self::$db->getAll($sql, $params);
        $bills = array();
        foreach($resultSQL as $row) {
            $bills[] = $this->bill($row);
        }
        return $bills;
    }

    function getBillById($id, $idUser) {
        $params = array(
            ":id"=>$id,
            ":idUser"=>$idUser
        );
        $sql = "SELECT * FROM tbl_bill WHERE id = :id AND idUser=:idUser ORDER BY id desc";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->bill($row);
        }
        return null;
    }
}
?>