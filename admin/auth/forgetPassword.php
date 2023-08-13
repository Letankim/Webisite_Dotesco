<?php
    ob_start();
    session_start();
    $typeUser = 1;
    include "../model/connect.php";
    include "../model/account.php";
    include "../../mail/sendmail.php";
    include "./sendForget.php";
    $error_message = "";
    if(isset($_POST['forgetPassword']) && $_POST['forgetPassword']) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $account = isExistAccountForget($username, $email);
        if($account) {
            if($account['status'] == 0) {
                $error_message = "Tài khoản này đang bị khóa.";
            } else
            if($account['role'] == 1) {
                $newPassword = implode(resetPassword(10));
                updatePassword($account['id'], password_hash($newPassword, PASSWORD_DEFAULT));
                $error_message = "Cấp lại tài khoản thành công. Kiểm tra mail để xem.";
                sendmail("Reset password admin", sendMailForgetPassword($username, $newPassword), $email, $username);
            } else {
                $error_message = "Bạn không được phép truy cập.";
            }
        } else {
            $error_message = 'Tên đăng nhập không tồn tại.';
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
<link rel="stylesheet" href="css/bootstrap.min.css" >
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
        color: #a71b4b;
        font-weight: bold;
    }
</style>
<script type='text/javascript'>
    document.onkeydown = function(event){
        if(event.keyCode==123){
            return false;
        }
        else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
            return false;  
        }
    };
    document.oncontextmenu = new Function("return false");
</script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Quên mật khẩu admin</h2>
		<form action="#" method="post">
			<input type="text" class="ggg" name="username" placeholder="TÊN ĐĂNG NHẬP" required="">
			<input type="email" class="ggg" name="email" placeholder="Email" required="">
            <div class="clearfix"></div>
            <a href="./login.php">Quay lại trang đăng nhập</a>
            <input type="submit" value="Quên mật khẩu" name="forgetPassword">
            <span class = "error_message"><?=$error_message?></span>
		</form>
</div>
</div>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/jquery.nicescroll.js"></script>
<script src="../assets/js/jquery.scrollTo.js"></script>
</body>
</html>
