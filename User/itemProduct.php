<script>
    const metaImg = document.querySelector('.meta-img');
    metaImg.setAttribute('content',"https://letankim2003.000webhostapp.com/uploads/<?=$currentProduct['img']?>");
</script>
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
                    <div class="action_fb">
                        <div class="fb-share-button" data-href="" data-layout="button_count" data-size="small">
                            <a target="_blank" href="" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                        </div>
                        <script>
                            const shareFb = document.querySelector('.fb-share-button'),
                            shareBtn = shareFb.querySelector('a');
                            const currentURL = window.location.href;
                            shareFb.setAttribute('data-href', currentURL);
                            shareBtn.href = `https://www.facebook.com/sharer/sharer.php?u=${currentURL}&amp;src=sdkpreparse`;
                        </script>
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
            <!-- comment facebook -->
            <div class="comment">
                <div class="title_header">
                    <h2 class="title_content">
                        <span class = 'background_main'>Bình luận</span>
                    </h2>
                </div>
                <div class="comment_fb">
                    <div class="fb-comments"
                    data-href=""
                    data-width="100%" data-numposts="5">
                    </div>
                </div>
                <script>
                    const fbComment = document.querySelector('.fb-comments');
                    fbComment.setAttribute('data-href', window.location.href);
                </script>
            </div>
            <div class="main-product col-lg-12 col-12 col-sm-12 col-md-12">
                <div class="title_header">
                    <h2 class="title_content">
                        <span class = 'background_main'>sản phẩm liên quan</span>
                    </h2>
                </div>
            <!--  render product related from database -->
            
            <?php
                if(count($productRelated) > 0) {
                    echo showProduct($productRelated);
                } else {

                }
            ?>
            </div>
        </div>
    </div>
</section>