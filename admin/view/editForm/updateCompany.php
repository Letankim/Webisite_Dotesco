<?php
    $id = $currentCompany->getId();
    $name = $currentCompany->getName();
    $address = $currentCompany->getAddress();
    $phone = $currentCompany->getPhone();
    $email = $currentCompany->getEmail();
    $status = $currentCompany->getStatus();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa danh mục
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updated-company" role="form">
                            <div class="form-group">
                                <label for="nameCategory">Tên công ty: </label>
                                <input type="text" id="nameCompany" value = "<?=$name?>" name="name" class="form-control">
                                <input type="hidden" value = "<?=$id?>" name="id">
                                <span class = 'message_error'></span>                                     
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ: </label>
                                <input value = "<?=$address?>" required type="address" id="address" name="address" class="form-control">
                                <span class = 'message_error'></span>    
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại: </label>
                                <input value = "<?=$phone?>" required  type="phone" id="phone" name="phone" class="form-control">
                                <span class = 'message_error'></span>                                     
                            </div>
                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input value = "<?=$email?>" required type="email" id="email" name="email" class="form-control">
                                <span class = 'message_error'></span>                                     
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
                            <button type="submit" id="update-information" name = "update" class="btn btn-info">Lưu</button>
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
    let name = document.querySelector('#nameCompany'),
        address = document.querySelector('#address'),
        phone = document.querySelector('#phone'),
        email = document.querySelector('#email'),
        btnSubmit = document.querySelector('#update-information');
        const messageEmpty = "Hãy nhập thông tin cho trường này",
            messagePhone = "Hãy nhập số điện thoại hợp lệ",
            messageEmail = "Hãy nhập email hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: name, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
            { element: address, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
            { element: email, message: messageEmail, regex: regexEmail, type: "text", isEmpty: false },
            { element: phone , message: messagePhone, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>