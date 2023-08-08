<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-body form-add active">
          <div class="panel-heading">
            Chỉnh sửa banner
          </div>
          <div class="position-center">
            <form enctype="multipart/form-data" method = "post" action = "index.php?page=updatedBanner" role="form">
                <div class="form-group">
                    <label for="imgBanner">Ảnh đại diện: </label>
                    <input type="file" id="imgBanner" name="imgBanner" class="form-control">
                    <input type="hidden" name="id" value="<?=$currentBanner['id']?>">
                    <img style="width: 80px; margin-top: 5px" src="<?=PATH_UPLOADS.$currentBanner['img']?>" alt="">
                </div>
                <div class="form-group">
                    <label for="priority">Ưu tiên: </label>
                    <select name="priority" id="priority">
                        <?php
                            if($currentBanner['priority'] == 1) {
                                echo "<option value='0'>Bình thường</option>
                                <option value='1' selected>Ưu tiên</option>";
                            } else  {
                                echo "<option value='0' selected>Bình thường</option>
                                <option value='1'>Ưu tiên</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status: </label>
                        <select name="status" id="status">
                            <?php
                                if($currentBanner['status'] == 1) {
                                    echo "<option value='0'>Không hoạt động</option>
                                    <option value='1' selected>Hoạt động</option>";
                                } else  {
                                    echo "<option value='0' selected>Không hoạt động</option>
                                    <option value='1'>Hoạt động</option>";
                                }
                            ?>
                        </select>
                </div>
                <button type="submit" name = "updateBanner" class="btn btn-info">Chỉnh sửa</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</section>
</section>
<!--main content end-->
</section>