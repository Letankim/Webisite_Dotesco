<?php
    function showProduct($allProduct) {
        $numberOfProducts = count($allProduct);
        $productHtml = "<div class='row row-cols-1 row-cols-md-2 g-4'>";
        if ($numberOfProducts > 0) {
            foreach ($allProduct as $product) {
                $productHtml.="
                <a href='./index.php?act=trangchitietsanpham&id=".$product['id']."' class='col-lg-3 col-6 col-sm-6 col-md-3 text-decoration-none'>
                    <div class='card' style='height: 100%;'>
                    <img src='".PATH_UPLOADS_IMG_USER.$product['img']."' class='card-img-top card-img-set-height' alt='".$product['name']."'>
                    <div class='card-body'>
                        <h5 class='card-title'>".$product['name']."</h5>
                        <p class='card-text contact_link'>Liên hệ</p>
                    </div>
                    </div>
                </a>
                ";
            }
        }
        $productHtml.= "</div>";
        return $productHtml;
    }
?>