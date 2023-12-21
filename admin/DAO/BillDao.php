<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Bill.php";
require_once PATH_ROOT."/model/Statistical.php";
class BillDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
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

    private function statistical($row) {
        $id  = $row['id'];
        $date = $row['date'];
        $soluongdonhang = $row['soluongdonhang'];
        $doanhthu = $row['doanhthu'];
        $soluongsanpham = $row['soluongsanpham'];
        $statistical = new Statistical($id, $date, $soluongdonhang, $doanhthu, $soluongsanpham);
        return $statistical;
    }

    function getAll() {
        $sql = "SELECT * FROM tbl_bill ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql);
        $bills = array();
        foreach ($resultSQL as $row) {
            $bills[]  = $this->bill($row);
        }
        return $bills;
    }
    function getBillByStatus($status) {
        $params = array(':status' => $status);
        $sql = "SELECT * FROM tbl_bill WHERE status = :status ORDER BY id DESC";
        $resultSQL = self::$db->getAll($sql, $params);
        $bills = array();
        foreach ($resultSQL as $row) {
            $bills[]  = $this->bill($row);
        }
        return $bills;
    }

    function getOneBillById($idBill) {
        $params = array(':id' => $idBill);
        $sql = "SELECT * FROM tbl_bill WHERE id = :id";
        $row = self::$db->get_one($sql, $params);
        if($row) {
            return $this->bill($row);
        }
        return null;
    }

    function updateStatusBill($bill) {
        $params = array(
            ":status"=>$bill->getStatus(),
            ":id"=>$bill->getId(),
            ":note"=>$bill->getNote()
        );
        $paramsCurrentBill =  array(":id"=>$bill->getId());
        $sqlGetCurrentBill = "SELECT * FROM tbl_bill WHERE id =:id";
        $rowCurrentBill = self::$db->get_one($sqlGetCurrentBill, $paramsCurrentBill);
        $currentBill = $rowCurrentBill ? $this->bill($rowCurrentBill) : null;
        if($currentBill != null && $bill->getStatus() == 4 && $currentBill->getStatus() != 4) {
            $dateOrder = $currentBill->getCreateAt();
            $totalBill = $currentBill->getTotal();
            $paramsDate = array(":dateOrder"=>$dateOrder);
            $sqlSelectStatistic = "SELECT * FROM tbl_thongke WHERE DATE(date) = DATE(:dateOrder)";
            $resultStatic = self::$db->get_one($sqlSelectStatistic, $paramsDate);
            $static = $resultStatic ? $this->statistical($resultStatic) : null;
            if($static == null) {
                $sqlAddNew = "INSERT INTO tbl_thongke (date, soluongdonhang, doanhthu, soluongsanpham) VALUES
                ('$dateOrder', 1, '$totalBill', 1)";
                $isDone = self::$db->insert($sqlAddNew);
            } else {
                $doanhthuHienTai = $static->getDoanhthu();
                $soLuongSanPham = $static->getSoluongsanpham();
                $soLuongDonHang = $static->getSoluongdonhang();
                $lastDoanhThu = $doanhthuHienTai + $currentBill->getTotal();
                $sqlUpdate = "UPDATE tbl_thongke SET doanhthu = ".$lastDoanhThu.", 
                soluongdonhang=".($soLuongDonHang + 1)." where id=".$static->getId()."";
                $isDone = self::$db->update($sqlUpdate);
            }
        }
        $sql = "UPDATE tbl_bill SET status = :status, note=:note WHERE id=:id";
        return self::$db->update($sql, $params);
    }

    function delete($id) {
        $params = array(":id"=>$id);
        $sql = "DELETE FROM tbl_bill WHERE id = :id";
        return self::$db->delete($sql, $params);
    }
}
?>