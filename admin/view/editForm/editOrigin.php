<?php
    $id = $currentOrigin->getId();
    $name = $currentOrigin->getName();
    $country = $currentOrigin->getCountry();
    $status = $currentOrigin->getStatus();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-body form-add active">
          <div class="panel-heading">
            Chỉnh sửa thông tin nhà sản xuất
          </div>
          <div class="position-center">
            <form method = "post" action = "index.php?page=updated-origin" role="form">
                <div class="form-group">
                    <label for="name">Tên nhà sản xuất: </label>
                    <input value="<?=$name?>" required type="text" id="name" name="name" class="form-control">
                    <span class = 'message_error'></span>
                </div>
                <div class="form-group">
                    <label for="country">Quốc gia: </label>
                    <input value="<?=$country?>" required type="text" id="country" name="country" class="form-control">
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
                <button type="submit" id="update-information" name = "update-origin" class="btn btn-info">Lưu</button>
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
    let name = document.querySelector('#name'),
        country = document.querySelector('#country'),
        btnSubmit = document.querySelector('#update-information');
        const messageEmpty = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: name, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
            { element: country, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>