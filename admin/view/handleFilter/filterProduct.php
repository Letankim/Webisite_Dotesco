<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
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
                    echo showSanPham($filterProduct);
                ?>
              </tbody>
            </table>
        </div>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>