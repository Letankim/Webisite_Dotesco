<?php
    ob_start();
    session_start();
    include "../model/connect.php";
    include "../model/account.php";
    $error_message = "";
    if(isset($_POST['login']) && $_POST['login']) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $account = isExistAccount($username);
        if(count($account) > 0) {
            if($account['role'] == 1) {
                $isValidPassword = password_verify($password, $account['password']);
                if($isValidPassword) {
                    $_SESSION['roleAdmin'] = 1;
                    $_SESSION['usernameAdmin'] = $account['username'];
                    header("Location: ../index.php");
                } else {
                    $error_message = "Mật khẩu không đúng.";
                }
            } else {
                $error_message = "Bạn không được phép truy cập.";
            }
        } else {
            $error_message = 'Username không tồn tại.';
        }
    }
?>
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
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
        color: red;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		<form action="#" method="post">
			<input type="text" class="ggg" name="username" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
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
