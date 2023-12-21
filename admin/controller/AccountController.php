<?php
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showAccount.php";
require_once PATH_ROOT."/model/Account.php";
class AccountController {
    protected static $accountDao;

    public function __construct()
    {
        self::$accountDao = new AccountDao();
    }

    public function adminAccount() {
        $allAccount = self::$accountDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/accountView.php";
    }

    public function adminAddNew() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $isExistAccount = self::$accountDao->getAccountByUsername($username);
        if($isExistAccount !=  null) {
            $message = 'Tên đăng nhập đã tồn tại';
            header("Location: index.php?page=account&status=fail&message=".urlencode($message));
        } else {
            $createAt = getCurrentTime();
            $account = new Account(null, $username, $password, $email, $phone,null, $createAt, null, $status, $role);
            $isDone = self::$accountDao->addNew($account);
            $type = "fail";
            if($isDone >= 1) {
                $type="success";
            }
            header("Location: index.php?page=account&status=".$type);
        }
    }

    public function adminFormUpdate() {
        $id = $_GET['id'];
        $currentAccount = self::$accountDao->getOneByID($id);
        if($currentAccount != null) {
            include_once PATH_ROOT_ADMIN."/view/editForm/editAccount.php";
        } else {
            header("Location: index.php?page=404");
        }
    }

    public function adminUpdate() {
        $id = $_POST['id'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $currentAccount = self::$accountDao->getOneByID($id);
        if($currentAccount != null) {
            if($password == "" || $password == null) {
                $password = $currentAccount->getPassword();
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
            $modifiedAt = getCurrentTime();
            $account = new Account($id, null, $password, $email, $phone,null, null, $modifiedAt, $status, $role);
            $isDone = self::$accountDao->update($account);
            $type = "fail";
            if($isDone >= 1) {
                $type="success";
            }
            header("Location: index.php?page=account&status=".$type);
        } else {
            header("Location: index.php?page=404");
        }
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $currentAccount = self::$accountDao->getOneByID($id);
        if($currentAccount != null) {
            $avatar = $currentAccount->getAvatar();
            if($avatar != null) {
                $target_dir = PATH_ROOT_ADMIN."/uploads/";
                unlink($target_dir.$avatar);
            }
            $isDone = self::$accountDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type="success";
            }
            header("Location: index.php?page=account&status=".$type);
        } else {
            header("Location: index.php?page=404");
        }
    }
}
?>