<?php
    function showSanPham($allSanPham) {
        $sanPham = "";
        $index = 0;
        if(count($allSanPham) > 0) {
            foreach ($allSanPham as $item) {
                $danhMuc = getCategoryByID($item['idCategory'])['name'];
                $nhaSanXuat = getNguonGocByID($item['idOrigin'])['name'];
                $style = "background-color: #009da7;";
                $messageStatus = "Đang hoạt động";
                $messageFeatured = "Bình thường";
                if($item['status'] == 0) {
                    $style = "background-color: #aab4b4";
                    $messageStatus = "Đang tắt";
                }
                if($item['priority'] == 1) {
                    $messageFeatured = "Nổi bật";
                }
                $srcImg = PATH_UPLOADS.$item['img'];
                $index++;
                $sanPham.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$item['id']."'/></td>
                <td>".$index."</td>
                <td>".$item['modelID']."</td>
                <td>".$danhMuc."</td>
                <td>".$nhaSanXuat."</td>
                <td>".$item['name']."</td>
                <td><img style='width: 70px;' src='".$srcImg ."'/></td>
                <td>".$item['date']."</td>
                <td>".$item['view']."</td>
                <td> <span style = '$style' class='status-message'>$messageStatus</span></td>
                <td> <span class='status-message label label-success'>$messageFeatured</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=updateSanPham&id=".$item['id']."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a style='display: none;' href='index.php?page=deleteSanPham&id=".$item['id']."' class = 'deleteSubmit'>
                    </a>
                    <span title='Xóa' class = 'deleteBtn' style='cursor: pointer;' alt='Xóa'>
                        <i class='fa fa-times text-danger text'></i>
                    </span>
                    <a title='Xem chi tiết' href='index.php?page=xemSanPhamChiTiet&id=".$item['id']."' alt='Chỉnh sửa'>
                        <i class='bx bxs-detail'></i>
                    </a>
                </td>
              </tr>";
            }
        } else {
            $sanPham = "<tr>
                <td colspan='10' style='text-align: center;'>Chưa có thông tin sản phẩm nào nào</td>
            </tr>";
        }
        return $sanPham;
    }
?>