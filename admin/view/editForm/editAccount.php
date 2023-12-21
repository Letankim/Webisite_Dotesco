<?php
    $id = $currentAccount->getId();
    $username = $currentAccount->getUsername();
    $password = $currentAccount->getPassword();
    $role = $currentAccount->getRole();
    $status = $currentAccount->getStatus();
    $email = $currentAccount->getEmail();
    $phone = $currentAccount->getPhone();
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
                        <form enctype="multipart/form-data" method = "post" action = "index.php?page=updated-account" role="form">
                            <div class="form-group">
                                <label for="username">Username: </label>
                                <input value="<?=$username?>" readonly type="text" id="username" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input value="<?=$email?>" required type="email" id="email" name="email" class="form-control">
                                <span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone: </label>
                                <input required value="<?=$phone?>" type="phone" id="phone" name="phone" class="form-control">
                                <span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input type="password" id="password" name="password" class="form-control">
                                <input type="hidden" name="oldPassword" value="<?=$password?>">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role">
                                    <?php
                                        if($role == 1) {
                                            echo "<option value='0'>Người dùng</option>
                                            <option value='1' selected>Admin</option>";
                                        } else {
                                            echo "<option value='0' selected>Người dùng</option>
                                            <option value='1'>Admin</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <?php
                                        if($status == 1) {
                                            echo "<option value='0'>Không hoạt động</option>
                                            <option value='1' selected>Hoạt động</option>";
                                        } else  {
                                            echo "<option value='0' selected>Không hoạt động</option>
                                            <option value='1'>Hoạt động</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" id="update-information" name = "update-account" class="btn btn-info">Lưu</button>
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
        btnSubmit = document.querySelector('#update-information');
        const  messagePassword = "Password ít nhất 8 kí tự. Không cách",
            messagePhone = "Hãy nhập số điện thoại hợp lệ",
            messageEmail = "Hãy nhập email hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: password, message: messagePassword, regex: /^(?:[a-zA-Z0-9.,!#$%&'*+/=?^_]{8,})?$/, type: "text", isEmpty: true},
            { element: email, message: messageEmail, regex: regexEmail, type: "text", isEmpty: false},
            { element: phone , message: messagePhone, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>