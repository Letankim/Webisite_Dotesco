<?php
    function showAccount($allAccount) {
        $account = "";
        $index = 0;
        if(count($allAccount) > 0) {
            foreach ($allAccount as $item) {
                $style = "background-color: #009da7;";
                $messageRole = "Người dùng";
                if($item['role'] == 1) {
                    $messageRole = "Admin";
                }
                $messageStatus = "Đang hoạt động";
                if($item['status'] == 0) {
                    $style = "background-color: #aab4b4";
                    $messageStatus = "Đang tắt";
                }
                $index++;
                $account.= "<tr> <td>";
                if($item['role'] != 1) {
                    $account.="<input type='checkbox' class = 'check-item' value='".$item['id']."'/>";
                }  
                $account.="</td><td>".$index."</td>
                <td>".$item['username']."</td>
                <td>".$item['email']."</td>
                <td>".$item['date']."</td>
                <td> <span style = '$style' class='status-message'>$messageStatus</span></td>
                <td> <span class='status-message label label-success'>$messageRole</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=updateAccount&id=".$item['id']."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>";
                if($item['role'] == 0) {
                    $account.="<a style='display: none;' href='index.php?page=deleteAccount&id=".$item['id']."' class = 'deleteSubmit'>
                    </a>
                    <span title='Xóa' class = 'deleteBtn' style='cursor: pointer;' alt='Xóa'>
                        <i class='fa fa-times text-danger text'></i>
                    </span>";
                }
                $account.="</td>
                </tr>";
            }
        } else {
            $account = "<tr>
                <td colspan='10' style='text-align: center;'>Chưa có tài khoản nào</td>
            </tr>";
        }
        return $account;
    }
?>