<?php
    $username = $currentUser->getUsername();
    $email = $currentUser->getEmail();
    $phone = $currentUser->getPhone();
?>
<div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Thông tin cá nhân</span>
                </h2>
            </div>
            <div class="card-group card_header_product row m-0 mt-xl-5">
                <div class="box-personal-information">
                    <div class="group-personal-information">
                        <label for="">Tên đăng nhập: </label>
                        <span><?=$username?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Email: </label>
                        <span><?=$email?></span>
                    </div>
                    <div class="group-personal-information">
                        <label for="">Số điện thoại: </label>
                        <span><?=$phone?></span>
                    </div>
                    <div class="group-btn-call-pop-up">
                        <button class="btn-change-password" onclick="showPopup('password')">Cập nhật mật khẩu</button>
                        <button class="btn-change-password" onclick="showPopup('information')">Cập nhật thông tin</button>
                    </div>
                    <span class="message-status-update"><?=$message?></span>
                </div>
                <div class="box-change-information change-password card border-0 col-sm-12 col-md-12 col-lg-12 col-12">
                    <h2>Thay đổi mật khẩu</h2>           
                    <form class = "form-contact" method = "post" action="./?act=ca-nhan">
                        <div class="mb-3 form-group">
                            <label for="phone" class="form-label">Mật khẩu cũ: </label>
                            <input id="oldPassword" required type="password" class="form-control" name = "password"  placeholder="Mật khẩu cũ">
                            <span class = 'message_error'></span> 
                        </div>
                        <div class="mb-3 form-group">
                            <label for="phone" class="form-label">Mật khẩu mới:</label>
                            <input id="newPassword" required type="password" class="form-control" name = "newPassword"  placeholder="Mật khẩu mới">
                            <span class = 'message_error'></span> 
                        </div>
                        <div class="form-group form-input-btn">
                            <button id="btn-update-p" type="submit" name="change-password" class="background_main btn-submit-change-information">Cập nhật mật khẩu</button>
                        </div>
                    </form>
                </div>
                <div class="box-change-information change-information card border-0 col-sm-12 col-md-12 col-lg-12 col-12">
                    <h2>Thay đổi thông tin</h2>           
                    <form class = "form-contact" method = "post" action="./?act=ca-nhan">
                        <div class="mb-3 form-group">
                            <label for="username" class="form-label">Username: </label>
                            <input value="<?=$username?>" type="text" class="form-control" name = "username" readonly>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="email" class="form-label">Email: </label>
                            <input id="email-i" value="<?=$email?>" required type="email" class="form-control" name = "email" placeholder="Email">
                            <span class = 'message_error'></span> 
                        </div>
                        <div class="mb-3 form-group">
                            <label for="phone" class="form-label">Số điện thoại: </label>
                            <input id="phone-i" value="<?=$phone?>" type="phone" class="form-control" name = "phone" placeholder="Số điện thoại">
                            <span class = 'message_error'></span> 
                        </div>
                        <div class="form-group form-input-btn">
                            <button id="btn-update-i" type="submit" name="change-information" class="background_main btn-submit-change-information">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="overlay-personal" onclick="closePopup()"></div>
            <div class="box-bill">
                <div class="information-bill">
                    <h2 class = "title-information">Thông tin đơn hàng </h2>
                    <div class="details-bill">
                        <table>
                            <thead>
                                <td>STT</td>
                                <td>Mã ĐH</td>
                                <td>Tên</td>
                                <td>Địa chỉ</td>
                                <td>Số điện thoại</td>
                                <td>Tổng đơn</td>
                                <td>Trạng thái</td>
                                <td>Xem chi tiết</td>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($billOfUser) && count($billOfUser) > 0) {
                                        $index = 1;
                                        foreach($billOfUser as $item) {
                                            $status = "";
                                            switch ($item->getStatus()) {
                                                case 0:
                                                    $status = "Chờ xác nhận";
                                                    break;
                                                case 1:
                                                    $status = "Đã xác nhận";
                                                    break;
                                                case 2:
                                                    $status = "Đã chuẩn bị hàng";
                                                    break;
                                                case 3:
                                                    $status = "Đã gửi đi";
                                                    break;
                                                case 4:
                                                    $status = "Hoàn thành";
                                                    break;
                                            }
                                            echo "<tr>
                                            <td>".$index."</td>
                                            <td>ĐH".$item->getId()."</td>
                                            <td>".$item->getName()."</td>
                                            <td>".$item->getAddress()."</td>
                                            <td>".$item->getPhone()."</td>
                                            <td>".currency_format($item->getTotal())."</td>
                                            <td>".$status."</td>
                                            <td>
                                                <a title='Xem chi tiết' href='?act=xem-chi-tiet-don-hang&id=".$item->getId()."'>
                                                    <i class='bx bx-notepad'></i>
                                                </a>
                                            </td>
                                            </tr>";
                                            $index++;
                                        }
                                    } else {
                                        echo "<tr>
                                        <td colspan='14'>Chưa có đơn hàng nào nào</td>
                                    </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="show-details-in-bill">
                            <!-- render -->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let linkEle = document.createElement('link');
    linkEle.setAttribute('rel', 'stylesheet');
    linkEle.setAttribute('href', './assets/css/personal.css');
    document.querySelector("head").appendChild(linkEle);
    const title = document.querySelector('title');
    title.innerHTML = 'Thông tin cá nhân';
</script>
<script src="./assets/js/personal.js"></script>
<script src='./assets/js/validation.js'></script>
<script>
    let regexEmailI = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let passwordOld = document.querySelector('#oldPassword'),
        passwordNew = document.querySelector('#newPassword'),
        emailI = document.querySelector('#email-i'),
        phoneI = document.querySelector('#phone-i'),
        btnSubmitIP = document.querySelector('#btn-update-p'),
        btnSubmitI = document.querySelector('#btn-update-i');;
        const messageEmailI = "Email không hợp lệ",
            messagePasswordI = "Password phải từ 8 kí tự",
            messagePhoneI= "Số điện thoại không hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheckIP = [
            { element: passwordOld, message: messagePasswordI, regex: /^[a-zA-Z0-9.,!#$%&'*+/=?^_]{8,}$/, type: "text", isEmpty: false},
            { element: passwordNew, message: messagePasswordI, regex: /^[a-zA-Z0-9.,!#$%&'*+/=?^_]{8,}$/, type: "text", isEmpty: false},
        ];
        const inputsToValidateCheckI = [
            { element: phoneI, message: messagePhoneI, regex: /^(?:(84|0[3|5|7|8|9])+([0-9]{8}))$/, type: "text", isEmpty: false},
            { element: emailI, message: messageEmailI, regex: regexEmailI, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheckIP, btnSubmitIP);
        validation(inputsToValidateCheckI, btnSubmitI);
</script>