<?php
require_once PATH_ROOT_ADMIN."/DAO/CategoryDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showCategory.php";
require_once PATH_ROOT."/model/Category.php";

class CategoryController {
    private static $categoryDao;
    function __construct() {
        self::$categoryDao = new CategoryDao();
    }

    public function adminCategory() {
        $allCategory = self::$categoryDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/categoryView.php";
    }

    public function adminAddNew() {
        $name = $_POST['nameCategory'];
        $status = $_POST['status'];
        $createAt = getCurrentTime();
        $createBy = $_SESSION['idAdmin'];
        $category = new Category(null, $name, $createAt, null, $createBy, null, $status);
        $isDone = self::$categoryDao->addNew($category);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=category&status=".$type);
    }

    public function adminFormUpdate() {
        $id = $_GET['id'];
        $currentCategory = self::$categoryDao->getOneByID($id);
        if($currentCategory != null) {
            include_once PATH_ROOT_ADMIN."/view/editForm/editCategory.php";
        } else {
            header("Location: index.php?page=404");
        }
    }

    public function adminUpdate() {
        $id = $_POST['idCategory'];
        $name = $_POST['nameCategory'];
        $status = $_POST['status'];
        $modifiedAt = getCurrentTime();
        $modifiedBy = $_SESSION['idAdmin'];
        $category = new Category($id, $name, null, $modifiedAt, null, $modifiedBy, $status);
        $isDone = self::$categoryDao->update($category);
        $type = "fail";
        if($isDone >= 1) {
            $type = "success";
        }
        header("Location: index.php?page=category&status=".$type);
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $productByCategory = self::$categoryDao->getNumberOfProductByCategory($id);
        if($productByCategory == 0) {
            $isDone = self::$categoryDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type = "success";
            }
            header("Location: index.php?page=category&status=".$type);
        } else {
            header("Location: index.php?page=category&status=fail&message=Danh mục này đang có sản phẩm không thể xóa.");
        }
    }

    public function adminDeleteAll() {

    }
}
?>