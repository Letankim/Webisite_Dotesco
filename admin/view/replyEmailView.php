<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm email nhận phản hồi
          </div>
          <div class="position-center">
            <form method = "post" action = "index.php?page=add-email" role="form">
                <div class="form-group">
                    <label for="email">Email: <b style = "color:red;">* Đây là email rất quan trọng đảm bảo rằng nó hợp lệ</b></label>
                    <input required type="email" id="email" name="email" class="form-control" placeholder="Nhập email">
                    <span class = 'message_error'></span> 
                  </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" id="add-new" name = "add-email" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Email nhận phản hồi
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("ReplyEmail")'>Xóa các mục đã chọn</span>
              <span class="notice"><b style="color:red;">* </b>Lưu ý: Cần phải có email hoạt động để nhận phản hồi không thể xóa hết.</span>
              <span class="notice"><b style="color:red;">* </b> Khi có nhiều email ở trạng thái hoạt động thì email thêm gần nhất sẽ được sử dụng để nhận mail phản hồi.</span>
            </div>
            <!-- xuất dữ liệu ra từ cơ sơ dữ liệu -->
            <?=showEmail($allEmail)?>
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
        btnSubmit = document.querySelector('#add-new');
        const messageEmail = "Hãy nhập email hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: email, message: messageEmail, regex: regexEmail, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>