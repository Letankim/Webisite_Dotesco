<?php
    function showCategory($allCategory) {
        $category = '<table class="table table-striped b-t b-light" id="table-data">
        <thead>
          <th style="width:20px;">Chọn</th>
            <th style="width:20px;">
              STT
            </th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Tạo bởi</th>
            <th>Cập nhật</th>
            <th>Cập nhật bởi</th>
            <th>Số sản phẩm</th>
            <th>Trạng thái</th>
            <th>Xử lí</th>
        </thead>
        <tbody>';
        $index = 0;
        if(count($allCategory) > 0) {
            $accountDao = new AccountDao();
            $categoryDao = new CategoryDao();
            $messageDelete = '"Bạn có chắc muốn xóa?"';
            foreach ($allCategory as $item) {
                $id = $item->getId();
                $name = $item->getName();
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
                $category.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$id."'/></td>
                <td>".$index."</td>
                <td>".$name."</td>
                <td>".$createAt."</td>
                <td>".$usernameCreate."</td>
                <td>".$modifiedAt."</td>
                <td>".$usernameModified."</td>
                <td>".$categoryDao->getNumberOfProductByCategory($id)."</td>
                <td> <span class='$style'>$messageStatus</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=update-category&id=".$id."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a href='index.php?page=delete-category&id=".$id."'onclick='return confirm(".$messageDelete.")'>
                        <i class='fa fa-times text-danger text'></i>
                    </a>
                </td>
              </tr>";
            }
        }
        $category.="</tbody>
        </table>";
        return $category;
    }
?>