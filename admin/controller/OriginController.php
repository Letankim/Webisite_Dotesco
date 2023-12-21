<?php
require_once PATH_ROOT_ADMIN."/DAO/OriginDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showOrigin.php";
require_once PATH_ROOT."/model/Origin.php";
class OriginController {
    private static $originDao;

    public function __construct()
    {
        self::$originDao = new OriginDao();
    }

    public function adminOrigin() {
        $allOrigin = self::$originDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/originView.php";
    }

    public function adminAddNew() {
        $name = $_POST['name'];
        $country = $_POST['country'];
        $status = $_POST['status'];
        $createAt = getCurrentTime();
        $createBy = $_SESSION['idAdmin'];
        $origin = new Origin(null, $name, $country, $createAt, null, $createBy, null, $status);
        $isDone = self::$originDao->addNew($origin);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=origin&status=".$type);
    }

    public function adminFormUpdate() {
        $id = $_GET['id'];
        $currentOrigin = self::$originDao->getOneByID($id);
        if($currentOrigin != null) {
            include_once PATH_ROOT_ADMIN."/view/editForm/editOrigin.php";
        } else {
            header("Location: index.php?page=404");
        }
    }

    public function adminUpdate() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $country = $_POST['country'];
        $status = $_POST['status'];
        $modifiedAt = getCurrentTime();
        $modifiedBy = $_SESSION['idAdmin'];
        $origin = new Origin($id, $name, $country, null, $modifiedAt, null, $modifiedBy, $status);
        $isDone = self::$originDao->update($origin);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=origin&status=".$type);
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $productByOrigin = self::$originDao->getNumberOfProductByOrigin($id);
        if($productByOrigin == 0) {
            $isDone = self::$originDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: index.php?page=origin&status=".$type);
        } else {
            header("Location: index.php?page=origin&status=fail&message=Nguồn góc đang có sản phẩm không thể xóa");
        }
    }
}
?>