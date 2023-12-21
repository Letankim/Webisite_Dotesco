<?php
    function showIntroduction($allIntroduction) {
        $introduction = '<table class="table table-striped b-t b-light" id="table-data">
        <thead>
          <th style="width:20px;">Chọn</th>
            <th style="width:20px;">
              STT
            </th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th>Tạo bởi</th>
            <th>Cập nhật</th>
            <th>Cập nhật bởi</th>
            <th>Trạng thái</th>
            <th>Xử lí</th>
        </thead>
        <tbody>';
        $index = 0;
        if(count($allIntroduction) > 0) {
            $accountDao = new AccountDao();
            $messageDelete = '"Bạn có chắc muốn xóa?"';
            foreach ($allIntroduction as $item) {
                $id = $item->getId();
                $content = $item->getContent();
                $status = $item->getStatus();
                $createAt = $item->getCreateAt();
                $createBy = $item->getCreateBy();
                $modifiedAt = $item->getModifiedAt();
                $modifiedBy = $item->getModifiedBy();
                $usernameCreate = ($accountDao->getOneByID($createBy))->getUsername();
                $usernameModified = $modifiedBy != null ? ($accountDao->getOneByID($modifiedBy))->getUsername() : "";
                $style = "label label-success";
                $messageStatus = "Hoạt động";
                if($status == 0) {
                    $style = "label label-default";
                    $messageStatus = "Đang ẩn";
                }
                $index++;
                $introduction.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$id."'/></td>
                <td>".$index."</td>
                <td>".$content."</td>
                <td>".$createAt."</td>
                <td>".$usernameCreate."</td>
                <td>".$modifiedAt."</td>
                <td>".$usernameModified."</td>
                <td> <span class='$style'>$messageStatus</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=update-introduction&id=".$id."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a href='index.php?page=delete-introduction&id=".$id."' onclick='return confirm(".$messageDelete.")'>
                        <i class='fa fa-times text-danger text'></i>
                    </a>
                </td>
              </tr>";
            }
        } 
        $introduction."</tbody>
        </table>";
        return $introduction;
    }
?>