<?php
require_once PATH_ROOT_USER."/DAO/AccountDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_APP."/model/Account.php";
require_once PATH_ROOT_APP."/lib/Time.php";
require_once PATH_ROOT_APP."/lib/GeneratePassword.php";
require_once PATH_ROOT_APP."/mail/sendmail.php";
require_once PATH_ROOT_APP."/mail/sendForget.php";
class AuthController {
    private static $accountDao;
    private static $originDao;
    private static $categoryDao;

    function __construct() {
        self::$accountDao = new AccountDao();
        self::$originDao = new OriginDao();
        self::$categoryDao = new CategoryDao();
    }

    public function login() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $message = "";
        if(isset($_POST ['login'])) {
            $username = trim($_POST ["username"]);
            $password = trim($_POST ["password"]);
            $user = self::$accountDao->isExistAccount($username);
            if($user != null) {
                if($user->getRole() == 0) {
                    $isValidPassword = password_verify($password, $user->getPassword());
                    if($user->getStatus() == 0) {
                        $message = "Tài khoản này đang bị khóa.";
                        include_once PATH_ROOT_USER."/auth/login.php";
                    } else
                    if($isValidPassword) {
                        $_SESSION["isLogin"] = true;
                        $_SESSION["username"] = $user->getUsername();
                        $_SESSION["idUser"] = $user->getId();
                        $_SESSION["emailUser"] = $user->getEmail();
                        $_SESSION["roleLogin"] = 0;
                        header("Location: .");
                    } else {
                        $message = "Mật khẩu không chính xác.";
                        include_once PATH_ROOT_USER."/auth/login.php";
                    }
                } else {
                    $message = "Hãy sử dụng form đăng nhập với vai trò được cung cấp.";
                    include_once PATH_ROOT_USER."/auth/login.php";
                }
            } else {
                $message = "Tài khoản không tồn tại.";
                include_once "./User/auth/login.php";
            } 
        }
        else {
            include_once "./User/auth/login.php";
        }
    }

    public function signup() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $message = "";
        if(isset($_POST['signup'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user = self::$accountDao->isExistAccount($username);
            if($user != null) {
                $message = "Tên đăng nhập đã tồn tại.";
            } else {
                $createAt = getCurrentTime();
                $password = password_hash($password, PASSWORD_DEFAULT);
                $account = new Account(null, $username, $password, $email, null,null, $createAt, null, 1, 0);
                $isDone = self::$accountDao->addNew($account);
                if($isDone >= 1) {
                    $message = "Đăng kí tài khoản thành công.";
                } else {
                    $message = "Đăng kí tài khoản thất bại hãy thử lại.";
                }
            }
        } 
        include_once PATH_ROOT_USER."/auth/signup.php";
    }

    public function forget() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $message = "";
        if(isset($_POST['forget'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $user = self::$accountDao->isExistAccountForget($username,$email);
            if($user != null) { 
                if($user->getStatus() == 0) {
                    $message = "Tài khoản này đang bị khóa.";
                } else if($user->getRole() != 0) {
                    $message = "Tài khoản này không được phép cấp lại mật khẩu ở đây.";
                } else {
                    $newPassword = implode(generatePassword(8));
                    $templateForgetPassword = sendMailForgetPassword($username,$newPassword);
                    $isSend = sendmail("Cấp lại mật khẩu", $templateForgetPassword , $email, $username, "");
                    if($isSend) {
                        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                        $isDone = self::$accountDao->updatePassword($user->getId(), $passwordHash);
                        $index = 0;
                        while(!$isDone) {
                            $isDone = self::$accountDao->updatePassword($user->getId(), $passwordHash);
                            $index++;
                            if($index == 3) {
                                break;
                            }
                        }
                        if($isDone) {
                            $message = "Cấp lại mật khẩu thành công. Kiểm tra mail để lấy mật khẩu mới.";
                        } else {
                            $message = "Đã xảy ra lỗi trong quá trình cấp lại mật khẩu.";
                        }
                    } else {
                        $message = "Đã xảy ra lỗi trong quá trình cấp lại mật khẩu.";
                    }
                }
            } else {
                $message = "Tài khoản không tồn tại.";
            }
        }
        include_once PATH_ROOT_USER."/auth/forget.php";
    }
}
?>