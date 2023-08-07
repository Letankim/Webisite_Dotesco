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
            <form method = "post" action = "index.php?page=addSanPham" role="form" enctype="multipart/form-data">
                <div class="form-group" style="margin-top: 10px;">
                    <label for="danhmuc">Danh mục: </label>
                    <select name="danhmuc" id="danhmuc">
                        <?php
                            if(count($allCategory) > 0) {
                                echo "<option value='".$allCategory[0]['id']."'>Chọn danh mục</option>";
                                foreach($allCategory as $category) {
                                    echo "<option value='".$category['id']."'>'".$category['name']."'</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nguonGoc">Nguồn gốc: </label>
                    <select name="nguonGoc" id="nguonGoc">
                        <?php
                            if(count($allNguonGoc) > 0) {
                                echo "<option value='".$allNguonGoc[0]['id']."'>Chọn nguồn góc sản phẩm</option>";
                                foreach($allNguonGoc as $nguonGoc) {
                                    echo "<option value='".$nguonGoc['id']."'>'".$nguonGoc['name']."'</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="model">Model: </label>
                    <input required type="text" id="model" name="model" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Tên sản phẩm: </label>
                    <input required type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mainImg">Ảnh đại diện: </label>
                    <input required type="file" id="mainImg" name="mainImg" class="form-control">
                </div>
                <div class="form-group">
                    <label for="descImg">Ảnh mô tả: </label>
                    <input required multiple type="file" id="descImg" name="descImg[]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc">Mô tả sản phẩm: </label>
                    <textarea required name="desc" id="content_post" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="1">Trạng thái</option>
                        <option value="0">Không hoạt động</option>
                        <option value="1">Hoạt động</option>
                    </select>
                </div>
                <?php
                    if(count($allCategory) > 0 && count($allNguonGoc) > 0) {
                        echo "<button type='submit' name = 'addSanPham' class='btn btn-info'>Thêm</button>";
                    } else {
                        echo "<span style='cursor: not-allowed;' class='btn btn-info'>Hãy thêm danh mục và nguồn gốc sản phẩm trước khi thêm sản phẩm.</span>";
                    }
                ?>
            </form>
          </div>
        </div>
        <div class="panel-heading">
          Sản phẩm
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
             <form action="index.php?page=filterBySanPham" method="post">
                <select name="status" class="input-sm form-control w-sm inline v-middle">
                  <option value="1">Đang hoạt động</option>
                  <option value="0">Đang tắt</option>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="filter">Lọc theo trạng thái</button>
             </form>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <form action="index.php?page=searchSanPham" method="post">
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
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  <th style="width:20px;">STT</th>
                  <th>Model</th>
                  <th>Danh mục</th>
                  <th>Nhà sản xuất</th>
                  <th>Tên sản phẩm</th>
                  <th>Ảnh</th>
                  <th>Ngày</th>
                  <th>Trạng thái</th>
                  <th>Xử lí</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                    echo showSanPham($allProduct);
                ?>
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
                    <a href='index.php?page=product&trang='".($pageNumber - 1)."''>
                      <i class='fa fa-chevron-left'></i>
                    </a>
                    </li>";
                  }
                ?>
                <?php
                  for($i = 1; $i <= $pages; $i++) {
                      echo "<li><a href='index.php?page=product&trang=".$i."'>".$i."</a></li>";
                  } 
                ?>
                <?php
                  if($pageNumber != $pageNumber) {
                    echo "<li><a href='index.php?page=product&trang='".($pageNumber + 1)."''>
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