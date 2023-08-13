        <div class="container main-product col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="title_header">
                <h2 class="title_content">
                    <span class = "background_main">Tìm kiếm</span>
                </h2>
            </div>
            <div class="box-message-search">
                <h3 class="message_searching">Kết quả tìm kiếm cho "<b style="color:darkgreen"><?=$keywordSearch?></b>"</h3>
                <?php
                    $numberOfSearch = count($searchResult);
                    if($numberOfSearch > 0) {
                        echo "<span class='count-show'>Hiển thị ".$numberOfSearch." kết quả</span>";
                    }
                ?>
            </div>
            <!-- render product from database -->
            <?php
                if($numberOfSearch > 0) {
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