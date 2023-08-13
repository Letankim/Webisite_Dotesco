<?php
    function getAllIntroduction() {
        $sql = "SELECT * FROM tbl_introduction ORDER BY id DESC";
        return getAll($sql);
    }

    function devicePageIntroduction($indexStart, $count) {
        $sql = "SELECT * FROM tbl_introduction ORDER BY id DESC LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function getIntroductionByID($id) {
        $sql = "SELECT * FROM tbl_introduction WHERE id='$id'";
        return getByID($sql);
    }

    function addNewIntroduction($content, $status, $date) {
        $content = validationInput($content);
        $sql = "INSERT INTO tbl_introduction (content, status, date) VALUES ('$content', '$status', '$date')";
        insert($sql);
    }

    function updateIntroduction($id, $content, $status) {
        $content = validationInput($content);
        $sql = "UPDATE tbl_introduction SET content='".$content."', status='".$status."' WHERE id=$id";
        update($sql);
    }

    function deleteIntroduction($id) {
        $sql = "DELETE FROM tbl_introduction WHERE id=$id";
        delete($sql);
    }
    function deleteAllIntroduction() {
        $sql = "DELETE FROM tbl_introduction";
        delete($sql);
    }
?>