<?php
    function paginationProduct($pageNumber, $pages) {
        $paginationProduct = "<div class='pages'>
                <ul class='list_page'>";
                if($pageNumber > 1) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./?act=san-pham&trang=".($pageNumber-1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-left' ></i>
                    </a>
                </li>";
                }
                if($pages >= 5) {
                    if($pages != $pageNumber) {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham&trang=".$pageNumber."' class='page_item_link active'>".$pageNumber."</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham&trang=".$pages."' class='page_item_link'>".$pages."</a>
                    </li>";
                    } else {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham&trang=1' class='page_item_link'>1</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham&trang=".$pages."' class='page_item_link active'>".$pages."</a>
                    </li>";
                    }
                    
                } else {
                    for($i = 1; $i <= $pages; $i++) {
                        if($i == $pageNumber) {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./?act=san-pham&trang=".$i."' class='page_item_link active'>".$i."</a>
                        </li>";
                        } else {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./?act=san-pham&trang=".$i."' class='page_item_link'>".$i."</a>
                        </li>";
                        }
                    }
                }
                if($pageNumber < $pages) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./?act=san-pham&trang=".($pageNumber+1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-right'></i>
                    </a>
                </li>";
                }
                $paginationProduct.="</ul>
                </div>";
            return $paginationProduct;
    }

    function paginationProductByCategory($pageNumber, $pages, $currentCategory) {
        $paginationProduct = "<div class='pages'>
                <ul class='list_page'>";
                if($pageNumber > 1) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=".($pageNumber-1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-left' ></i>
                    </a>
                </li>";
                }
                if($pages >= 5) {
                    if($pages != $pageNumber) {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=".$pageNumber."' class='page_item_link active'>".$pageNumber."</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=".$pages."' class='page_item_link'>".$pages."</a>
                    </li>";
                    } else {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=1' class='page_item_link'>1</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=".$pages."' class='page_item_link active'>".$pages."</a>
                    </li>";
                    }
                    
                } else {
                    for($i = 1; $i <= $pages; $i++) {
                        if($i == $pageNumber) {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=".$i."' class='page_item_link active'>".$i."</a>
                        </li>";
                        } else {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=".$i."' class='page_item_link'>".$i."</a>
                        </li>";
                        }
                    }
                }
                if($pageNumber < $pages) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./?act=san-pham-danh-muc&id=".$currentCategory->getId()."&trang=".($pageNumber+1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-right'></i>
                    </a>
                </li>";
                }
                $paginationProduct.="</ul>
                </div>";
            return $paginationProduct;
    }

    function paginationProductByOrigin($pageNumber, $pages, $currentOrigin) {
        $paginationProduct = "<div class='pages'>
                <ul class='list_page'>";
                if($pageNumber > 1) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=".($pageNumber-1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-left' ></i>
                    </a>
                </li>";
                }
                if($pages >= 5) {
                    if($pages != $pageNumber) {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=".$pageNumber."' class='page_item_link active'>".$pageNumber."</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=".$pages."' class='page_item_link'>".$pages."</a>
                    </li>";
                    } else {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=1' class='page_item_link'>1</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=".$pages."' class='page_item_link active'>".$pages."</a>
                    </li>";
                    }
                    
                } else {
                    for($i = 1; $i <= $pages; $i++) {
                        if($i == $pageNumber) {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=".$i."' class='page_item_link active'>".$i."</a>
                        </li>";
                        } else {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=".$i."' class='page_item_link'>".$i."</a>
                        </li>";
                        }
                    }
                }
                if($pageNumber < $pages) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./?act=san-pham-nha-san-xuat&id=".$currentOrigin->getId()."&trang=".($pageNumber+1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-right'></i>
                    </a>
                </li>";
                }
                $paginationProduct.="</ul>
                </div>";
            return $paginationProduct;
    }
?>