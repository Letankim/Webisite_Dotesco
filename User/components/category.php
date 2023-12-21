<?php
    function showCategory($categories) {
        $categoryHtml = "<ul class='list_nav_left'>";
        foreach($categories as $category) {
            $id = $category->getId();
            $name = $category->getName();
            $categoryHtml.= "<li class='item_nav_left'>
                <a href='?act=san-pham-danh-muc&id=".$id."' class='item_nav_link'>".$name."</a>
            </li>";
        }
        $categoryHtml.="</ul>";
        return $categoryHtml;
    }
    function showCategoryInMain($categories) {
        $categoryHtml = "<ul class='list_nav_left'>";
        $index = 0;
        foreach($categories as $category) {
            $id = $category->getId();
            $name = $category->getName();
            $index++;
            if($index == 7) {
                break;
            }
            $categoryHtml.= "<li class='item_nav_left'>
                <a href='?act=san-pham-danh-muc&id=".$id."' class='item_nav_link'>".$name."</a>
            </li>";
        }
        $categoryHtml.= "<li class='item_nav_left'>
                <a href='?act=san-pham' class='item_nav_link'>Xem tất cả</a>
            </li>";
        $categoryHtml.="</ul>";
        return $categoryHtml;
    }

    function showCategoryByOrigin($categories) {
        $categoryHtml = "<ul class='list_nav_left'>";
        foreach($categories as $category) {
            $id = $category->getId();
            $name = $category->getName();
            $categoryHtml.= "<li class='item_nav_left'>
                <a href='?act=san-pham-nha-san-xuat&id=".$id."' class='item_nav_link'>".$name."</a>
            </li>";
        }
        $categoryHtml.="</ul>";
        return $categoryHtml;
    }
?>