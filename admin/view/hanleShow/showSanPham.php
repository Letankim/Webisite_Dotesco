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
                if($item['status'] == 0) {
                    $style = "background-color: #aab4b4";
                    $messageStatus = "Đang tắt";
                }
                $srcImg = PATH_UPLOADS.$item['img'];
                $index++;
                $sanPham.= "<tr>
                <td>".$index."</td>
                <td>".$item['modelID']."</td>
                <td>".$danhMuc."</td>
                <td>".$nhaSanXuat."</td>
                <td>".$item['name']."</td>
                <td><img style='width: 70px;' src='".$srcImg ."'/></td>
                <td>".$item['date']."</td>
                <td> <span style = '$style' class='status-message'>$messageStatus</span></td>
                <td>
                    <a href='index.php?page=updateSanPham&id=".$item['id']."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a style='display: none;' href='index.php?page=deleteSanPham&id=".$item['id']."' class = 'deleteSubmit'>
                    </a>
                    <span class = 'deleteBtn' style='cursor: pointer;' alt='Xóa'>
                        <i class='fa fa-times text-danger text'></i>
                    </span>
                    <a href='index.php?page=xemSanPhamChiTiet&id=".$item['id']."' alt='Chỉnh sửa'>
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