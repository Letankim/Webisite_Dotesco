<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <button class = "btn btn-primary btn-show-form-add">Thêm mới</button>
        <div class="panel-body form-add">
          <div class="panel-heading">
            Thêm tài khoản
          </div>
          <div class="position-center">
            <form enctype="multipart/form-data" method = "post" action = "index.php?page=add-account" role="form">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required type="email" id="email" name="email" class="form-control">
                    <span class = 'message_error'></span> 
                  </div>
                <div class="form-group">
                    <label for="phone">Phone: </label>
                    <input required type="phone" id="phone" name="phone" class="form-control">
                    <span class = 'message_error'></span> 
                  </div>
                <div class="form-group">
                    <label for="username">Username:  </label>
                    <input pattern="[a-zA-Z.@#$%&^*0-9]{5,30}" required type="text" id="username" name="username" class="form-control">
                    <span class = 'message_error'></span> 
                  </div>
                <div class="form-group">
                    <label for="password">Password:  </label>
                    <input pattern="[0-9a-zA-Z!.@#$%&^*]{8,30}" required type="password" id="password" name="password" class="form-control">
                    <span class = 'message_error'></span> 
                  </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="0">Người dùng</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" id="add-new" name = "add-account" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Tất cả tài khoản
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Account")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Account")'>Xóa tất cả</span>
            </div>
            <!-- render data -->
            <?=showAccount($allAccount)?>
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
    let username = document.querySelector('#username'),
        password = document.querySelector('#password'),
        phone = document.querySelector('#phone'),
        email = document.querySelector('#email'),
        btnSubmit = document.querySelector('#add-new');
        const messageUsername = "Username phải từ 6 - 100 kí tự. Không cách",
            messagePassword = "Password ít nhất 8 kí tự. Không cách",
            messagePhone = "Hãy nhập số điện thoại hợp lệ",
            messageEmail = "Hãy nhập email hợp lệ";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: username, message: messageUsername, regex: /^[a-zA-Z0-9.,!#$%&'*+/=?^_]{6,100}$/, type: "text", isEmpty: false},
            { element: password, message: messagePassword, regex: /^[a-zA-Z0-9.,!#$%&'*+/=?^_]{8,}$/, type: "text", isEmpty: false},
            { element: email, message: messageEmail, regex: regexEmail, type: "text", isEmpty: false},
            { element: phone , message: messagePhone, regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g, type: "text", isEmpty: false}
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>