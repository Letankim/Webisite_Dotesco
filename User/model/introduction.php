<?php
    function getIntroduction() {
        $sql = "SELECT * FROM tbl_introduction WHERE status = 1 ORDER BY id desc LIMIT 1";
        return getByID($sql);
    }
?>