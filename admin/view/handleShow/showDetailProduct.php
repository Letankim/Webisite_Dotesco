<?php
    $accountDao = new AccountDao();
    $categoryDao = new CategoryDao();
    $originDao = new OriginDao();
    $name  = $currentProduct->getName();
    $modelID = $currentProduct->getModelID();
    $price = $currentProduct->getPrice();
    $priceSale = $currentProduct->getPriceSale();
    $priority = $currentProduct->getPriority();
    $status = $currentProduct->getStatus();
    $view = $currentProduct->getView();
    $createAt = $currentProduct->getCreateAt();
    $createBy = $currentProduct->getCreateBy();
    $modifiedAt = $currentProduct->getModifiedAt();
    $modifiedBy = $currentProduct->getModifiedBy();
    $img = $currentProduct->getImg();
    $description = $currentProduct->getDescription();
    $category = $categoryDao->getOneById($currentProduct->getIdCategory())->getName();
    $origin = $originDao->getOneById($currentProduct->getIdOrigin())->getName();
    $usernameCreate = ($accountDao->getOneByID($createBy))->getUsername();
    $usernameModified = $modifiedBy != null ? ($accountDao->getOneByID($modifiedBy))->getUsername() : "";
?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-body form-add active">
                    <a href="index.php?page=product" class='btn btn-info'>Quay về trang sản phẩm</a>
                    <div class="panel-heading">
                        Chi tiết thông tin của sản phẩm <?=$modelID?>
                    </div>
                    <div class="position-center">
                        <form method = "post" action = "index.php?page=updatedSanPham" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="model">Danh mục: </label>
                                <span class="show_more"><?=$category?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Nhà sản xuất: </label>
                                <span class="show_more"><?=$origin?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Model ID: </label>
                                <span class="show_more"><?=$modelID?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Tên sản phẩm: </label>
                                <span class="show_more"><?=$name?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Giá sản phẩm: </label>
                                <span class="show_more"><?=$price?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Giá sale sản phẩm: </label>
                                <span class="show_more"><?=$priceSale?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Lượt xem sản phẩm: </label>
                                <span class="show_more"><?=$view?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Tạo: </label>
                                <span class="show_more label label-default"><?=$createAt?> <?=$usernameCreate?></span>
                            </div>
                            <div class="form-group">
                                <label for="model">Cập nhật: </label>
                                <span class="show_more label label-default"><?=$modifiedAt?> <?=$usernameModified?></span>
                            </div>
                            <div class="form-group">
                                <label for="mainImg">Ảnh đại diện: </label>
                                <img style="width: 80px; margin-top: 5px" src="<?=PATH_UPLOADS.$img?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="descImg">Ảnh mô tả: </label>
                                <ul class="list_img_preview">
                                    <?php
                                        foreach ($allImgPreview as $item) {
                                            echo "<li class='item_img_preview'>
                                                <img style='width: 80px' src='".PATH_UPLOADS.$item->getSrc()."' alt='Ảnh mô tả'>
                                            </li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="desc">Mô tả sản phẩm: </label>
                                <p style="font-size: 16px;">
                                    <?=$description?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="status">Nổi bật: </label>
                                <span class="show_more label label-warning">
                                    <?php
                                        if($priority == 1) {
                                            echo "Sản phẩm đang ở chế độ ưu tiên";
                                        } else  {
                                            echo "Sản phẩm bình thường";
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="status">Status: </label>
                                <span class="show_more label label-warning">
                                    <?php
                                        if($status == 1) {
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