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
            <form method = "post" action = "index.php?page=addCategory" role="form">
                <div class="form-group">
                    <label for="nameCategory">Tên danh mục: </label>
                    <input type="text" id="nameCategory" name="nameCategory" class="form-control" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>
                </div>
                <button type="submit" name = "addCategory" class="btn btn-info">Thêm</button>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Danh mục
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
             <form action="index.php?page=filterByCategory" method="post">
                <select name="status" class="input-sm form-control w-sm inline v-middle">
                  <option value="1">Trạng thái</option>
                  <option value="1">Đang hoạt động</option>
                  <option value="0">Đang tắt</option>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="filter">Lọc theo trạng thái</button>
             </form>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <form action="index.php?page=searchCategory" method="post">
              <div class="input-group">
                  <input type="text" name = "key" class="input-sm form-control" placeholder="Search">
                  <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="submit" name="search">Search</button>
                  </span>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Category")'>Xóa các mục đã chọn</span>
              <span class="btn-delete-by-check" onClick='deleteAll("Category")'>Xóa tất cả</span>
              <span class="notice"><b style="color:red;">* </b>Lưu ý: Các danh mục đang có sản phẩm sẽ không được phép xóa.</span>
            </div>
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                <th style="width:20px;">Chọn</th>
                  <th style="width:20px;">
                    STT
                  </th>
                  <th>Tên danh mục</th>
                  <th>Ngày tạo</th>
                  <th>Sản phẩm</th>
                  <th>Trạng thái</th>
                  <th>Xử lí</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php echo showDanhMuc($allCategory)?>
              </tbody>
            </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">Hiển thị <?=$page+1?> - <?=($page+20)?></small>
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