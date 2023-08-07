<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-body form-add active">
          <div class="panel-heading">
            Chỉnh sửa thông tin nhà sản xuất
          </div>
          <div class="position-center">
            <form method = "post" action = "index.php?page=updatedNguonGoc" role="form">
                <div class="form-group">
                    <label for="nameNguonGoc">Tên nhà sản xuất: </label>
                    <input value="<?=$currentNguonGoc['name']?>" required type="text" id="nameNguonGoc" name="nameNguonGoc" class="form-control">
                </div>
                <div class="form-group">
                    <label for="country">Quốc gia: </label>
                    <input value="<?=$currentNguonGoc['country']?>" required type="text" id="country" name="country" class="form-control">
                    <input type="hidden" name="id" value="<?=$currentNguonGoc['id']?>">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <?php
                            if($currentNguonGoc['status'] == 1) {
                                echo "<option value='0'>Không hoạt động</option>
                                <option value='1' selected>Hoạt động</option>";
                            } else  {
                                echo "<option value='0' selected>Không hoạt động</option>
                                <option value='1'>Hoạt động</option>";
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" name = "updateNguonGoc" class="btn btn-info">Chỉnh sửa</button>
            </form>
          </div>
        </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>