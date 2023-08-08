<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chỉnh sửa thông tin nhà sản phẩm
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updatedSanPham" role="form" enctype="multipart/form-data">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="danhmuc">Danh mục: </label>
                                <select name="danhmuc" id="danhmuc">
                                    <?php
                                        if(count($allCategory) > 0) {
                                            echo "<option value='".$allCategory[0]['id']."'>Chọn danh mục</option>";
                                            foreach($allCategory as $category) {
                                                if($currentProduct['idCategory'] == $category['id']) {
                                                    echo "<option value='".$category['id']."' selected>'".$category['name']."'</option>";
                                                } else {
                                                    echo "<option value='".$category['id']."'>'".$category['name']."'</option>";
                                                }
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
                                            echo "<option value='".$allCategory[0]['id']."'>Chọn danh mục</option>";
                                            foreach($allNguonGoc as $nguonGoc) {
                                                if($currentProduct['idOrigin'] == $nguonGoc['id']) {
                                                    echo "<option value='".$nguonGoc['id']."' selected>'".$nguonGoc['name']."'</option>";
                                                } else {
                                                    echo "<option value='".$nguonGoc['id']."'>'".$nguonGoc['name']."'</option>";
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="model">Model: </label>
                                <input required value="<?=$currentProduct['modelID']?>" type="text" id="model" name="model" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Tên sản phẩm: </label>
                                <input required value="<?=$currentProduct['name']?>" type="text" id="name" name="name" class="form-control">
                                <input value="<?=$currentProduct['id']?>" type="hidden"  name="id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mainImg">Ảnh đại diện: </label>
                                <input type="file" id="mainImg" name="mainImg" class="form-control">
                                <img style="width: 80px; margin-top: 5px" src="<?=PATH_UPLOADS.$currentProduct['img']?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="descImg">Ảnh mô tả: </label>
                                <input multiple type="file" id="descImg" name="descImg[]" class="form-control">
                                <ul class="list_img_preview">
                                    <?php
                                        foreach ($allImgPreview as $item) {
                                            echo "<li class='item_img_preview'>
                                                <img style='width: 80px' src='".PATH_UPLOADS.$item['source']."' alt=''>
                                            </li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="desc">Mô tả sản phẩm: </label>
                                <textarea required name="desc" id="content_post" cols="30" rows="10">
                                    <?=$currentProduct['description']?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="priority">Ưu tiên: </label>
                                <select name="priority" id="priority">
                                    <?php
                                        if($currentProduct['priority'] == 1) {
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
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <?php
                                        if($currentProduct['status'] == 1) {
                                            echo "<option value='0'>Không hoạt động</option>
                                            <option value='1' selected>Hoạt động</option>";
                                        } else  {
                                            echo "<option value='0' selected>Không hoạt động</option>
                                            <option value='1'>Hoạt động</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type='submit' name = 'updateSanPham' class='btn btn-info'>Chỉnh sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>