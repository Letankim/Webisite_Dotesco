<?php
    function getAllNguonGoc() {
        $sql = "SELECT * FROM tbl_origin ORDER BY id DESC";
        return getAll($sql);
    }

    function searchNguonGoc($searchNguonGoc) {
        $searchNguonGoc = validationInput($searchNguonGoc);
        $sql = "SELECT * FROM tbl_origin WHERE name like '%".$searchNguonGoc."%' ORDER BY id DESC";
        return getAll($sql);
    }

    function filterByNguonGoc($status) {
        $sql = "SELECT * FROM tbl_origin WHERE status=$status ORDER BY id DESC";
        return getAll($sql);
    }

    function devicePageNguonGoc($indexStart, $count) {
        $sql = "SELECT * FROM tbl_origin ORDER BY id DESC LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function getNguonGocByID($id) {
        $sql = "SELECT * FROM tbl_origin WHERE id='$id'";
        return getByID($sql);
    }

    function addNewNguonGoc($name, $country,$status) {
        $name = validationInput($name);
        $country = validationInput($country);
        $sql = "INSERT INTO tbl_origin (name,country,status) VALUES ('$name', '$country','$status')";
        insert($sql);
    }

    function updateNguonGoc($id, $name, $country,$status) {
        $name = validationInput($name);
        $country = validationInput($country);
        $sql = "UPDATE tbl_origin SET name='".$name."', country = '".$country."',status='".$status."' WHERE id=$id";
        update($sql);
    }

    function deleteNguonGoc($id) {
        $sql = "DELETE FROM tbl_origin WHERE id=$id";
        delete($sql);
    }

    
    
?>