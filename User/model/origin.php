<?php
    function getAllOriginActive() {
        $sql = "SELECT * FROM tbl_origin WHERE status=1 ORDER BY id DESC";
        return getAll($sql);
    }

    function getOriginByID($id) {
        $sql = "SELECT * FROM tbl_origin WHERE status=1 AND id=$id";
        return getByID($sql);
    }
?>