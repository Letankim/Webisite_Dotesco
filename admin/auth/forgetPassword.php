<?php
    ob_start();
    session_start();
    $typeUser = 1;
    include_once "../config/config.php";
    include_once PATH_ROOT_ADMIN."/DAO/AccountDao.php";
    include_once PATH_ROOT_ADMIN."/auth/sendForget.php";
    include_once PATH_ROOT."/lib/GeneratePassword.php";
    include_once PATH_ROOT."/mail/sendmail.php";
    $accountDao = new AccountDao();
    $message_forget = "";
    $status = "error_message";
    if(isset($_POST['forgetPassword']) && $_POST['forgetPassword']) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $account = $accountDao->isExistAccountForget($username, $email);
        if($account !=  null) {
            if($account->getStatus() == 0) {
                $message_forget = "Tài khoản này đang bị khóa.";
            } else
            if($account->getRole() == 1) {
                $newPassword = implode(generatePassword(10));
                $isDone = $accountDao->updatePassword($account->getId(), password_hash($newPassword, PASSWORD_DEFAULT));
                if($isDone >= 1) {
                    $templateForget = sendMailForgetPassword($username, $newPassword);
                    $isSendMail = sendmail("Cấp lại mật khẩu trang admin", $templateForget, $email, $username, "");
                    $index = 0;
                    while(!$isSendMail) {
                        $isSendMail = sendmail("Cấp lại mật khẩu trang admin", $templateForget, $email, $username, "");
                        $index++;
                        if($index == 3) {
                            $isSendMail = false;
                            break;
                        }
                    }
                    if($isSendMail) {
                        $status = "success_message";
                        $message_forget = "Cấp lại tài khoản thành công. Kiểm tra mail để xem.";
                    } else {
                        $message_forget = "Cấp lại mật khẩu thất bại vui lòng thử lại.";
                    }
                } else {
                    $message_forget = "Cấp lại mật khẩu thất bại vui lòng thử lại.";
                }
            } else {
                $message_forget = "Bạn không được phép truy cập.";
            }
        } else {
            $message_forget = 'Tên đăng nhập không tồn tại.';
        }
    }
?>
<!DOCTYPE html>
<head>
<title>DOTESCO - Quên mật khẩu Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="../assets/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../assets/css/font.css" type="text/css"/>
<link href="../assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="../assets/js/jquery2.0.3.min.js"></script>
<style>
    span.error_message {
        display: block;
        width: 100%;
        text-align: center;
        color: #ff0158;
        font-weight: bold;
    }
    span.success_message {
        display: block;
        width: 100%;
        text-align: center;
        color: #01b28c;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Quên mật khẩu admin</h2>
		<form method="post">
			<input type="text" class="ggg" name="username" placeholder="TÊN ĐĂNG NHẬP" required="">
			<input type="email" class="ggg" name="email" placeholder="Email" required="">
            <div class="clearfix"></div>
            <a href="./login.php">Quay lại trang đăng nhập</a>
            <input type="submit" value="Quên mật khẩu" name="forgetPassword">
            <span class = "<?=$status?>"><?=$message_forget?></span>
		</form>
</div>
</div>
<script src="../assets/js/bootstrap.js"></script>
</body>
</html>
