<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm danh mục
          </div>
          <div class="position-center">
            <form method = "post" action = "index.php?page=add-category" role="form">
                <div class="form-group">
                    <label for="nameCategory">Tên danh mục: </label>
                    <input required type="text" id="nameCategory" name="nameCategory" class="form-control" placeholder="Nhập tên danh mục">
                    <span class = 'message_error'></span>
                  </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" id="add-new" name = "add-category" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Danh mục
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Category")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Category")'>Xóa tất cả</span>
              <span class="notice"><b style="color:red;">* </b>Lưu ý: Các danh mục đang có sản phẩm sẽ không được phép xóa.</span>
            </div>
            <!-- render data -->
            <?=showCategory($allCategory)?>
        </div>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>
<script src='./assets/js/validation.js'></script>
<script>
    let category = document.querySelector('#nameCategory');
        btnSubmit = document.querySelector('#add-new');
        const messageEmpty = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: category, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>