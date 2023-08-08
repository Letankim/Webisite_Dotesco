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
             <form action="index.php?page=filterByBanner" method="post">
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
                <select name="priority" class="input-sm form-control w-sm inline v-middle">
                    <?php
                      if($priority == 1) {
                        echo '<option value="1" selected>Ưu tiên</option>
                        <option value="0">Bình thường</option>';
                      } else {
                        echo '<option value="1">Ưu tiên</option>
                        <option value="0" selected>Bình thường</option>';
                      }
                    ?>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="filter">Lọc</button>
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
                <?php echo showBanner($filterBanner)?>
              </tbody>
            </table>
        </div>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>