<?php
    function getAllBannerActive() {
        $sql = "SELECT * FROM tbl_banner WHERE status = 1 ORDER BY priority desc, id desc";
        return getAll($sql);
    }
?>