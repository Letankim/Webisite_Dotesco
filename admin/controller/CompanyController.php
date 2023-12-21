<?php
require_once PATH_ROOT_ADMIN."/DAO/CompanyDao.php";
require_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
require_once PATH_ROOT_ADMIN."/view/handleShow/showCompany.php";
require_once PATH_ROOT."/model/Company.php";
class CompanyController {
    protected static $companyDao;

    public function __construct()
    {
        self::$companyDao = new CompanyDao();
    }

    public function adminCompany() {
        $allCompany = self::$companyDao->getAll();
        include_once PATH_ROOT_ADMIN."/view/companyView.php";
    }

    public function adminAddNew() {
        $name = $_POST['nameCompany'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $createBy = $_SESSION['idAdmin'];
        $createAt = getCurrentTime();
        $company = new Company(null, $name, $address, $phone, $email, $createAt, null, $createBy, null, $status);
        $isDone = self::$companyDao->addNew($company);
        $type = "fail";
        if($isDone >= 1) {
            $type =  "success";
        }
        header("Location: ?page=company&status=".$type);
    }

    public function adminFormUpdate() {
        $id = $_GET['id'];
        $currentCompany = self::$companyDao->getOneByID($id);
        if($currentCompany != null) {
            include_once PATH_ROOT_ADMIN."/view/editForm/updateCompany.php";
        } else {
            header("Location: ?page=404");
        }
    }

    public function adminUpdate() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $modifiedAt = getCurrentTime();
        $modifiedBy = $_SESSION['idAdmin'];
        $company = new Company($id, $name, $address, $phone, $email, null, $modifiedAt, null, $modifiedBy, $status);
        $isDone = self::$companyDao->update($company);
        $type = "fail";
        if($isDone >= 1) {
            $type =  "success";
        }
        header("Location: ?page=company&status=".$type);
    }

    public function adminDelete() {
        $id = $_GET['id'];
        $currentCompany = self::$companyDao->getOneByID($id);
        if($currentCompany != null) {
            $isDone = self::$companyDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type =  "success";
            }
            header("Location: ?page=company&status=".$type);
        } else {
            header("Location: ?page=404");
        }
    }

    public function adminDeleteById( $id) {
        $currentCompany = self::$companyDao->getOneByID($id);
        if($currentCompany != null) {
            $isDone = self::$companyDao->delete($id);
            $type = "fail";
            if($isDone >= 1) {
                $type =  "success";
            }
            header("Location: ?page=company&status=".$type);
        } else {
            header("Location: ?page=404");
        }
    }

    public function adminDeleteAll() {
        $isDone = self::$companyDao->deleteAll();
        $type = "fail";
        if($isDone >= 1) {
            $type =  "success";
        }
        header("Location: ?page=company&status=".$type);
    }
}
?>