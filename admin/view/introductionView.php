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
            <form method = "post" action = "index.php?page=add-introduction" role="form">
                <div class="form-group">
                    <label for="desc">Giới thiệu về công ty: </label>
                    <textarea required name="introduction" id="content_post" cols="30" rows="10"></textarea>
                    <span class = 'message_error'></span>             
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                      <option value="1">Hoạt động</option>
                      <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" id="add-new" name = "add-introduction" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Giới thiệu về công ty
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Introduction")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Introduction")'>Xóa tất cả</span>
            </div>
            <!-- render data -->
            <?=showIntroduction($allIntroduction)?>
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
        btnSubmit = document.querySelector('#add-new');
        const messageEmpty = "Hãy nhập thông tin cho trường này";
        // array to save all input to check, message show error of each and a string regex to check 
        const inputsToValidateCheck = [
            { element: introduction, message: messageEmpty, regex: "content_post", type: "ckeditor", isEmpty: false},
        ];
        validation(inputsToValidateCheck, btnSubmit);
</script>