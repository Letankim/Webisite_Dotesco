<?php
    function paginationProduct($pageNumber, $pages) {
        $paginationProduct = "<div class='pages'>
                <ul class='list_page'>";
                if($pageNumber > 1) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./san-pham/".($pageNumber-1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-left' ></i>
                    </a>
                </li>";
                }
                if($pages >= 5) {
                    if($pages != $pageNumber) {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./san-pham/".$pageNumber."' class='page_item_link active'>".$pageNumber."</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='#' class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./san-pham/".$pages."' class='page_item_link'>".$pages."</a>
                    </li>";
                    } else {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./san-pham/1' class='page_item_link'>1</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='#' class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./san-pham/".$pages."' class='page_item_link active'>".$pages."</a>
                    </li>";
                    }
                    
                } else {
                    for($i = 1; $i <= $pages; $i++) {
                        if($i == $pageNumber) {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./san-pham/".$i."' class='page_item_link active'>".$i."</a>
                        </li>";
                        } else {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./san-pham/".$i."' class='page_item_link'>".$i."</a>
                        </li>";
                        }
                    }
                }
                if($pageNumber < $pages) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./san-pham/".($pageNumber+1)."' class='page_item_link'>
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
                    <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-".($pageNumber-1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-left' ></i>
                    </a>
                </li>";
                }
                if($pages >= 5) {
                    if($pages != $pageNumber) {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-".$pageNumber."' class='page_item_link active'>".$pageNumber."</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='#' class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-".$pages."' class='page_item_link'>".$pages."</a>
                    </li>";
                    } else {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-1' class='page_item_link'>1</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='#' class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-".$pages."' class='page_item_link active'>".$pages."</a>
                    </li>";
                    }
                    
                } else {
                    for($i = 1; $i <= $pages; $i++) {
                        if($i == $pageNumber) {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-".$i."' class='page_item_link active'>".$i."</a>
                        </li>";
                        } else {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-".$i."' class='page_item_link'>".$i."</a>
                        </li>";
                        }
                    }
                }
                if($pageNumber < $pages) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./danh-muc/".$currentCategory['id']."/".vn_to_str($currentCategory['name'])."/trang-".($pageNumber+1)."' class='page_item_link'>
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
                    <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-".($pageNumber-1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-left' ></i>
                    </a>
                </li>";
                }
                if($pages >= 5) {
                    if($pages != $pageNumber) {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-".$pageNumber."' class='page_item_link active'>".$pageNumber."</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='#' class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-".$pages."' class='page_item_link'>".$pages."</a>
                    </li>";
                    } else {
                        $paginationProduct.="<li class='page_item'>
                        <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-1' class='page_item_link'>1</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='#' class='page_item_link'>...</a>
                    </li>";
                    $paginationProduct.="<li class='page_item'>
                        <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-".$pages."' class='page_item_link active'>".$pages."</a>
                    </li>";
                    }
                    
                } else {
                    for($i = 1; $i <= $pages; $i++) {
                        if($i == $pageNumber) {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-".$i."' class='page_item_link active'>".$i."</a>
                        </li>";
                        } else {
                            $paginationProduct.="<li class='page_item'>
                            <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-".$i."' class='page_item_link'>".$i."</a>
                        </li>";
                        }
                    }
                }
                if($pageNumber < $pages) {
                    $paginationProduct.="<li class='page_item'>
                    <a href='./nha-san-xuat/".$currentOrigin['id']."/".vn_to_str($currentOrigin['name'])."/trang-".($pageNumber+1)."' class='page_item_link'>
                        <i class='bx bxs-chevron-right'></i>
                    </a>
                </li>";
                }
                $paginationProduct.="</ul>
                </div>";
            return $paginationProduct;
    }
?>