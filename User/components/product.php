<?php
    function showProduct($allProduct) {
        $numberOfProducts = count($allProduct);
        $productHtml = '<div class="row row-cols-1 row-cols-md-2 g-4">';
        if ($numberOfProducts >= 0) {
            foreach ($allProduct as $product) {
                $id = $product->getId();
                $img = $product->getImg();
                $name = $product->getName();
                $price = $product->getPrice();
                $priceSale = $product->getPriceSale();
                if($priceSale > 0) {
                    $percentSale = 100 - ceil((($price-$priceSale) / $price) * 100);
                }
                $productHtml.='
                <div class="col-lg-3 col-6 col-sm-6 col-md-4 box-item-product">
                    <a href="?act=chi-tiet-san-pham&id='.$id.'" class="text-decoration-none">
                        <div class="card" style="height: 100%;">
                            <img src="'.PATH_UPLOADS_IMG_USER.$img.'" class="card-img-top card-img-set-height" alt="'.$name.'" onerror="changeImgToDefault(this)">
                            <div class="card-body">
                                <h5 class="card-title">'.$name.'</h5>';
                            if($price > 0) {
                                $productHtml.='<div class="card-text price-product">
                                <p class="price-item price-new">'.currency_format($price-$priceSale, "").'</p>';
                                if($priceSale > 0) {
                                    $productHtml.='<p class="price-item price-old">'.currency_format($price, "").'</p>';
                                }
                                $productHtml.='</div>';
                            } else {
                                $productHtml.='<p class="card-text contact_link">Liên hệ</p>';
                            }
                            $productHtml.='
                            </div>
                        </div>
                    </a>';
                if($priceSale > 0) {
                    $productHtml.='
                        <div class="box-sale">
                            <img src="'.PATH_UPLOADS_IMG_USER.'/sale.png"/>
                            <span class="content-sale">'.$percentSale.'%</span>
                        </div>
                    ';
                }
                $productHtml.='</div>';
            }
        }
        $productHtml.= '</div>';
        return $productHtml;
    }
?>