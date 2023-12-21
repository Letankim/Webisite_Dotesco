<?php
require_once PATH_ROOT_ADMIN."/DAO/IntroductionDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showIntroduction.php";
require_once PATH_ROOT."/model/Introduction.php";
class IntroductionController {
    private static $introductionDao;

    public function __construct()
    {
        self::$introductionDao = new IntroductionDao();
    }

    public function adminIntroduction() {
        $allIntroduction = self::$introductionDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/introductionView.php";
    }

    public function adminAddNew() {
        $content = $_POST['introduction'];
        $status = $_POST['status'];
        $createAt = getCurrentTime();
        $createBy = $_SESSION['idAdmin'];
        $introduction = new Introduction(null, $content, $createAt, null, $createBy, null, $status);
        $isDone = self::$introductionDao->addNew($introduction);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=introduction&status=".$type);
    }

    public function adminFormUpdate() {
        $id = $_GET['id'];
        $currentIntroduction = self::$introductionDao->getOneByID($id);
        if($currentIntroduction != null) {
            include_once PATH_ROOT_ADMIN."/view/editForm/editIntroduction.php";
        } else {
            header("Location: ?page=404");
        }
    }

    public function adminUpdate() {
        $id = $_POST['id'];
        $content = $_POST['introduction'];
        $status = $_POST['status'];
        $modifiedAt = getCurrentTime();
        $modifiedBy = $_SESSION['idAdmin'];
        $introduction = new Introduction($id, $content, null, $modifiedAt, null, $modifiedBy, $status);
        $isDone = self::$introductionDao->update($introduction);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=introduction&status=".$type);
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $currentIntroduction = self::$introductionDao->getOneByID($id);
        if($currentIntroduction != null) {
            $isDone = self::$introductionDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: index.php?page=introduction&status=".$type);
        } else {
            header("Location: index.php?page=404");
        }
    }

    public function adminDeleteAll() {

    }

}
?>