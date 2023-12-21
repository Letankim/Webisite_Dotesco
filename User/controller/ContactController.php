<?php
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_USER."/DAO/CompanyDao.php";
require_once PATH_ROOT_USER."/DAO/EmailDao.php";
require_once PATH_ROOT_APP."/mail/sendmail.php";
require_once PATH_ROOT_APP."/mail/sendContact.php";
require_once PATH_ROOT_APP."/mail/mailThank.php";
class ContactController {
    private static $categoryDao;
    private static $originDao;
    private static $emailDao;

    function __construct() {
        self::$categoryDao = new CategoryDao();
        self::$originDao = new OriginDao();
        self::$emailDao  = new EmailDao();
    }
    public function userContact() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        $companyDao = new CompanyDao();
        $companyActive = $companyDao->getCompanyActive(); 
        include_once PATH_ROOT_USER."/components/navigation.php";
        include_once PATH_ROOT_USER."/contact.php";
    }

    public function  userSendMain() {
        $emailRecipients = self::$emailDao->getEmailReply();
        if($emailRecipients == null) {
            $emailRecipients = "letankim2003@gmail.com";
        } else {
            $emailRecipients = $emailRecipients->getEmail();
        }
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        if(isset($_POST['contact'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $mailContact = sendMailContact($name, $email, $phone, $message);
            $mailThank = sendMailThank($name);
            $isSendAdmin = sendmail("Thông tin liên hệ từ khách hàng", $mailContact, $emailRecipients, "Dotesco", "");
            $isSendUser = sendmail("Thư cảm ơn của DOTESCO", $mailThank, $email, $name, $emailRecipients);
            include_once PATH_ROOT_USER."/response.php";
        } else {
            header("Location: ?act=404");
        }
    }
}
?>