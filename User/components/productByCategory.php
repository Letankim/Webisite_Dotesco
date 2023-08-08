<?php
    function showProductByCategory($products) {
        $productByCategory = "<div class='card mb-3' style='max-width: 540px;'>";
        foreach ($products as $product){
            $productByCategory.="
                <a href='index.php?act=trangsanpham&id=".$product['id']."' class='row g-0 text-decoration-none'>
                <div class='col-md-4 col-4 col-sm-4 text-center'>
                <img style='height: 135px;object-fix:contain;' src='".PATH_UPLOADS_IMG_USER.$product['img']."' class='img-fluid rounded-start' alt='".$product['name']."'>
                </div>
                <div class='col-md-8 col-8 col-sm-8 display-flex'>
                <div class='card-body'>
                    <h5 class='card-title'>".$product['name']."</h5>
                    <p class='card-text contact_link'>Liên hệ.</p>
                </div>
                </div>
                </a>
                ";
        }
        $productByCategory.="</div>";
        return $productByCategory;
    }

    function showProductCategoryLimit($categories) {
        $numberOfCategories = count($categories);
        $productHtml = "";
        if($numberOfCategories > 0) {
            foreach($categories as $category) {
                $categoryInfo = getCategoryByID($category['id']);
                $productHtml.="
                <div class='box_product_category col-lg-4 col-12 col-sm-12 col-md-6'>
                    <div class='title_header'>
                        <h2 class='title_content'>
                            <span class = 'background_main'>".$categoryInfo['name']."</span>
                        </h2>
                    </div>
                    ".showProductByCategory(selectAllProductByCategoryLimit($categoryInfo['id']))."
                </div>";
            }
        }
        return $productHtml;
    }
?>