<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm thông tin về công ty
          </div>
          <div class="position-center">
            <form method = "post" action = "?page=add-company" role="form">
                <div class="form-group">
                    <label for="nameCompany">Tên công ty: </label>
                    <input required type="text" id="nameCompany" name="nameCompany" class="form-control">
                    <span class = 'message_error'></span>                
                  </div>
                <div class="form-group">
                    <label for="address">Địa chỉ: </label>
                    <input required type="text" id="address" name="address" class="form-control">
                    <span class = 'message_error'></span>                
                  </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại: </label>
                    <input required  type="phone" id="phone" name="phone" class="form-control">
                    <span class = 'message_error'></span>                
                  </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input required type="email" id="email" name="email" class="form-control">
                    <span class = 'message_error'></span>                
                  </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" id="add-new" name = "add-new" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Thông tin công ty
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Company")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Company")'>Xóa tất cả</span>
            </div>
            <!-- render data -->
            <?=showCompany($allCompany)?>
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
    let name = document.querySelector('#nameCompany'),
        address = document.querySelector('#address'),
        phone = document.querySelector('#phone'),
        email = document.querySelector('#email'),
        btnSubmit = document.querySelector('#add-new');
        const messageEmpty = "Hãy nhập thông tin cho trường này",
            messagePhone = "Hãy nhập số điện thoại hợp lệ",
            messageEmail = "Hãy nhập email hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: name, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
            { element: address, message: messageEmpty, regex: /^.{1,}$/, type: "text", isEmpty: false },
            { element: email, message: messageEmail, regex: regexEmail, type: "text", isEmpty: false },
            { element: phone , message: messagePhone, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>