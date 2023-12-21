<?php
    function showBanner($allBanner) {
        $banner = '<table class="table table-striped b-t b-light" id="table-data">
        <thead>
            <th style="width:20px;">Chọn</th>
            <th style="width:20px;">
              STT
            </th>
            <th>Hình ảnh</th>
            <th>Ngày tạo</th>
            <th>Tạo bởi</th>
            <th>Cập nhật</th>
            <th>Cập nhật bởi</th>
            <th>Ưu tiên</th>
            <th>Trạng thái</th>
            <th>Xử lí</th>
        </thead>
        <tbody>';
        $index = 0;
        if(count($allBanner) > 0) {
            $accountDao = new AccountDao();
            $messageDelete = '"Bạn có chắc muốn xóa?"';
            foreach ($allBanner as $item) {
                $id = $item->getId();
                $img = $item->getImg();
                $status = $item->getStatus();
                $priority = $item->getPriority();
                $createAt = $item->getCreateAt();
                $createBy = $item->getCreateBy();
                $modifiedAt = $item->getModifiedAt();
                $modifiedBy = $item->getModifiedBy();
                $usernameCreate = ($accountDao->getOneByID($createBy))->getUsername();
                $usernameModified = $modifiedBy != null ? ($accountDao->getOneByID($modifiedBy))->getUsername() : "";
                $styleStatus = "label label-success";
                $stylePriority = "label label-info";
                $messageStatus = "Hoạt động";
                $messagePriority = "Bình thường";
                if($status == 0) {
                    $styleStatus = "label label-default";
                    $messageStatus = "Đang ẩn";
                }

                if($priority == 1) {
                    $messagePriority = "Ưu tiên";
                    $stylePriority = "label label-warning";
                }
                $srcImg = PATH_UPLOADS.$img;
                $index++;
                $banner.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$id."'/></td>
                <td>".$index."</td>
                <td><img style='width: 70px;' src='".$srcImg ."'/></td>
                <td>".$createAt."</td>
                <td>".$usernameCreate."</td>
                <td>".$modifiedAt."</td>
                <td>".$usernameModified."</td>
                <td> <span class='$stylePriority'>$messagePriority</span></td>
                <td> <span class='$styleStatus'>$messageStatus</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=update-banner&id=".$id."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a title='Xóa' href='index.php?page=delete-banner&id=".$id."' onclick='return confirm(".$messageDelete.")'>
                        <i class='fa fa-times text-danger text'></i>
                    </a>
                </td>
              </tr>";
            }
        }
        $banner.="</tbody>
        </table>";
        return $banner;
    }
?>