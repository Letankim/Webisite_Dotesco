<?php
    function getAllCategoryActive() {
        $sql = "SELECT * FROM tbl_category WHERE status=1 ORDER BY id DESC";
        return getAll($sql);
    }

    function getCategoryNewLimit($number) {
        $sql = "SELECT C.id FROM tbl_category as C join tbl_product as P 
        on C.id = P.idCategory
        WHERE C.status=1 and P.status = 1
        GROUP BY C.id HAVING count(P.id) > 0
        ORDER BY id desc LIMIT $number";
        return getAll($sql);
    }

    function getCategoryByID($id) {
        $sql = "SELECT * FROM tbl_category WHERE id =$id";
        return getByID($sql);
    }

    function getCategoryFooter() {
        $sql = "SELECT * from tbl_category where status=1 LIMIT 6";
        return getAll($sql);
    }
?>