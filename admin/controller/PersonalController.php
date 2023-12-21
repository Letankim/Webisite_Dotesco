<?php
require_once PATH_ROOT_ADMIN."/DAO/AccountDAO.php";
require_once PATH_ROOT."/model/Account.php";
require_once PATH_ROOT."/lib/Upload.php";
class PersonalController {
    protected static $accountDao;

    public function __construct()
    {
        self::$accountDao = new AccountDao();
    }

    public function adminPersonal() {
        $id = $_SESSION['idAdmin'];
        $currentAccount = self::$accountDao->getOneByID($id);
        if($currentAccount != null) {
            include_once PATH_ROOT_ADMIN."/view/personalView.php";
        } else {
            header("Location: index.php?page=404");
        }
    }

    public function adminUpdate() {
        $id = $_SESSION['idAdmin'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $avatar = $_FILES['avatar'];
        $currentAccount = self::$accountDao->getOneByID($id);
        if($currentAccount != null) {
            if($password == "" || $password == null) {
                $password = $currentAccount->getPassword();
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
            $target_dir = PATH_ROOT."/uploads/";
            $imgAvatar = uploadImage($target_dir, $avatar);
            if($imgAvatar == "") {
                $imgAvatar = $_POST['oldAvatar'];
            } else {
                $_SESSION['avatarAdmin'] = $imgAvatar;
                unlink($target_dir.$currentAccount->getAvatar());
            }
            $modifiedAt = getCurrentTime();
            $account = new Account($id, null, $password, $email, $phone,$imgAvatar, null, $modifiedAt, null, null);
            $isDone = self::$accountDao->updatePersonal($account);
            $type = "fail";
            if($isDone >= 1) {
                $type="success";
            }
            header("Location: index.php?status=".$type);
        } else {
            header("Location: index.php?page=404");
        }
    }
}
?>