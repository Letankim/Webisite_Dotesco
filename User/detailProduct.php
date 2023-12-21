<?php
    $categoryDao = new CategoryDao();
    $originDao = new OriginDao();
    $id = $currentProduct->getId();
    $name = $currentProduct->getName();
    $price = $currentProduct->getPrice();
    $priceSale = $currentProduct->getPriceSale();
    $img = $currentProduct->getImg();
    $model = $currentProduct->getModelID();
    $description = $currentProduct->getDescription();
    $idCategory = $currentProduct->getIdCategory();
    $idOrigin = $currentProduct->getIdOrigin();
    $category = $categoryDao->getOneByID($idCategory)->getName();
    $currentOrigin = $originDao->getOneByID($idOrigin);
    $originName = $currentOrigin->getName();
    $originCountry = $currentOrigin->getCountry();
?>
        <div class="container main-product col-lg-9 col-12 col-sm-12 col-md-7">
            <div class="product-details row">
                <div class="box-image col-12 col-sm-12 col-md-6 col-lg-6">
                    <img onclick="showPreview(this)" src="<?=PATH_UPLOADS_IMG_USER.$img?>" alt="<?=$name?>" class="main-product-img" onerror="changeImgToDefault(this)">
                    <div class="all-image-product">
                    <img src="<?=PATH_UPLOADS_IMG_USER.$img?>" alt="Ảnh mô tả 1" class="image-product-item active" onerror="changeImgToDefault(this)">
                        <?php
                            if(count($imageDescProduct) > 0) {
                                $index = 1;
                                foreach ($imageDescProduct as $image) {
                                    $src = $image->getSrc();
                                    $index++;
                                    echo '<img src="'.PATH_UPLOADS_IMG_USER.$src.'" alt="Ảnh mô tả '.$index.'" class="image-product-item" onerror="changeImgToDefault(this)">';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="information-product col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="name-product">
                        <h2><?=$name?></h2>
                    </div>
                    <div class="start">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <div class="contact-order">
                        <?php
                            if($price == 0) {
                                echo '<a href="" class="contact_link contact-order-link box-contact">Liên hệ</a>';
                            } else {
                        ?>
                                <div class="box-information">
                                    <div class="group-input-buy">
                                        <span class="box-title">Giá:</span>
                                        <div class="box-price-product-item">
                                            <span style="font-weight: 600;" class="content-information content-information-highlight">
                                                <?=currency_format($price-$priceSale, "VND")?>
                                            </span>
                                        <?php
                                            if($priceSale > 0) {
                                        ?>
                                            <span style="font-weight: 600;" class="content-information content-information-highlight price-old">
                                                <?=currency_format($price, "VND")?>
                                            </span>
                                        <?php
                                            }
                                        ?>     
                                        </div>
                                    </div>
                                    <div class="group-input-buy"> 
                                        <label for="numberOfProduct">Số lượng: </label>
                                        <div class="number-input">
                                            <button onclick="downInput()" class="minus"></button>
                                            <input class="quantity" min="1" max="1000" name="quantity" value="1" type="number" readonly>
                                            <button onclick="upInput()" class="plus"></button>
                                        </div>
                                    </div>
                                    <form action = "?act=don-hang" method = "post">
                                        <input type="hidden" name="idProduct" value="<?=$id?>">
                                        <input class = "numberOfProduct" type="hidden" min="1" value="1" name="numberOfProduct">
                                        <button class = "btn-buy" type="submit" name="order">
                                            Mua ngay
                                        </button>
                                </form>
                            </div>
                            <script>
                                const inputNumber = document.querySelector('.quantity');
                                const downInput = () => {
                                    inputNumber.stepDown();
                                    document.querySelector('.numberOfProduct').value = inputNumber.value;
                                    document.querySelector('.numberAddCart').value = inputNumber.value;
                                }
                                const upInput = () => {
                                    document.querySelector('.quantity').stepUp();
                                    document.querySelector('.numberOfProduct').value = inputNumber.value;
                                    document.querySelector('.numberAddCart').value = inputNumber.value;
                                }
                            </script>
                            <div class="box-information">
                                <form action="./?act=them-gio-hang" method = "post">
                                    <input class = "numberAddCart" type="hidden" name="numberAddCard" value = "1">
                                    <input type="hidden" name="id" value = "<?=$id?>">
                                    <button class = "btn-buy add-to-cart" type="submit" name="addToCart">
                                        Thêm vào giỏ hàng
                                    </button>
                                </form>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="box-information">
                        <span class="box-title">Nhà sản xuất:</span>
                        <span class="content-information"><?=$originName?> - <?=$originCountry?></span>
                    </div>
                    <div class="box-information">
                        <span class="box-title">Danh mục:</span>
                        <span class="content-information content-information-highlight"><?=$category?></span>
                    </div>
                    <div class="box-information">
                        <span class="box-title">Tình trạng:</span>
                        <span class="content-information content-information-highlight">Còn hàng</span>
                    </div>
                    <div class="action_fb">
                        <div class="fb-share-button" data-href="" data-layout="button_count" data-size="small">
                            <a target="_top" href="" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                        </div>
                        <script>
                            const shareFb = document.querySelector('.fb-share-button'),
                            shareBtn = shareFb.querySelector('a');
                            const currentURL = window.location.href + "&share";
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
                        <?=$description?>
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
                } 
            ?>
            </div>
        </div>
        <!-- show preview -->
        <div class="preview-img">
            <div class="box-close">
                <i class='bx bx-x'></i>
            </div>
            <div class="box-img">
                <img src="" alt="preview image">
            </div>
        </div>
    </div>
</section>
<script>
    const boxPreview = document.querySelector(".preview-img"),
        btnClose = document.querySelector(".box-close"),
        imgPrview = document.querySelector(".box-img img");
    function showPreview(elePreview) {
        if(!boxPreview.classList.contains('active')) {
            boxPreview.classList.add('active');
            imgPrview.src = elePreview.src;
        }
    }
    btnClose.addEventListener("click", function() {
        if(boxPreview.classList.contains('active')) {
            boxPreview.classList.remove('active');
            imgPrview.src = "";
        }
    })
</script>
<script>
    let linkEle = document.createElement('link');
    linkEle.setAttribute('rel', 'stylesheet');
    linkEle.setAttribute('href', './assets/css/inputNumber.css');
    document.querySelector("head").appendChild(linkEle);
    const numberAddCart = document.querySelector('.numberAddCart');
    if(numberAddCart) {
        window.onload = function() {
            const numberOfProduct = document.querySelector(".numberOfProduct").value;
            numberAddCart.value = numberOfProduct;
        }
    }
    function changeNumber(ele) {
        const valueE = ele.value;
        numberAddCart.value= valueE;
    }
</script>
<script src='./assets/js/validation.js'></script>