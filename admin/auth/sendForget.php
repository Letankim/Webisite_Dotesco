<?php
    function sendMailForgetPassword($username, $newPassword) {
        $mailForgetPassword = "<html>
        <head>
        <meta charset='utf-8'/>
        <title>Cấp lại mật khẩu admin</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: #333;
            }
            .title {
                font-size: 24px;
                font-weight: bold;
                text-transform: uppercase;
                color: #01b28c;
                margin-top: 0;
                margin-bottom: 20px;
                text-align: center;
            }
            .say-something {
                margin: 5px 0px;
            }
            .main-content {
                padding: 0px 20px;
            }
            .content {
                margin: 5px 0px;
            }
            .sendby {
                padding: 0px 20px;
                font-style: italic;
                color: #007bff;
                display: block;
                margin-bottom: 5px;
            }
            </style>
        </head>
        <body>
            <h1 class='title'>
                <span>Cấp lại mật khẩu admin</span>
            </h1>
            <div class='main-content'>
            <p class='say-something' style='font-style: italic;'>Xin chào ".$username.",</p>
            <p class='content'>
                Mật khẩu admin mới của bạn là <span style='color:#fff;background-color: #01b28c'>".$newPassword."</span>
                . Hãy đăng nhập lại và tiếp tục quản trị nhé.
            </p>
            </div>
            <span class='sendby'>Được gửi bởi hệ thống tự động</span>
        </body>
        </html>";
        return $mailForgetPassword;
    }
?>