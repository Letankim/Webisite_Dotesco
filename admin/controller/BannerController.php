<?php
require_once PATH_ROOT_ADMIN."/DAO/BannerDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT."/model/Banner.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showBanner.php";
require_once PATH_ROOT."/lib/Upload.php";
class BannerController {
    private static $bannerDao;
    function __construct() {
        self::$bannerDao = new BannerDao();
    }

    public function adminBanner() {
        $allBanner = self::$bannerDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/bannerView.php";
    }

    public function adminAddNew() {
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $img = $_FILES['imgBanner'];
        $createAt = getCurrentTime();
        $createBy = $_SESSION['idAdmin'];
        $target_dir = PATH_ROOT."/uploads/";
        $imgPath = uploadImage($target_dir, $img);
        if($imgPath != "") {
            $banner = new Banner(null, $imgPath, $status, $priority, $createAt, null, $createBy, null);
            $isDone = self::$bannerDao->addNew($banner);
            $type = "fail";
            if($isDone) {
                $type = "success";
            }
            header("Location: index.php?page=banner&status=".$type);
        } else {
            header("Location: index.php?page=banner&status=fail&message=Chưa có hình ảnh");
        }
    }

    public function adminFormUpdate() {
        $id = $_GET['id'];
        $currentBanner = self::$bannerDao->getOneByID($id);
        include_once PATH_ROOT_ADMIN."/view/editForm/editBanner.php";
    }

    public function adminUpdate() {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $imgBanner = $_FILES['imgBanner'];
        $target_dir = PATH_ROOT."/uploads/";
        $img = uploadImage($target_dir, $imgBanner);
        $modifiedAt = getCurrentTime();
        $modifiedBy = $_SESSION['idAdmin'];
        $currentBanner = self::$bannerDao->getOneByID($id);
        if($img != "") {
            $pathCurrent = $currentBanner->getImg();
            unlink($target_dir.$pathCurrent);
        } else {
            $img = $_POST['oldBanner'];
        }
        $banner = new Banner($id, $img, $status, $priority, null, $modifiedAt, null, $modifiedBy);
        $isDone = self::$bannerDao->update($banner);
        $type = "fail";
        if($isDone) {
            $type = "success";
        }
        header("Location: index.php?page=banner&status=".$type);
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $currentBanner = self::$bannerDao->getOneByID($id);
        if($currentBanner != null) {
            $target_dir = PATH_ROOT."/uploads/";
            $pathCurrent = $currentBanner->getImg();
            unlink($target_dir.$pathCurrent);
            $isDone = self::$bannerDao->delete($id);
            $type = "fail";
            if($isDone) {
                $type = "success";
            }
            header("Location: index.php?page=banner&status=".$type);
        } else {
            header("Location: index.php?page=404");
        }
    }
}
?>