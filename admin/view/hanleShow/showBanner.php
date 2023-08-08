<?php
    function showBanner($allBanner) {
        $banner = "";
        $index = 0;
        if(count($allBanner) > 0) {
            foreach ($allBanner as $item) {
                $style = "background-color: #009da7;";
                $messageStatus = "Đang hoạt động";
                $messagePrioriry = "Bình thường";
                if($item['status'] == 0) {
                    $style = "background-color: #aab4b4";
                    $messageStatus = "Đang tắt";
                }

                if($item['priority'] == 1) {
                    $messagePrioriry = "Ưu tiên";
                }
                $srcImg = PATH_UPLOADS.$item['img'];
                $index++;
                $banner.= "<tr>
                <td>".$index."</td>
                <td><img style='width: 70px;' src='".$srcImg ."'/></td>
                <td>".$item['date']."</td>
                <td> <span class='status-message label label-warning'>$messagePrioriry</span></td>
                <td> <span style = '$style' class='status-message'>$messageStatus</span></td>
                <td>
                    <a href='index.php?page=updateBanner&id=".$item['id']."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a style='display: none;' href='index.php?page=deleteBanner&id=".$item['id']."' class = 'deleteSubmit'>
                    </a>
                    <span class = 'deleteBtn' style='cursor: pointer;' alt='Xóa'>
                        <i class='fa fa-times text-danger text'></i>
                    </span>
                </td>
              </tr>";
            }
        } else {
            $banner = "<tr>
                <td colspan='10' style='text-align: center;'>Chưa có banner nào</td>
            </tr>";
        }
        return $banner;
    }
?>