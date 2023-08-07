<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-body form-add active">
                    <div class="panel-heading">
                        Chi tiết thông tin của sản phẩm <?=$currentProduct['modelID']?>
                    </div>
                    <div class="position-center">
                    <a style="margin: 5px 0" href="index.php?page=product" class='btn btn-info'>Quay về trang sản phẩm</a>
                        <form method = "post" action = "index.php?page=updatedSanPham" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="model">Danh mục: </label>
                                <span class="show_more"><?=getCategoryByID($currentProduct['idCategory'])['name']?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Nhà sản xuất: </label>
                                <span class="show_more"><?=getNguonGocByID($currentProduct['idOrigin'])['name']?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Model ID: </label>
                                <span class="show_more"><?=$currentProduct['modelID']?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Tên sản phẩm: </label>
                                <span class="show_more"><?=$currentProduct['name']?></span>
                            </div>
                            <div class="form-group">
                                <label for="mainImg">Ảnh đại diện: </label>
                                <img style="width: 80px; margin-top: 5px" src="<?=PATH_UPLOADS.$currentProduct['img']?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="descImg">Ảnh mô tả: </label>
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
                                <p style="font-size: 16px;">
                                    <?=$currentProduct['description']?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="status">Status: </label>
                                <span class="show_more" style="color: red;">
                                    <?php
                                        if($currentProduct['status'] == 1) {
                                            echo "Đang hoạt động";
                                        } else  {
                                            echo "Đang tắt";
                                        }
                                    ?>
                                </span>
                            </div>
                            <a href="index.php?page=product" class='btn btn-info'>Quay về trang sản phẩm</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
<!--main content end-->
</section>