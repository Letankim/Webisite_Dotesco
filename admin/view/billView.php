<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Đơn hàng mới
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
             <form action="index.php?page=filterBill" method="post">
                <select id="filterBill" name="status" class="input-sm form-control w-sm inline v-middle">
                  <option value="0">Đơn hàng mới</option>
                  <option value="1">Đã xác nhân</option>
                  <option value="2">Đã chuẩn bị hàng</option>
                  <option value="3">Đã gửi đi</option>
                  <option value="4">Đã hoàn thành</option>
                  <option value="-1">Đã hủy</option>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="filter">Lọc theo trạng thái</button>
             </form>                
          </div>
          <div class="col-sm-4">
          </div>
        </div>
        <div class="table-responsive">
            <div class="box-action-delete">
              <span class="btn-delete-by-check" onClick='deleteByCheck("Bill")'>Xóa các mục đã chọn</span>
              <span class="notice" style="color:red;"><b>* </b>Lưu ý: Hãy thay đổi trạng thái đơn hàng trong phần xem chi tiết.</span>
            </div>
            <!-- render data -->
            <?=showAllBill($allBill)?>
        </div>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>
<script>
    const allInputCheckbox = document.querySelectorAll('.check-item');
    function changeStatusDelete(ele) {
      if(ele.checked) {
        allInputCheckbox.forEach(function(item) {
          item.checked = true;
        })
      } else {
        allInputCheckbox.forEach(function(item) {
          item.checked = false;
        })
      }
    }
</script>