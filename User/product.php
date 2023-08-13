        <div class="container main-product col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main"><?=$heading?></span>
                </h2>
            </div>
            <!-- render product from database -->
                <?php
                    if(count($allProduct) > 0) {
                        echo showProduct($allProduct);
                    } else {
                        echo "<img style='display: flex;
                        width: 90%;
                        height: 300px;
                        object-fit: contain;
                        margin: 0 auto;' src='".PATH_UPLOADS_IMG_USER."no-product.jpg' />";
                    }
                ?>
            <?php
                if($product) {
                    echo paginationProduct($pageNumber, $pages);
                } else if($origin) {
                    echo paginationProductByOrigin($pageNumber, $pages, $currentOrigin);
                } else {
                    echo paginationProductByCategory($pageNumber, $pages, $currentCategory);
                }
            ?>
        </div>
    </div>
</section>
<?php
    echo "<script>
    const title = document.querySelector('title');
    title.innerHTML = 'Xem - ".$heading."';
    </script>";
?>