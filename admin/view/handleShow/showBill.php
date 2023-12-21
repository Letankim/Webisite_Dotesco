<?php
    function showAllBill($allBill) {
        $bill = '<table class="table table-striped" id="table-data">
        <thead>
            <th style="width:20px;">
                <input onclick="changeStatusDelete(this)" type="checkbox" class = "check-all"/>
            </th>
            <th style="width:20px;">
              STT
            </th>
            <th>Mã ĐH</th>
            <th>Tên KH</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>PT thanh toán</th>
            <th>Mã giao dịch</th>
            <th>Ngày tạo</th>
            <th>Thay đổi trạng thái</th>
            <th>Bởi</th>
            <th>Tổng đơn hàng</th>
            <th>Trạng thái</th>
            <th>Xử lí</th>
        </thead>
        <tbody>';
        $index = 0;
        if(count($allBill) > 0) {
            $accountDao = new AccountDao();
            $messageDelete = '"Bạn có chắc muốn xóa?"';
            foreach ($allBill as $item) {
                $id = $item->getId();
                $name = $item->getName();
                $phone = $item->getPhone();
                $address = $item->getAddress();
                $payment = $item->getPayment();
                $status = $item->getStatus();
                $total = $item->getTotal();
                $transactionCode = $item->getTransactionCode();
                $createAt = $item->getCreateAt();
                $modifiedAt = $item->getModifiedAt();
                $modifiedBy = $item->getModifiedBy();
                $usernameModified = $modifiedBy != null ? ($accountDao->getOneByID($modifiedBy))->getUsername() : "";
                $statusText = "";
                $styleStatus = "";
                $isBank = "Tiền mặt";
                $stylePayment = "label-default";
                switch ($status) {
                    case 0:
                        $statusText = "Đơn hàng mới";
                        $styleStatus = "label-success";
                        break;
                    case 1:
                        $statusText = "Đơn xác nhận";
                        $styleStatus = "label-warning";
                        break;
                    case 2:
                        $statusText = "Đơn chuẩn bị hàng";
                        $styleStatus = "label-danger";
                        break;
                    case 3:
                        $statusText = "Đơn gửi đi";
                        $styleStatus = "label-info";
                        break;
                    case 4:
                        $statusText = "Hoàn thành";
                        $styleStatus = "label-primary";
                        break;
                    case -1:
                        $statusText = "Đã hủy";
                        $styleStatus = "label-default";
                        break;
                }
                if($payment == 1) {
                    $isBank = "Chuyển khoản";
                    $stylePayment = "label-warning";
                }
                $index++;
                $bill.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$id."'/></td>
                <td>".$index."</td>
                <td>ĐH".$id."</td>
                <td>".$name."</td>
                <td>".$phone."</td>
                <td>".$address."</td>
                <td><span class = 'label $stylePayment'>".$isBank."</span></td>
                <td><span class = 'label label-warning'>".$transactionCode."</span></td>
                <td>".$createAt."</td>
                <td>".$modifiedAt."</td>
                <td>".$usernameModified."</td>
                <td>".currency_format($total)."</td>
                <td><span class = 'label $styleStatus'>".$statusText."</span></td>
                <td>
                    <a title='xem chi tiết' href='index.php?page=detail-bill&id=".$id."' alt='Xem chi tiết'>
                        <i class='bx bxs-detail'></i>
                    </a>
                    <a target='_blank' title='Xuất đơn hàng' href='index.php?page=print-bill&id=".$id."' alt='In đơn hàng'>
                        <i class='bx bx-printer'></i>
                    </a>
                    <a title='Xóa' href='index.php?page=delete-bill&id=".$id."' onclick='return confirm(".$messageDelete.")'>
                        <i class='fa fa-times text-danger text'></i>
                    </a>
                </td>
              </tr>";
            }
        }
        $bill .="</tbody>
        </table>";
        return $bill;
    }
?>