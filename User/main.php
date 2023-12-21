<section class = "container_banner container">
    <div class="row">
        <div class="navigation_left col-lg-3 col-12 col-sm-12 col-md-5">
            <div class="container_nav_left background_main">
                <h2 class="title_nav_left">
                    DANH MỤC SẢN PHẨM
                </h2>
                <div class = "drop_down_category">
                    <i class='bx bx-chevron-down'></i>
                </div>
            </div>
            <!-- render from database -->
            <?=showCategoryInMain($allCategoryActive)?>
        </div>
        <div style="margin-top: 10px" id="carouselExampleIndicators" class="carousel slide banner_main col-lg-9 col-12 col-sm-12 col-md-7" data-bs-ride="carousel">
            <!-- render banner -->
            <?=showBanner($allBannerActive)?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!-- product -->
<section class="favorite_product container">
    <div class="title_header">
        <h2 class="title_content">
            <span class = "background_main"> SẢN PHẨM NỔI BẬT</span>
        </h2>
    </div>
    <!-- render product -->
    <?=showProduct($allProductFeatured)?>
</section>
<section class="favorite_product container">
    <div class="title_header">
        <h2 class="title_content">
            <span class = "background_main"> SẢN PHẨM MỚI</span>
        </h2>
    </div>
    <!-- render product -->
    <?=showProduct($allProductActive)?>
</section>
<section class = "favorite_product container">
    <div class="row">
        <?=showProductCategoryLimit($categoryLimit)?>
    </div>
</section>
<script src='./assets/js/validation.js'></script>