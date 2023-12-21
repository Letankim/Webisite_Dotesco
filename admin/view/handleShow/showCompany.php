<?php

  

    function showCompany($allCompany) {
        $company = '<table class="table table-striped b-t b-light" id="table-data">
        <thead>
          <th style="width:20px;">Chọn</th>
            <th style="width:20px;">STT</th>
            <th>Tên công ty</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Ngày tạo</th>
            <th>Người tạo</th>
            <th>Cập nhật</th>
            <th>Người cập nhật</th>
            <th>Trạng thái</th>
            <th>Xử lí</th>
        </thead>
        <tbody>';
        $index = 0;
        if(count($allCompany) > 0) {
            $accountDao = new AccountDao();
            foreach ($allCompany as $item) {
                $id = $item->getId();
                $name = $item->getName();
                $address = $item->getAddress();
                $email = $item->getEmail();
                $phone = $item->getPhone();
                $status = $item->getStatus();
                $createAt = $item->getCreateAt();
                $createBy = $item->getCreateBy();
                $modifiedAt = $item->getModifiedAt();
                $modifiedBy = $item->getModifiedBy();
                $usernameCreate = ($accountDao->getOneByID($createBy))->getUsername();
                $usernameModified = $modifiedBy != null ? ($accountDao->getOneByID($modifiedBy))->getUsername() : "";
                $status = $item->getStatus();
                $style = "label label-success";
                $messageDelete = '"Bạn có chắc muốn xóa?"';
                $messageStatus = "Hoạt động";
                if($status == 0) {
                    $style = "label label-default";
                    $messageStatus = "Đang ẩn";
                }
                $index++;
                $company.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$id."'/></td>
                <td>".$index."</td>
                <td>".$name."</td>
                <td>".$address."</td>
                <td>".$email."</td>
                <td>".$phone."</td>
                <td>".$createAt."</td>         
                <td>".$usernameCreate."</td>
                <td>".$modifiedAt."</td>
                <td>".$usernameModified."</td>
                <td> <span class='".$style."'>$messageStatus</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=update-company&id=".$id."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a href='index.php?page=delete-company&id=".$id."' class = 'deleteSubmit' onclick='return confirm(".$messageDelete.")'>
                        <i class='fa fa-times text-danger text'></i>
                    </a>
                </td>
              </tr>";
            }
        }
        $company.'</tbody>
        </table>';
        return $company;
    }
?>