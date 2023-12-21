<?php
    function sendBill($idBill) {
        return '<html>
        <head>
        <meta charset="utf-8" />
        <title>Đơn hàng mới</title>
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
            <h1 class="title">
                <span>Đơn hàng mới</span>
            </h1>
            <div class="main-content">
                <p class="content">
                    <b>Mã đơn hàng: ĐH'.$idBill.'</b><br>
                    Hiện tại website đã nhận được đơn hàng mới vui lòng truy cập 
                    <a href="https://dotesco.com/admin/auth/login.php">tại đây</a>
                     để xem chi tiết đơn hàng và xác nhận.
                </p>
            </div>
            <span class="sendby">Được gửi tự động</span>
        </body>
        </html>';
    }
?>
