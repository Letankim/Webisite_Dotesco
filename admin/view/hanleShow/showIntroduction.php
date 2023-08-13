<?php
    function showIntroduction($allIntroduction) {
        $introduction = "";
        $index = 0;
        if(count($allIntroduction) > 0) {
            foreach ($allIntroduction as $item) {
                $style = "background-color: #009da7;";
                $messageStatus = "Đang hoạt động";
                if($item['status'] == 0) {
                    $style = "background-color: #aab4b4";
                    $messageStatus = "Đang tắt";
                }
                $index++;
                $introduction.= "<tr>
                <td><input type='checkbox' class = 'check-item' value='".$item['id']."'/></td>
                <td>".$index."</td>
                <td>".$item['content']."</td>
                <td>".$item['date']."</td>
                <td> <span style = '$style' class='status-message'>$messageStatus</span></td>
                <td>
                    <a title='Chỉnh sửa' href='index.php?page=updateIntroduction&id=".$item['id']."' alt='Chỉnh sửa'>
                        <i class='bx bx-edit-alt' style='color: green;'></i>
                    </a>
                    <a style='display: none;' href='index.php?page=deleteIntroduction&id=".$item['id']."' class = 'deleteSubmit'>
                    </a>
                    <span title='Xóa' class = 'deleteBtn' style='cursor: pointer;' alt='Xóa'>
                        <i class='fa fa-times text-danger text'></i>
                    </span>
                </td>
              </tr>";
            }
        } else {
            $introduction = "<tr>
                <td colspan='10' style='text-align: center;'>Chưa có thông tin nào về công ty</td>
            </tr>";
        }
        return $introduction;
    }
?>