<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa danh mục
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updatedCategory" role="form">
                            <div class="form-group">
                                <label for="nameCategory">Tên danh mục: </label>
                                <input type="text" id="nameCategory" value = "<?=$currentCategory['name']?>" name="nameCategory" class="form-control">
                                <input type="hidden" value = "<?=$currentCategory['id']?>" name="idCategory">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <?php
                                        if($currentCategory['status'] == 1) {
                                            echo "<option value='0'>Không hoạt động</option>
                                            <option value='1' selected>Hoạt động</option>";
                                        } else  {
                                            echo "<option value='0' selected>Không hoạt động</option>
                                            <option value='1'>Hoạt động</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name = "updateCategory" class="btn btn-info">Chỉnh sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>