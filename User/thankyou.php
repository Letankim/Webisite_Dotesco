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
                    <span class = "background_main">
                        <?php
                            if($isSendContack) {
                                echo "Lời cảm ơn";   
                            } else {
                                echo "Lời xin lỗi";
                            }
                        ?>
                    </span>
                </h2>
            </div>
            <!-- render product from database -->
            <?php
                if($isSendContack) {
                    echo "<p style='margin: 0;
                    font-size: 1.7rem;
                    font-weight: 500;
                    padding: 0px 15px;
                    font-style: italic;'>
                    Cảm ơn bạn đã liên hệ với chúng tôi chúng tôi 
                    sẽ liên hệ với bạn trong thời gian sớm nhất</p>
                    <img style='display: flex;
                    width: 90%;
                    height: 300px;
                    object-fit: contain;
                    margin: 0 auto;'
                    src='".PATH_UPLOADS_IMG_USER."thankyoucontact.jpg' alt='thank you'>";
                    echo "<script>
                    const title = document.querySelector('title');
                    title.innerHTML = 'Cảm ơn bạn đã liên hệ';
                    </script>";
                } else {
                    echo "<p style='margin: 0;
                    font-size: 1.7rem;
                    font-weight: 500;
                    padding: 0px 15px;
                    font-style: italic;'>
                    Đã gửi mail thất bại. Xin lỗi bạn rất nhiều vì hệ thống có chút trục trặc. Vui lòng thử lại.</p>
                    <img style='display: flex;
                    width: 90%;
                    height: 300px;
                    object-fit: contain;
                    margin: 0 auto;'
                    src='".PATH_UPLOADS_IMG_USER."sorrycontact.jpg' alt='thank you'>";
                    echo "<script>
                    const title = document.querySelector('title');
                    title.innerHTML = 'Xin lỗi bạn';
                    </script>";
                }
            ?>
        </div>
    </div>
</section>