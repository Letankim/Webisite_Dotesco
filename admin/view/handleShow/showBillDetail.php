<?php
    $id = $currentBill->getId();
    $name = $currentBill->getName();
    $address = $currentBill->getAddress();
    $detailAddress = $currentBill->getDetailAddress();
    $phone = $currentBill->getPhone();
    $email = $currentBill->getEmail();
    $payment = $currentBill->getPayment();
    $transactionCode = $currentBill->getTransactionCode();
    $status = $currentBill->getStatus();
    $total = $currentBill->getTotal();
    $note = $currentBill->getNote();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <style>
                    .header-navigation {
                        display: flex;
                        justify-content: space-between;
                        padding: 5px 0;
                    }
                </style>
                <div class="panel-body form-add active">
                    <div class="header-navigation">
                        <a href="index.php?page=ordered" class='btn btn-info'>Quay về trang đơn hàng</a>
                        <a href="index.php?page=print-bill&id=<?=$id?>" target="_blank" class='btn btn-danger'>
                        <i class='bx bx-printer'></i> In đơn
                        </a>
                    </div>
                    <div class="panel-heading">
                        Chi tiết thông tin của đơn hàng ĐH<?=$id?>
                    </div>
                    <div class="position-center">
                        <div>
                            <div class="form-group">
                                <label for="model">Khách hàng: </label>
                                <span class="show_more"><?=$name?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Số điện thoại: </label>
                                <span class="show_more"><?=$phone?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Email: </label>
                                <span class="show_more"><?=$email?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Địa chỉ: </label>
                                <span class="show_more"><?=$address?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Địa chỉ cụ thể: </label>
                                <span class="show_more"><?=$detailAddress?></span>
                            </div>
                            <div class="form-group">
								<?php
									$isBank = "Tiền mặt";
									if($payment == 1) {
                    					$isBank = "Chuyển khoản";
               						}
								?>
                                <label for="model">Phương thức thanh toán: </label>
                                <span class="show_more label label-success"><?=$isBank?></span>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="model">Mã giao dịch: </label>
                                <span class="show_more label label-primary"><?=$transactionCode?></span>
                            </div>
                        <form action="index.php?page=update-status-bill" method="post">
                            <div class="form-group">
                                <!--
                                     0 đơn hàng mới
                                     1 đã xác nhận
                                     2 đã chuẩn bị hàng
                                     3 đã gửi đi
                                     4 đã hoàn thành
                                     -1 Hủy
                                 -->
                                    <input type="hidden" name="idBill" value="<?=$id?>">
                                    <label for="status">Cập nhật trạng thái đơn hàng: </label>
                                    <select class="change-status-bill" name="status" id="status">
                                        <option value="0">Đơn hàng mới</option>
                                        <option value="1">Đã xác nhân</option>
                                        <option value="2">Đã chuẩn bị hàng</option>
                                        <option value="3">Đã gửi đi</option>
                                        <option value="4">Đã hoàn thành</option>
                                        <option value="-1">Hủy đơn hàng</option>
                                    </select>
                                    <script>
                                        const status = document.getElementById('status');
                                        const allOption = status.querySelectorAll('option');
                                        allOption.forEach(function(item) {
                                            if(item.value == <?=$status?>) {
                                                item.selected = true;
                                            }
                                        })
                                    </script>
                            </div>
                            <div class="form-group">
                                <label for="status">Ghi chú cho đơn hàng: </label>
                                <textarea style="display: block;" name="note" id="" cols="50" rows="5"><?=$note?></textarea>
                            </div>
                            <button type='submit' name = 'update-status-bill' class='btn btn-info'>Cập nhật</button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th style="width:20px;">
                                        STT
                                    </th>
                                    <th>Tên sản phẩm</th>
                                    <th>Model sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                    $productDao = new ProductDao();
                                    foreach($currentDetailBill as $item) {
                                        $product = $productDao->getOneByID($item->getIdProduct());
                                        echo "<tr>
                                        <td style='width:20px;'>
                                            ".$index."
                                            </td>
                                            <td>".$item->getName()."</td>
                                            <td>".$item->getModel()."</td>
                                            <td>".currency_format($item->getPrice())."</td>
                                            <td>".$item->getQuantity()."</td>
                                           <td>".currency_format($item->getTotal())."</td>
                                         </tr>";
                                            $index++;
                                    }
                                    echo "<tr>
                                        <td colspan='10' style='font-weight: 600;color: red;text-align: right;'>
                                            Tổng đơn hàng là: ".currency_format($total)."
                                        </tr>";
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <a href="index.php?page=ordered" class='btn btn-info'>Quay về trang đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>