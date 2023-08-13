<?php
    function showCategory($categories) {
        $categoryHtml = "<ul class='list_nav_left'>";
        foreach($categories as $category) {
            $categoryHtml.= "<li class='item_nav_left'>
                <a href='./danh-muc/".$category['id']."/".vn_to_str($category['name'])."' class='item_nav_link'>".$category['name']."</a>
            </li>";
        }
        $categoryHtml.="</ul>";
        return $categoryHtml;
    }

    function showCategoryByOrigin($categories) {
        $categoryHtml = "<ul class='list_nav_left'>";
        foreach($categories as $category) {
            $categoryHtml.= "<li class='item_nav_left'>
                <a href='./nha-san-xuat/".$category['id']."/".vn_to_str($category['name'])."' class='item_nav_link'>".$category['name']."</a>
            </li>";
        }
        $categoryHtml.="</ul>";
        return $categoryHtml;
    }
?>