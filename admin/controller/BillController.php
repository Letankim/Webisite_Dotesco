<?php
require_once PATH_ROOT_ADMIN."/DAO/BillDao.php";
require_once PATH_ROOT_ADMIN."/DAO/BillDetailDao.php";
require_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT."/model/Bill.php";
require_once PATH_ROOT."/model/BillDetail.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showBill.php";
class BillController {
    private static $billDao;
    function __construct() {
        self::$billDao = new BillDao();
    }

    public function adminBill() {
        $allBill = self::$billDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/billView.php";
    }

    public function adminBillDetail() {
        $billDetailDao = new BillDetailDao();
        $idBill = $_GET['id'];
        $currentBill = self::$billDao->getOneBillById($idBill);
        $currentDetailBill = $billDetailDao->getDetailBill($idBill);
        include_once "./view/handleShow/showBillDetail.php";
    }

    public function adminUpdateStatus() {
        $idBill = $_POST['idBill'];
        $status = $_POST['status'];
        $note = $_POST['note'];
        $bill = new Bill();
        $bill->setId($idBill);
        $bill->setStatus($status);
        $bill->setNote($note);
        $isDone = self::$billDao->updateStatusBill($bill);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=ordered&status=".$type);
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $currentBill = self::$billDao->getOneBillById($id);
        if($currentBill != null) {
            $isDone = self::$billDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: index.php?page=ordered&status=".$type);
        } else {
            header("Location: index.php?page=404");
        }
    }

    public function adminPrintBill() {
        $billDetailDao = new BillDetailDao();
        $idBill = $_GET['id'];
        $currentBill = self::$billDao->getOneBillById($idBill);
        $currentDetailBill = $billDetailDao->getDetailBill($idBill);
        include_once PATH_ROOT_ADMIN."/view/printBill.php";
    }
}
?>