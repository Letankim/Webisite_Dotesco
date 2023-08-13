<?php
    function getAllBanner() {
        $sql = "SELECT * FROM tbl_banner ORDER BY priority desc, id DESC";
        return getAll($sql);
    }

    function searchBanner($searchBanner) {
        $searchBanner = validationInput($searchBanner);
        $sql = "SELECT * FROM tbl_banner WHERE name like '%".$searchBanner."%' ORDER BY id DESC";
        return getAll($sql);
    }

    function filterByBanner($status, $priority) {
        $sql = "SELECT * FROM tbl_banner WHERE status=$status AND priority = $priority ORDER BY id DESC";
        return getAll($sql);
    }

    function devicePageBanner($indexStart, $count) {
        $sql = "SELECT * FROM tbl_banner ORDER BY id DESC LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function getBannerByID($id) {
        $sql = "SELECT * FROM tbl_banner WHERE id='$id'";
        return getByID($sql);
    }

    function addNewBanner($img, $status, $priority, $date) {
        $sql = "INSERT INTO tbl_banner (img, status, priority, date) VALUES ('$img', '$status', '$priority', '$date')";
        insert($sql);
    }

    function updateBanner($id, $img,$status, $priority) {
        if($img != "") {
            $sql = "UPDATE tbl_banner SET img='".$img."', status='".$status."',priority='$priority' WHERE id=$id";
        } else {
            $sql = "UPDATE tbl_banner SET status='".$status."',priority='$priority' WHERE id=$id";
        }
        update($sql);
    }

    function deleteBanner($id) {
        $sql = "DELETE FROM tbl_banner WHERE id=$id";
        delete($sql);
    }
    function deleteAllBanner() {
        $sql = "DELETE FROM tbl_banner";
        delete($sql);
    }
?>