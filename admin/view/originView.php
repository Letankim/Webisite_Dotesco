<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm thông tin nhà sản xuất
          </div>
          <div class="position-center">
            <form method = "post" action = "index.php?page=add-origin" role="form">
                <div class="form-group">
                    <label for="name">Tên nhà sản xuất: </label>
                    <input required type="text" id="name" name="name" class="form-control">
                    <span class = 'message_error'></span>
                </div>
                <div class="form-group">
                    <label for="country">Quốc gia: </label>
                    <input required type="text" id="country" name="country" class="form-control">
                    <span class = 'message_error'></span>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" id="add-new" name = "add-origin" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Nguồn gốc sản phẩm
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Origin")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Origin")'>Xóa tất cả</span>
              <span class="notice"><b style="color:red;">* </b>Lưu ý: Các nhà sản xuất đang có sản phẩm sẽ không được phép xóa.</span>
            </div>
            <?=showOrigin($allOrigin)?>
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
        btnSubmit = document.querySelector('#add-new');
        const messageEmpty = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: name, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
            { element: country, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>