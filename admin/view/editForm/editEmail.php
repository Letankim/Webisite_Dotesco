<?php
    $id = $currentEmail->getId();
    $email = $currentEmail->getEmail();
    $status = $currentEmail->getStatus();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa email nhận phản hồi
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updated-email" role="form">
                            <div class="form-group">
                            <label for="email">Email: <b style = "color:red;">* Đây là email rất quan trọng đảm bảo rằng nó hợp lệ</b></label>
                                <input value="<?=$email?>" required type="email" id="email" name="email" class="form-control">
                                <input type="hidden" name="id" value="<?=$id?>">
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
                            <button type="submit" id="update-information" name = "update-email" class="btn btn-info">Lưu</button>
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
    let email = document.querySelector('#email'),
        btnSubmit = document.querySelector('#update-information');
        const messageEmail = "Hãy nhập email hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: email, message: messageEmail, regex: regexEmail, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>