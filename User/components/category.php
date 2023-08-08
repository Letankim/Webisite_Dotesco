<?php
    function showCategory($categories) {
        $categoryHtml = "<ul class='list_nav_left'>";
        foreach($categories as $category) {
            $categoryHtml.= "<li class='item_nav_left'>
                <a href='index.php?act=trangsanphamdanhmuc&id=".$category['id']."' class='item_nav_link'>".$category['name']."</a>
            </li>";
        }
        $categoryHtml.="</ul>";
        return $categoryHtml;
    }

    function showCategoryByOrigin($categories) {
        $categoryHtml = "<ul class='list_nav_left'>";
        foreach($categories as $category) {
            $categoryHtml.= "<li class='item_nav_left'>
                <a href='index.php?act=trangsanphamnhasanxuat&id=".$category['id']."' class='item_nav_link'>".$category['name']."</a>
            </li>";
        }
        $categoryHtml.="</ul>";
        return $categoryHtml;
    }
?>