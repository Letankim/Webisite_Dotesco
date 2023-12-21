<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm banner
          </div>
          <div class="position-center">
            <form enctype="multipart/form-data" method = "post" action = "index.php?page=add-banner" role="form">
                <div class="form-group">
                    <label for="imgBanner">Ảnh đại diện: </label>
                    <input required type="file" id="imgBanner" name="imgBanner" class="form-control" onchange="previewImage(event, '.box-img-preview')">
                    <span class = 'message_error'></span>
                    <div class="box-img-preview">

                    </div>      
                  </div>
                <div class="form-group">
                    <label for="priority">Ưu tiên: </label>
                    <select name="priority" id="priority">
                        <option value="1">Ưu tiên</option>
                        <option value="0">Bình thường</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status: </label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" id="add-new" name = "add-banner" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Tất cả banner
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Banner")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Banner")'>Xóa tất cả</span>
            </div>
            <!-- render data -->
            <?=showBanner($allBanner)?>
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
        btnSubmit = document.querySelector('#add-new');
        const messageImg = "Hãy chọn ảnh hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: img, message: messageImg, regex: null, type: "image", isEmpty: false },
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>