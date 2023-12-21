<?php
    function showAccount($allAccount) {
        $account = '<table class="table table-striped b-t b-light" id="table-data">
        <thead>
          <tr>
            <th style="width:20px;">Chọn</th>
            <th style="width:20px;">STT</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Trạng thái</th>
            <th>Vai trò</th>
            <th style="width:30px;">Xử lí</th>
          </tr>
        </thead>
        <tbody>';
        $index = 0;
        if(count($allAccount) > 0) {
            $messageDelete = '"Bạn có chắc muốn xóa?"';
            foreach ($allAccount as $item) {
                $id = $item->getId();
                $username = $item->getUsername();
                $email = $item->getEmail();
                $phone = $item->getPhone();
                $createAt = $item->getCreateAt();
                $modifiedAt = $item->getModifiedAt();
                $role = $item->getRole();
                $status = $item->getStatus();
                $styleRole = "label label-warning";
                $styleStatus = "label label-success";
                $messageRole = "Người dùng";
                if($role == 1) {
                    $messageRole = "Admin";
                    $styleRole = "label label-danger";
                }
                $messageStatus = "Hoạt động";
                if($status == 0) {
                    $styleStatus = "label label-default";
                    $messageStatus = "Đang khóa";
                }
                $index++;
                $account.= "<tr> <td>";
                if($role!= 1) {
                    $account.="<input type='checkbox' class = 'check-item' value='".$id."'/>";
                }  
                $account.="</td>
                <td>".$index."</td>
                <td>".$username."</td>
                <td><a href='mailto:".$email."' target='_blank'>".$email."</a></td>
                <td>".$phone."</td>
                <td>".$createAt."</td>
                <td>".$modifiedAt."</td>
                <td> <span class='$styleStatus'>$messageStatus</span></td>
                <td> <span class='$styleRole'>$messageRole</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=update-account&id=".$id."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>";
                if($role == 0) {
                    $account.="<a title='Xóa' href='index.php?page=delete-account&id=".$id."' onclick='return confirm(".$messageDelete.")'>
                    <i class='fa fa-times text-danger text'></i>
                    </a>";
                }
                $account.="</td>
                </tr>";
            }
        }
        $account .= "</tbody>
        </table>";
        return $account;
    }
?>