<?php
    $id = $currentIntroduction->getId();
    $content = $currentIntroduction->getContent();
    $status = $currentIntroduction->getStatus();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa thông tin công ty
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updated-introduction" role="form">
                            <div class="form-group">
                                <label for="desc">Giới thiệu về công ty: </label>
                                <textarea required name="introduction" id="content_post" cols="30" rows="10"><?=$content?></textarea>
                                <input type="hidden" name="id" value=<?=$id?>>
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
                            <button type="submit" id="update-information" name = "update-introduction" class="btn btn-info">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>
<script src="./ckeditor/ckeditor.js"></script>
<script>
    let editor = "";
    if(document.getElementById("content_post")) {
        editor = CKEDITOR.replace('content_post');
    }
</script>

<script src='./assets/js/validation.js'></script>
<script>
    let introduction = document.querySelector('#content_post');
        btnSubmit = document.querySelector('#update-information');
        const messageEmpty = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: introduction, message: messageEmpty, regex: "content_post", type: "ckeditor", isEmpty: false},
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>