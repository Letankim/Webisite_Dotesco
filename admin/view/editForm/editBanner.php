<?php
    $id = $currentBanner->getId();
    $img = $currentBanner->getImg();
    $status = $currentBanner->getStatus();
    $priority = $currentBanner->getPriority();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa banner
                    </div>
                    <div class="position-center">
                        <form enctype="multipart/form-data" method = "post" action = "index.php?page=updated-banner" role="form">
                            <div class="form-group">
                                <label for="imgBanner">Ảnh đại diện: </label>
                                <input type="file" id="imgBanner" name="imgBanner" class="form-control" onchange="previewImage(event, '.box-img-preview')">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <input type="hidden" name="oldBanner" value="<?=$img?>">
                                <span class = 'message_error'></span>
                                <div class="box-img-preview">
                                    <img src="<?=PATH_UPLOADS.$img?>" alt="Banner">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label for="priority">Ưu tiên: </label>
                                <select name="priority" id="priority">
                                    <?php
                                        if($priority == 1) {
                                            echo "<option value='0'>Bình thường</option>
                                            <option value='1' selected>Ưu tiên</option>";
                                        } else  {
                                            echo "<option value='0' selected>Bình thường</option>
                                            <option value='1'>Ưu tiên</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status: </label>
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
                            <button type="submit" id="update-information" name = "update-banner" class="btn btn-info">Lưu</button>
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
    let img = document.querySelector('#imgBanner'),
        btnSubmit = document.querySelector('#update-information');
        const messageImg = "Hãy chọn ảnh hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: img, message: messageImg, regex: null, type: "image", isEmpty: false },
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>