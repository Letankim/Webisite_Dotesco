<?php
    function getAllBannerActive() {
        $sql = "SELECT * FROM tbl_banner WHERE status = 1 ORDER BY priority desc, id desc LIMIT 5";
        return getAll($sql);
    }
?>