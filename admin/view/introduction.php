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
            <form method = "post" action = "index.php?page=addIntroduction" role="form">
                <div class="form-group">
                    <label for="desc">Giới thiệu về công ty: </label>
                    <textarea required name="introduction" id="content_post" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Trạng thái</option>
                        <option value="0">Không hoạt động</option>
                        <option value="1">Hoạt động</option>
                    </select>
                </div>
                <button type="submit" name = "addIntroduction" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Giới thiệu về công ty
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th style="width:20px;">
                    STT
                  </th>
                  <th>Nội dung</th>
                  <th>Ngày tạo</th>
                  <th>Trạng thái</th>
                  <th>Xử lí</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php echo showIntroduction($allIntroduction)?>
              </tbody>
            </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">Hiển thị <?=$page?> - <?=($page+20)?></small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <?php
                  if($pageNumber != 1) {
                    echo "<li>
                    <a href='index.php?page=nguongoc&trang='".($pageNumber - 1)."''>
                      <i class='fa fa-chevron-left'></i>
                    </a>
                    </li>";
                  }
                ?>
                <?php
                  for($i = 1; $i <= $pages; $i++) {
                      echo "<li><a href='index.php?page=nguongoc&trang=".$i."'>".$i."</a></li>";
                  } 
                ?>
                <?php
                  if($pageNumber != $pageNumber) {
                    echo "<li><a href='index.php?page=nguongoc&trang='".($pageNumber + 1)."''>
                      <i class='fa fa-chevron-right'></i>
                      </a>
                    </li>";
                  }
                ?>
              </ul>
            </div>
          </div>
        </footer>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>