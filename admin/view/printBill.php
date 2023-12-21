<?php
    $id = $currentBill->getId();
    $name = $currentBill->getName();
    $address = $currentBill->getAddress();
    $detailAddress = $currentBill->getDetailAddress();
    $phone = $currentBill->getPhone();
    $payment = $currentBill->getPayment();
    $transactionCode = $currentBill->getTransactionCode();
    $status = $currentBill->getStatus();
    $total = $currentBill->getTotal();
    $note = $currentBill->getNote();
    $createAt = $currentBill->getCreateAt();
    $shipFee = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Hóa đơn HD <?=$id?></title>
    <style>
        .invoice-logo {
            padding: 10px;
            width: 100%;
            text-align: left;
        }
        .invoice-logo img {
            width: 80px;
        }
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
            margin: 5px 0;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > td {
            word-wrap: break-word;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid #f4f4f4;
        }
        .footer-time .time-export {
            display: block;
            font-size: 12px;
            font-style: italic;
        }

        table tbody tr td.max-250{
            max-width: 250px;
        }
            
        @media print {
            table td {
                page-break-inside: auto;
            }
            body {
                font-size: 14px;
                margin: 0;
            }
            .container {
                width: 100%; 
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-logo">
                    <img src="./assets/images/logo.jpg" alt="Lopgo">
                </div>
                <div class="invoice-title">
                    <h2>Invoice</h2><h3 class="pull-right">Order # HD<?=$id?></h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                        <strong>Ship từ:</strong><br>
                        <strong>Lê Tấn Kim</strong> <br>
                        Thạnh lợi, Thạnh Lộc, Giồng Riềng, Kiên Giang
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                        <strong>Shipp đến:</strong><br>
                            <strong><?=$name?></strong> <br>
                            <?=$address?><br>
                            <?=$detailAddress?>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Phương thức thanh toán:</strong><br>
                            <?php
                                $paymentMethod = "Thanh toán khi nhận hàng";
                                if($payment == 1) {
                                    $paymentMethod = "Chuyển khoản qua ngân hàng";
                                }
                            ?>
                            <i><?=$paymentMethod?></i><br>
                            <strong>Mã giao dịch:</strong> <i><?=$transactionCode?></i><br>
                            <strong>Ghi chú:</strong> <i><?=$note?></i>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Đặt hàng lúc:</strong><br>
                            <?=$createAt?><br><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Chi tiết đơn hàng</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Sản phẩm</strong></td>
                                        <td><strong>Model</strong></td>
                                        <td class="text-center"><strong>Giá</strong></td>
                                        <td class="text-center"><strong>Số lượng</strong></td>
                                        <td class="text-right"><strong>Thành tiền</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <?php
                                        foreach($currentDetailBill as $item) {
                                        $name = $item->getName();
                                        $model = $item->getModel();
                                        $price = $item->getPrice();
                                        $quantity = $item->getQuantity();
                                        $total = $item->getTotal();
                                    ?>
                                    <tr>
                                        <td class="max-250"><?=$name?></td>
                                        <td class="max-250"><?=$model?></td>
                                        <td class="text-center"><?=$price?></td>
                                        <td class="text-right"><?=$quantity?></td>
                                        <td class="text-right"><?=$total?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td colspan="2" class="thick-line text-center"><strong>Tổng công: </strong></td>
                                        <td colspan="2" class="thick-line text-right"><?=currency_format($total, "VND")?></td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td colspan="2" class="no-line text-center"><strong>Phí ship: </strong></td>
                                        <td colspan="2" class="no-line text-right"><?=currency_format($shipFee, "VND")?></td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td colspan="2" class="no-line text-center"><strong>Total</strong></td>
                                        <td colspan="2" class="no-line text-right"><?=currency_format($total + $shipFee, "VND")?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="footer-time">
                    <span class="time-export">Hóa đơn được xuất lúc: 
                        <script>
                            let date = new Date();
                            document.write(date.toLocaleString())
                        </script>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>