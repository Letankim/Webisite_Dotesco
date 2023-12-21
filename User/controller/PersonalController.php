<?php
require_once PATH_ROOT_USER."/DAO/AccountDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_USER."/DAO/BillDao.php";
require_once PATH_ROOT_USER."/DAO/BillDetailDao.php";
class PersonalController {
    private static $accountDao;
    private static $originDao;
    private static $categoryDao;

    function __construct() {
        self::$accountDao = new AccountDao();
        self::$originDao = new OriginDao();
        self::$categoryDao = new CategoryDao();
    }

    public function userPersonal() {
        $billDao = new BillDao();
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $message = "";
        if(isset($_SESSION["idUser"])) {
            $id = $_SESSION["idUser"];
            $currentUser = self::$accountDao->getUserById($id);
            if(isset($_POST['change-password'])) {
                $isDone = $this->updatePassword($currentUser);
                if(!is_numeric($isDone) && !$isDone) {
                    $message = "Mật khẩu cũ không chính xác.";
                } else
                if($isDone >= 1) {
                    $message = "Cập nhật mật khẩu thành công.";
                } else {
                    $message = "Cập nhật mật khẩu thất bại.";
                }
            } else if(isset($_POST['change-information'])) {
                $isDone = $this->userUpdatePersonal($currentUser);
                if($isDone >= 1) {
                    $message = "Cập nhật thông tin thành công.";
                } else {
                    $message = "Cập nhật thông tin thất bại.";
                }
            }
            $billOfUser = $billDao->getBillByIdUser($id);
            include_once PATH_ROOT_USER."/personal.php";
        }
        else {
            header("Location: ?act=404");
        }
    }

    private function updatePassword($currentUser) {
        $oldPassword = $_POST['password'];
        $newPassword = $_POST['newPassword'];
        $isValidPassword = password_verify($oldPassword, $currentUser->getPassword());
        if($isValidPassword) {
            $isDone = self::$accountDao->updatePassword($currentUser->getId(), password_hash($newPassword, PASSWORD_DEFAULT));
            return $isDone;
        } else {
            return false;
        }
    }

    private function userUpdatePersonal($currentUser) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $currentUser->getId();
        $isDone = self::$accountDao->updatePersonal($id, $email, $phone);
        return $isDone;
    }

    public function detailBill() {
        if(isset($_SESSION["idUser"]) && isset($_GET['id']) && $_GET['id']) {
            $idUser = $_SESSION["idUser"];
            $billDao = new BillDao();
            $billDetailDao = new BillDetailDao();
            $allCategoryActive = self::$categoryDao->getAllActive();
            $allOriginActive = self::$originDao->getAllActive();
            include_once PATH_ROOT_USER."/components/navigation.php";
            $idBill = $_GET['id'];
            $currentBill = $billDao->getBillById($idBill, $idUser);
            if($currentBill != null) {
                $allBillDetail = $billDetailDao->getDetailBills($idBill);
                include_once PATH_ROOT_USER."/detail-order.php";
            } else {
                header("Location: ?act=404");
            }
        } else {
            header("Location: ?act=404");
        }

    }
}
?>