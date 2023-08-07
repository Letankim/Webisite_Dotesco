<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Danh mục
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
             <form action="index.php?page=filterByNguonGoc" method="post">
                <select name="status" class="input-sm form-control w-sm inline v-middle">
                    <?php
                      if($status == 1) {
                        echo '<option value="1" selected>Đang hoạt động</option>
                        <option value="0">Đang tắt</option>';
                      } else {
                        echo '<option value="1">Đang hoạt động</option>
                        <option value="0" selected>Đang tắt</option>';
                      }
                    ?>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="filter">Lọc theo trạng thái</button>
             </form>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <form action="index.php?page=searchNguonGoc" method="post">
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
                  <th style="width:20px;">
                    STT
                  </th>
                  <th>Tên nhà sản xuất</th>
                  <th>Quốc gia</th>
                  <th>Ngày tạo</th>
                  <th>Trạng thái</th>
                  <th>Xử lí</th>
                  <th style="width:30px;"></th>
                </tr>
              </thead>
              <tbody>
                <?php echo showNguonGoc($filterNguonGoc)?>
              </tbody>
            </table>
        </div>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>