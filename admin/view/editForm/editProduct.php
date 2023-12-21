<?php
    $id = $currentProduct->getId();
    $idCategory = $currentProduct->getIdCategory();
    $idOrigin = $currentProduct->getIdOrigin();
    $name = $currentProduct->getName();
    $description = $currentProduct->getDescription();
    $modelID = $currentProduct->getModelID();
    $status = $currentProduct->getStatus();
    $price = $currentProduct->getPrice();
    $priceSale = $currentProduct->getPriceSale();
    $priority = $currentProduct->getPriority();
    $img = $currentProduct->getImg();
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa thông tin nhà sản phẩm
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updated-product" role="form" enctype="multipart/form-data">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="category">Danh mục: </label>
                                <select name="category" id="category">
                                    <?php
                                        if(count($allCategory) > 0) {
                                            foreach($allCategory as $category) {
                                                if($idCategory == $category->getId()) {
                                                    echo "<option value='".$category->getId()."' selected>".$category->getName()."</option>";
                                                } else {
                                                    echo "<option value='".$category->getId()."'>".$category->getName()."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="origin">Nguồn gốc: </label>
                                <select name="origin" id="origin">
                                    <?php
                                        if(count($allOrigin) > 0) {
                                            foreach($allOrigin as $origin) {
                                                if($idOrigin == $origin->getId()) {
                                                    echo "<option value='".$origin->getId()."' selected>".$origin->getName()."</option>";
                                                } else {
                                                    echo "<option value='".$origin->getId()."'>".$origin->getName()."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="model">Model: </label>
                                <input required value="<?=$modelID?>" type="text" id="model" name="model" class="form-control">
                                <span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Tên sản phẩm: </label>
                                <input required value="<?=$name?>" type="text" id="name" name="name" class="form-control">
                                <input value="<?=$id?>" type="hidden"  name="id" class="form-control">
                                <span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm: </label>
                                <input min="0" value="<?=$price?>" required type="number" id="price" name="price" class="form-control">
                                <span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="priceSale">Giá sale sản phẩm: </label>
                                <input min="0" value="<?=$priceSale?>" required type="number" id="priceSale" name="priceSale" class="form-control">
                                <span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="mainImg">Ảnh đại diện: </label>
                                <input onchange="previewImage(event, '.box-img-preview')" type="file" id="mainImg" name="mainImg" class="form-control">
                                <input type="hidden" name="oldMainImg" value="<?=$img?>">
                                <span class = 'message_error'></span> 
                                <div class="box-img-preview">
                                    <img src="<?=PATH_UPLOADS.$img?>" alt="Ảnh chính">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label for="descImg">Ảnh mô tả: </label>
                                <input onchange="previewImage(event, '.box-img-preview.desc')" multiple type="file" id="descImg" name="descImg[]" class="form-control">
                                <div class="box-img-preview desc">
                                    <?php
                                        foreach ($allImgPreview as $item) {
                                            echo "<img src='".PATH_UPLOADS.$item->getSrc()."' alt='Ảnh mô tả'>";
                                        }
                                    ?>
                                </div>
                                <span class = 'message_error'></span><span class = 'message_error'></span>
                            </div>
                            <div class="form-group">
                                <label for="desc">Mô tả sản phẩm: </label>
                                <textarea required name="desc" id="content_post" cols="30" rows="10">
                                    <?=$description?>
                                </textarea>
                                <span class = 'message_error'></span>
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
                            <button type='submit' id="update-information" name = 'update-product' class='btn btn-info'>Chỉnh sửa</button>
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
    let regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let model = document.querySelector('#model'),
        name = document.querySelector('#name'),
        price = document.querySelector('#price'),
        priceSale = document.querySelector('#priceSale'),
        avatar = document.querySelector('#mainImg'),
        imgDesc = document.querySelector('#descImg'),
        desc = document.querySelector('#content_post'),
        btnSubmit = document.querySelector('#update-information');
        const messageEmpty = "Hãy nhập thông tin cho trường này",
            messagePrice = "Trường này phải là số",
            messageImg = "Hãy chọn ảnh hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: name, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: model, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: price, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false},
            { element: price, message: messagePrice, regex: /^[0-9]+(?:\.[0-9]+)?$/, type: "text", isEmpty: false},
            { element: priceSale, message: messagePrice, regex: /^[0-9]+(?:\.[0-9]+)?$/, type: "text", isEmpty: false},
            { element: avatar, message: messageImg, regex: null, type: "image", isEmpty: false},
            { element: imgDesc , message: messageImg, regex: null, type: "image", isEmpty: false},
            { element: desc , message: messageEmpty, regex: null, type: "ckeditor", isEmpty: false}
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>