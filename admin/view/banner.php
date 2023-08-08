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
            <form enctype="multipart/form-data" method = "post" action = "index.php?page=addBanner" role="form">
                <div class="form-group">
                    <label for="imgBanner">Ảnh đại diện: </label>
                    <input required type="file" id="imgBanner" name="imgBanner" class="form-control">
                </div>
                <div class="form-group">
                    <label for="priority">Ưu tiên: </label>
                    <select name="priority" id="priority">
                        <option value="1">Sự ưu tiên</option>
                        <option value="1">Ưu tiên</option>
                        <option value="0">Bình thường</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status: </label>
                    <select name="status" id="status">
                        <option value="1">Trạng thái</option>
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" name = "addBanner" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Tất cả banner
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
             <form action="index.php?page=filterByBanner" method="post">
                <select name="status" class="input-sm form-control w-sm inline v-middle">
                  <option value="1">Đang hoạt động</option>
                  <option value="0">Đang tắt</option>
                </select>
                <select name="priority" class="input-sm form-control w-sm inline v-middle">
                  <option value="1">Ưu tiên</option>
                  <option value="0">Bình thường</option>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="filter">Lọc theo trạng thái</button>
             </form>                
          </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th style="width:20px;">
                    STT
                  </th>
                  <th>Hình ảnh</th>
                  <th>Ngày tạo</th>
                  <th>Ưu tiên</th>
                  <th>Trạng thái</th>
                  <th>Xử lí</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php echo showBanner($allBanner)?>
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
                    <a href='index.php?page=danhmuc&trang='".($pageNumber - 1)."''>
                      <i class='fa fa-chevron-left'></i>
                    </a>
                    </li>";
                  }
                ?>
                <?php
                  for($i = 1; $i <= $pages; $i++) {
                      echo "<li><a href='index.php?page=danhmuc&trang=".$i."'>".$i."</a></li>";
                  } 
                ?>
                <?php
                  if($pageNumber != $pageNumber) {
                    echo "<li><a href='index.php?page=danhmuc&trang='".($pageNumber + 1)."''>
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