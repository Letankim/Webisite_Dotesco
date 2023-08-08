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
        <div class="container col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main"> Giới thiệu</span>
                </h2>
            </div>
            <div class="introduction-details">
                <p>
                    <!-- render from database -->
                    <?=$introduction['content']?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Giới thiệu';
    </script>";
?>
    