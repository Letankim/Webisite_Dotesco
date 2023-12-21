<?php
    function showProductByCategory($products) {
        $productByCategory = '<div class="card mb-3" style="max-width: 540px;">';
        $index = 0;
        foreach ($products as $product){
            $id = $product->getId();
            $img = $product->getImg();
            $name = $product->getName();
            $price = $product->getPrice();
            $priceSale = $product->getPriceSale();
            $style = "";
            if($index != 0) {
                $style = 'style="margin-top: 3px;"';
            }
            $productByCategory.='
            <div '.$style.' class="row g-0 text-decoration-none">
                <a href="./?act=chi-tiet-san-pham&id='.$id.'" class="row g-0 text-decoration-none">
                <div class="col-md-4 col-4 col-sm-4 text-center">
                    <img style="height: 135px;object-fix:contain;" src="'.PATH_UPLOADS_IMG_USER.$img.'" class="img-fluid rounded-start" alt="'.$name.'" onerror="changeImgToDefault(this)">
                </div>
                <div class="col-md-8 col-8 col-sm-8 display-flex">
                    <div class="card-body border-0">
                        <h5 class="card-title">'.$name.'</h5>';
                        if($price > 0) {
                            $productByCategory.='<div class="card-text price-product">
                            <p class="price-item price-new">'.currency_format($price-$priceSale, "").'</p>';
                            if($priceSale > 0) {
                                $productByCategory.='<p class="price-item price-old">'.currency_format($price, "").'</p>';
                            }
                            $productByCategory.='</div>';
                        } else {
                            $productByCategory.='<p class="card-text contact_link">Liên hệ</p>';
                        }
                        $productByCategory.='
                    </div>
                </div>
                </a>
            </div>';
            $index++;
        }
        $productByCategory.='</div>';
        return $productByCategory;
    }

    function showProductCategoryLimit($categories) {
        $numberOfCategories = count($categories);
        $productHtml = '';
        if($numberOfCategories > 0) {
            $categoryDao = new CategoryDao();
            $productDao = new ProductDao();
            foreach($categories as $category) {
                $categoryInfo = $categoryDao->getOneByID($category);
                $productByCategory = $productDao->getProductByCategoryLimit($category);
                if($categoryInfo) {
                    $productHtml.='
                    <div class="box_product_category col-lg-4 col-12 col-sm-12 col-md-6">
                        <div class="title_header">
                            <h2 class="title_content">
                                <span class = "background_main category">'.$categoryInfo->getName().'</span>
                            </h2>
                        </div>
                        '.showProductByCategory($productByCategory).'
                    </div>';
                }
            }
        }
        return $productHtml;
    }
?>