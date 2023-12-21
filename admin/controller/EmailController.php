<?php
require_once PATH_ROOT_ADMIN."/DAO/EmailDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showEmail.php";
require_once PATH_ROOT."/model/Email.php";
class EmailController {
    private static $emailDao;
    function __construct() {
        self::$emailDao = new EmailDao();
    }

    public function adminEmail() {
        $allEmail = self::$emailDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/replyEmailView.php";
    }

    public function adminAddNew() {
        $email = $_POST['email'];
        $status = $_POST['status'];
        $createAt = getCurrentTime();
        $createBy = $_SESSION['idAdmin'];
        $email = new Email(null, $email, $createAt, null, $createBy, null, $status);
        $isDone = self::$emailDao->addNew($email);
        $type = "fail";
        if($isDone) {
            $type = "success";
        }
        header("Location: ?page=replyEmail&status=".$type);
    }

    public function adminFormUpdate() {
        $id = $_GET['id'];
        $currentEmail = self::$emailDao->getOneByID($id);
        if($currentEmail != null) {
            include_once PATH_ROOT_ADMIN."/view/editForm/editEmail.php";
        } else {
            header("Location: index.php?page=404");
        }
    }
    
    public function adminUpdate() {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $modifiedAt = getCurrentTime();
        $modifiedBy = $_SESSION['idAdmin'];
        $email = new Email($id, $email, null, $modifiedAt, null, $modifiedBy, $status);
        $isDone = self::$emailDao->update($email);
        $type = "fail";
        if($isDone) {
            $type = "success";
        }
        header("Location: ?page=replyEmail&status=".$type);
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $currentEmail = self::$emailDao->getOneByID($id);
        if($currentEmail != null) {
            $isDone = self::$emailDao->delete($id);
            $type = "fail";
            if($isDone) {
                $type = "success";
            }
            header("Location: ?page=replyEmail&status=".$type);
        } else {
            header("Location: index.php?page=404");
        }
    }
} 
?>