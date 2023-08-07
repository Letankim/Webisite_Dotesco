<?php
    function showDanhMuc($allDanhMuc) {
        $danhMuc = "";
        $index = 0;
        if(count($allDanhMuc) > 0) {
            foreach ($allDanhMuc as $item) {
                $style = "background-color: #009da7;";
                $messageStatus = "Đang hoạt động";
                if($item['status'] == 0) {
                    $style = "background-color: #aab4b4";
                    $messageStatus = "Đang tắt";
                }
                $index++;
                $danhMuc.= "<tr>
                <td>".$index."</td>
                <td>".$item['name']."</td>
                <td>".$item['date']."</td>
                <td> <span style = '$style' class='status-message'>$messageStatus</span></td>
                <td>
                    <a href='index.php?page=updateCategory&id=".$item['id']."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a style='display: none;' href='index.php?page=deleteCategory&id=".$item['id']."' class = 'deleteSubmit'>
                    </a>
                    <span class = 'deleteBtn' style='cursor: pointer;' alt='Xóa'>
                        <i class='fa fa-times text-danger text'></i>
                    </span>
                </td>
              </tr>";
            }
        } else {
            $danhMuc = "<tr>
                <td colspan='10' style='text-align: center;'>Chưa có danh mục nào</td>
            </tr>";
        }
        return $danhMuc;
    }
?>