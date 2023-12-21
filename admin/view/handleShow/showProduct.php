<?php
    function showProduct($allProduct) {
        $product = '<table class="table table-striped" id="table-data">
        <thead>
            <th style="width:20px;">Chọn</th>
            <th style="width:20px;">STT</th>
            <th>Model</th>
            <th>Danh mục</th>
            <th>Nhà sản xuất</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Sale</th>
            <th>Ngày tạo</th>
            <th>Tạo bởi</th>
            <th>Cập nhật</th>
            <th>Cập nhật bởi</th>
            <th>Lượt xem</th>
            <th>Trạng thái</th>
            <th>Nổi bật</th>
            <th>Xử lí</th>
        </thead>
        <tbody class = "show-product">';
        $index = 0;
        if(count($allProduct) > 0) {
            $categoryDao = new CategoryDao();
            $originDao = new OriginDao();
            $accountDao = new AccountDao();
            $messageDelete = '"Bạn có chắc muốn xóa?"';
            foreach ($allProduct as $item) {
                $id = $item->getId();
                $category = $categoryDao->getOneByID($item->getIdCategory())->getName();
                $origin = $originDao->getOneByID($item->getIdOrigin())->getName();
                $status = $item->getStatus();
                $name = $item->getName();
                $model = $item->getModelID();
                $img = $item->getImg();
                $price = $item->getPrice();
                $priceSale = $item->getPriceSale();
                $createAt = $item->getCreateAt();
                $createBy = $item->getCreateBy();
                $modifiedBy = $item->getModifiedBy();
                $modifiedAt = $item->getModifiedAt();
                $status = $item->getStatus();
                $view = $item->getView();
                $priority = $item->getPriority();
                $usernameCreate = ($accountDao->getOneByID($createBy))->getUsername();
                $usernameModified = $modifiedBy != null ? ($accountDao->getOneByID($modifiedBy))->getUsername() : "";
                $styleStatus = "label label-success";
                $stylePriority = "label label-info";
                $messageStatus = "Hoạt động";
                $messageFeatured = "Bình thường";
                if($status == 0) {
                    $style = "label label-default";
                    $messageStatus = "Đang ẩn";
                }
                if($priority == 1) {
                    $messageFeatured = "Nổi bật";
                    $stylePriority = "label label-warning";
                }
                $srcImg = "../uploads/".$img;
                $index++;
                $product.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$id."'/></td>
                <td>".$index."</td>
                <td>".$model."</td>
                <td>".$category."</td>
                <td>".$origin."</td>
                <td>".$name."</td>
                <td><img style='width: 70px;' src='".$srcImg ."'/></td>
                <td>".currency_format($price)."</td>
                <td>".currency_format($priceSale)."</td>
                <td>".$createAt."</td>
                <td>".$usernameCreate."</td>
                <td>".$modifiedAt."</td>
                <td>".$usernameModified."</td>
                <td>".$view."</td>
                <td> <span class='$styleStatus'>$messageStatus</span></td>
                <td> <span class='$stylePriority'>$messageFeatured</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=update-product&id=".$id."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a href='index.php?page=delete-product&id=".$id."' onclick='return confirm(".$messageDelete.")'>
                        <i class='fa fa-times text-danger text'></i>
                    </a>
                    <a title='Xem chi tiết' href='index.php?page=detail-product&id=".$id."'>
                        <i class='bx bxs-detail'></i>
                    </a>
                </td>
              </tr>";
            }
        } 
        $product.="          
        </tbody>
      </table>";
        return $product;
    }
?>