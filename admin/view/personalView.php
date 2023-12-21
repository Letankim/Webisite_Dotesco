<?php
    $id = $currentAccount->getId();
    $username = $currentAccount->getUsername();
    $password = $currentAccount->getPassword();
    $email = $currentAccount->getEmail();
    $phone = $currentAccount->getPhone();
    $avatar = $currentAccount->getAvatar();
    $avatar = $avatar == null ? "default-avatar-profile.jpg": $avatar;
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa tài khoản
                    </div>
                    <div class="position-center">
                        <form enctype="multipart/form-data" method = "post" action = "index.php?page=updated-personal" role="form">
                            <div class="form-group">
                                <label for="username">Username: </label>
                                <input value="<?=$username?>" readonly type="text" id="username" name="username" class="form-control">
                                <span class = 'message_error'></span> 
                            </div>
                            <div class="form-group">
                                <label for="email">Email:  </label>
                                <input value="<?=$email?>" required type="email" id="email" name="email" class="form-control">
                                <span class = 'message_error'></span> 
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone: </label>
                                <input required value="<?=$phone?>" type="phone" id="phone" name="phone" class="form-control">
                                <span class = 'message_error'></span> 
                            </div>
                            <div class="form-group">
                                <label for="password">Password:  </label>
                                <input  type="password" id="password" name="password" class="form-control">
                                <input type="hidden" name="oldPassword" value="<?=$password?>">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <span class = 'message_error'></span> 
                            </div>
                            <div class="form-group">
                                <label for="avatar">Ảnh đại diện: </label>
                                <input type="file" id="avatar" name="avatar" class="form-control" onchange="previewImage(event, '.box-img-preview')">
                                <input type="hidden" name="oldAvatar" value="<?=$avatar?>">
                                <span class = 'message_error'></span> 
                                <div class="box-img-preview">
                                    <img src="<?=PATH_UPLOADS.$avatar?>" alt="Avatar">
                                </div>
                            </div>
                            <button type="submit" id="update-information" name = "update-personal" class="btn btn-info">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>
<script src='./assets/js/validation.js'></script>
<script>
    let regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let password = document.querySelector('#password'),
        phone = document.querySelector('#phone'),
        email = document.querySelector('#email'),
        $avatar = document.querySelector('#avatar'),
        btnSubmit = document.querySelector('#update-information');
        const messagePassword = "Password ít nhất 8 kí tự. Không cách",
            messagePhone = "Hãy nhập số điện thoại hợp lệ",
            messageEmail = "Hãy nhập email hợp lệ",
            messageImg = "Hãy chọn ảnh hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: password, message: messagePassword, regex: /^(?:[a-zA-Z0-9.,!#$%&'*+/=?^_]{8,})?$/, type: "text", isEmpty: true},
            { element: email, message: messageEmail, regex: regexEmail, type: "text", isEmpty: false},
            { element: phone , message: messagePhone, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false},
            { element: avatar , message: messageImg, regex: null, type: "image", isEmpty: false},
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>