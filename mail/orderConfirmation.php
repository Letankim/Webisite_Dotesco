<?php
function orderConfirmation($bill, $billDetail) {
    $orderConfirmation ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirm order</title>
        <style>
            .header {
                margin: 10px 0px;
                font-size: 20px;
                text-align: center;
                text-transform: uppercase;
                color: #01b28c;
            }
            .list-info {
                list-style: none;
                padding: 0 5px;
                margin: 0;
            }
            .item-info {
                padding: 5px 0px;
            }
            .title-info {
                font-weight: 600;
                font-size: 16px;
            }
            .content-info {
                font-style: italic;
                font-size: 16px;
            }
            .order-product {
                width: 100%;
            }
            .order-product table  {
                width: 100%;
                text-align: center;
                border-collapse: collapse;
                border: 1px solid #333;
            }
            .order-product table th {
                font-weight: bold;
                color: #fff;
                background-color: #01b28c;
            }
            .order-product table th,
            .order-product table td {
                border: 1px solid #333;
                padding: 7px 0px;
            }
            .order-product table .total {
                background-color: #f0ecec;
                font-weight: bold;
                font-size: 16px;
                text-transform: uppercase;
            }
            .thank p {
                font-size: 16px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Thông tin đơn hàng vừa đặt</h2>
            </div>
            <div class="main-order">
                <div class="info-order">
                    <ul class="list-info">
                        <li class="item-info">
                            <span class="title-info">Họ tên khách hàng: </span>
                            <span class="content-info">'.$bill->getName().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Email: </span>
                            <span class="content-info">'.$bill->getEmail().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Số điện thoại: </span>
                            <span class="content-info">'.$bill->getPhone().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Address: </span>
                            <span class="content-info">'.$bill->getAddress().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Address-details: </span>
                            <span class="content-info">'.$bill->getDetailAddress().'</span>
                        </li>
                    </ul>
                </div>
                <div class="order-product">
                    <h2>Products</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Model</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>';
            $index = 1;
            $totalToPay = 0;
            foreach($billDetail as $item) {
                $name = $item->getName();
                $model = $item->getModel();
                $price = $item->getPrice();
                $quantity = $item->getQuantity();
                $totalItem = $quantity * $price;
                $totalToPay += $totalItem;
                $orderConfirmation.='
                    <tr>
                        <td>'.$index++.'</td>
                        <td>'.$name.'</td>
                        <td>'.$model.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.$price.'</td>
                        <td>'.$totalItem.'</td>
                    </tr>';
            }
            $orderConfirmation.='
            <tr class="total">
                        <td colspan="4">Tổng thanh toán </td>
                        <td colspan="4">'.$totalToPay.' </td>
                    </tr>
            </tbody>
                    </table>
                </div>
            </div>
            <div class="thank">
                <p>Cảm ơn bạn đã mua hàng tại website của chúng tôi. Chúng tôi sẽ sớm giao hàng đến bạn.</p>
            </div>
            <div class="footer">
                
            </div>
        </div>
    </body>
    </html>';
    return $orderConfirmation;
}

function orderConfirmationToAdmin($bill, $billDetail) {
    $orderConfirmation ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông báo đơn hàng mới</title>
        <style>
            .header {
                margin: 10px 0px;
                font-size: 20px;
                text-align: center;
                text-transform: uppercase;
                color: #01b28c;
            }
            .list-info {
                list-style: none;
                padding: 0 5px;
                margin: 0;
            }
            .item-info {
                padding: 5px 0px;
            }
            .title-info {
                font-weight: 600;
                font-size: 16px;
            }
            .content-info {
                font-style: italic;
                font-size: 16px;
            }
            .order-product {
                width: 100%;
            }
            .order-product table  {
                width: 100%;
                text-align: center;
                border-collapse: collapse;
                border: 1px solid #333;
            }
            .order-product table th {
                font-weight: bold;
                color: #fff;
                background-color: #01b28c;
            }
            .order-product table th,
            .order-product table td {
                border: 1px solid #333;
                padding: 7px 0px;
            }
            .order-product table .total {
                background-color: #f0ecec;
                font-weight: bold;
                font-size: 16px;
                text-transform: uppercase;
            }
            .thank p {
                font-size: 16px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Thông báo đơn hàng mới</h2>
            </div>
            <div class="main-order">
                <div class="info-order">
                    <ul class="list-info">
                        <li class="item-info">
                            <span class="title-info">Họ tên khách hàng: </span>
                            <span class="content-info">'.$bill->getName().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Email: </span>
                            <span class="content-info">'.$bill->getEmail().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Số điện thoại: </span>
                            <span class="content-info">'.$bill->getPhone().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Address: </span>
                            <span class="content-info">'.$bill->getAddress().'</span>
                        </li>
                        <li class="item-info">
                            <span class="title-info">Address-details: </span>
                            <span class="content-info">'.$bill->getDetailAddress().'</span>
                        </li>
                    </ul>
                </div>
                <div class="order-product">
                    <h2>Products</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Model</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>';
            $index = 1;
            $totalToPay = 0;
            foreach($billDetail as $item) {
                $name = $item->getName();
                $model = $item->getModel();
                $price = $item->getPrice();
                $quantity = $item->getQuantity();
                $totalItem = $quantity * $price;
                $totalToPay += $totalItem;
                $orderConfirmation.='
                    <tr>
                        <td>'.$index++.'</td>
                        <td>'.$name.'</td>
                        <td>'.$model.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.$price.'</td>
                        <td>'.$totalItem.'</td>
                    </tr>';
            }
            $orderConfirmation.='
            <tr class="total">
                        <td colspan="4">Tổng thanh toán </td>
                        <td colspan="4">'.$totalToPay.' </td>
                    </tr>
            </tbody>
                    </table>
                </div>
            </div>
            <div class="thank">
                <p>Hãy truy cập vào 
                <a href="https://dotesco.com/admin/auth/login.php">trang quản trị</a>
                 để thay đổi trạng thái đơn hàng</p>
            </div>
            <div class="footer">
                
            </div>
        </div>
    </body>
    </html>';
    return $orderConfirmation;
}
?>