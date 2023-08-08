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
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Tìm kiếm</span>
                </h2>
            </div>
            <h3 style="margin-bottom: 10px;" class="message_searching">Kết quả tìm kiếm cho "<b style="color:darkgreen"><?=$keywordSearch?></b>"</h3>
            <!-- render product from database -->
            <?php
                if(count($searchResult) > 0) {
                    echo showProduct($searchResult);
                } else {
                    echo "<img style='display: flex;
                    width: 100%;
                    height: 300px;
                    object-fit: contain;
                    margin: 0 auto;' src='".PATH_UPLOADS_IMG_USER."no-found.jpg' />";
                }
            ?>
        </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Kết quả tìm kiếm cho ".$keywordSearch."';
    </script>";
?>