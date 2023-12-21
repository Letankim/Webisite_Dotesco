<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm thông tin sản phẩm
          </div>
          <div class="position-center">
            <form method = "post" action = "index.php?page=add-product" role="form" enctype="multipart/form-data">
                <div class="form-group" style="margin-top: 10px;">
                    <label for="category">Danh mục: </label>
                    <select name="category" id="category">
                        <?php
                            if(count($allCategory) > 0) {
                                foreach($allCategory as $category) {
                                    echo "<option value='".$category->getId()."'>".$category->getName()."</option>";
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
                                    echo "<option value='".$origin->getId()."'>".$origin->getName()."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="model">Model: </label>
                    <input required type="text" id="model" name="model" class="form-control">
                    <span class = 'message_error'></span> 
                </div>
                <div class="form-group">
                    <label for="name">Tên sản phẩm: </label>
                    <input required type="text" id="name" name="name" class="form-control">
                    <span class = 'message_error'></span> 
                </div>
                <div class="form-group">
                    <label for="price">Giá sản phẩm: <b style="color: red;">* Sản phẩm có giá 0 sẽ là liên hệ</b></label>
                    <input min="0" value="0" required type="text" id="price" name="price" class="form-control">
                    <span class = 'message_error'></span> 
                </div>
                <div class="form-group">
                    <label for="priceSale">Giá sale:</label>
                    <input min="0" value="0" required type="text" id="priceSale" name="priceSale" class="form-control">
                    <span class = 'message_error'></span> 
                </div>
                <div class="form-group">
                    <label for="mainImg">Ảnh đại diện: <b style="color: red;">* Chấp nhận ('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp')</b></label>
                    <input onchange="previewImage(event, '.box-img-preview')" required type="file" id="mainImg" name="mainImg" class="form-control">
                    <span class = 'message_error'></span> 
                    <div class="box-img-preview">

                    </div> 
                </div>
                <div class="form-group">
                    <label for="descImg">Ảnh mô tả: <b style="color: red;">* Chấp nhận ('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp')</b></label>
                    <input onchange="previewImage(event, '.box-img-preview.desc')" multiple type="file" id="descImg" name="descImg[]" class="form-control">
                    <span class = 'message_error'></span> 
                    <div class="box-img-preview desc">

                    </div> 
                </div>
                <div class="form-group">
                    <label for="desc">Mô tả sản phẩm: </label>
                    <textarea required name="desc" id="content_post" cols="30" rows="10"></textarea>
                   , isEmpty: true
                </div>
                <div class="form-group">
                    <label for="priority">Ưu tiên: </label>
                    <select name="priority" id="priority">
                        <option value="1">Ưu tiên</option>
                        <option value="0">Bình thường</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <?php
                    if(count($allCategory) > 0 && count($allOrigin) > 0) {
                        echo "<button type='submit' id='add-new' name = 'add-product' class='btn btn-info'>Thêm</button>";
                    } else {
                        echo "<span style='cursor: not-allowed;' class='btn btn-info'>Hãy thêm danh mục và nguồn gốc sản phẩm trước khi thêm sản phẩm.</span>";
                    }
                ?>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Sản phẩm
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Product")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Product")'>Xóa tất cả</span>
              <span class="notice"><b style="color:red;">* </b>Lưu ý: Các sản phẩm khác nhau không nên dùng chung hình ảnh. Khi xóa sản phẩm có thể ảnh hưởng nhau.</span>
            </div>
            <?=showProduct($allProduct)?>
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
        btnSubmit = document.querySelector('#add-new');
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