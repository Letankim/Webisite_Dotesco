<section class = "container_banner container">
    <div class="row">
        <div class="main-left col-lg-3 col-12 col-sm-12 col-md-5">
            <div class="navigation_left col-lg-12">
                <div class="container_nav_left background_main">
                    <h2 class="title_nav_left">
                        DANH MỤC SẢN PHẨM
                    </h2>
                </div>
                <!-- render danh muc from database -->
                <?=showCategory($allCategoryActive)?>
            </div>
            <div class="navigation_left col-lg-12">
                <div class="container_nav_left background_main">
                    <h2 class="title_nav_left">
                        Nhà sản xuất
                    </h2>
                </div>
                <!-- render nha san xua tu database -->
                <?=showCategoryByOrigin($allOriginActive)?>
            </div>
        </div>
        <div class="container main-product col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="product-details row">
                <div class="box-image col-12 col-sm-12 col-md-6 col-lg-6">
                    <img src="<?=PATH_UPLOADS_IMG_USER.$currentProduct['img']?>" alt="<?=$currentProduct['name']?>" class="main-product-img">
                    <div class="all-image-product">
                    <img src='<?=PATH_UPLOADS_IMG_USER.$currentProduct['img']?>' alt='Ảnh mô tả 1' class='image-product-item active'>
                        <?php
                            $index = 1;
                            foreach ($imageDescProduct as $image) {
                                $index++;
                                echo "<img src='".PATH_UPLOADS_IMG_USER.$image['source']."' alt='Ảnh mô tả ".$index."' class='image-product-item'>";

                            }
                        ?>
                    </div>
                </div>
                <div class="information-product col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="name-product">
                        <h2><?=$currentProduct['name']?></h2>
                    </div>
                    <div class="start">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <div class="contact-order">
                        <a href="" class="contact_link contact-order-link">Liên hệ</a>
                    </div>
                    <div class="box-information">
                        <span class="box-title">Nhà sản xuất:</span>
                        <span class="content-information"><?=$currentOrigin['name']?></span>
                    </div>
                    <div class="box-information">
                        <span class="box-title">Danh mục:</span>
                        <span class="content-information content-information-highlight"><?=$currentCategory['name']?></span>
                    </div>
                    <div class="box-information">
                        <span class="box-title">Tình trạng:</span>
                        <span class="content-information content-information-highlight">Còn hàng</span>
                    </div>
                </div>
            </div>
            <div class="product-desc">
                <div class="title_header">
                    <h2 class="title_content">
                        <span class = 'background_main'>Mô Tả</span>
                    </h2>
                </div>
                <div class="desc-content">
                    <h3>Mô tả sản phẩm</h3>
                    <p>
                        <!-- render from data base -->
                        <?=$currentProduct['description']?>
                    </p>
                </div>
            </div>
            <div class="main-product col-lg-12 col-12 col-sm-12 col-md-12">
                <div class="title_header">
                    <h2 class="title_content">
                        <span class = 'background_main'>sản phẩm liên quan</span>
                    </h2>
                </div>
            <!--  render product related from database -->
            <?=showProduct($productRelated)?>
            </div>
        </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = '".$currentProduct['name']."';
    </script>";
?>