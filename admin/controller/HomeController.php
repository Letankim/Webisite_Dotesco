<?php
require_once PATH_ROOT_ADMIN."/DAO/CategoryDao.php";
require_once PATH_ROOT_ADMIN."/DAO/OriginDao.php";
require_once PATH_ROOT_ADMIN."/DAO/ProductDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/DAO/BillDao.php";
class HomeController {
    public function adminHome() {
        $categoryDao = new CategoryDao();
        $originDao = new OriginDao();
        $productDao = new ProductDao();
        $accountDao = new AccountDao();
        $billDao = new BillDao();
        $allCategory = $categoryDao->getAll();
        $allOrigin = $originDao->getAll();
        $allProduct = $productDao->getAll();
        $allAccount = $accountDao->getAll();
        $allNewBill = $billDao->getBillByStatus(0);
        $allBillAccept = $billDao->getBillByStatus(1);
        $allBillPrepare = $billDao->getBillByStatus(2);
        $allBillTransfer = $billDao->getBillByStatus(3);
        $allBillFinish = $billDao->getBillByStatus(4);
        $allBillCancel = $billDao->getBillByStatus(-1);
        include_once PATH_ROOT_ADMIN."/view/mainView.php";
    }
}
?>