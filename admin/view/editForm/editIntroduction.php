<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
            <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa thông tin công ty
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updatedIntroduction" role="form">
                            <div class="form-group">
                                <label for="desc">Giới thiệu về công ty: </label>
                                <textarea required name="introduction" id="content_post" cols="30" rows="10"><?=$currentIntroduction['content']?></textarea>
                                <input type="hidden" name="id" value=<?=$currentIntroduction['id']?>>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <?php
                                        if($currentIntroduction['status'] == 1) {
                                            echo "<option value='0'>Không hoạt động</option>
                                            <option value='1' selected>Hoạt động</option>";
                                        } else  {
                                            echo "<option value='0' selected>Không hoạt động</option>
                                            <option value='1'>Hoạt động</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name = "updateIntroduction" class="btn btn-info">Chỉnh sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>