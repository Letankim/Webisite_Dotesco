<?php
    function getAllCategory() {
        $sql = "SELECT * FROM tbl_category ORDER BY id DESC";
        return getAll($sql);
    }

    function searchCategory($searchCategory) {
        $searchCategory = validationInput($searchCategory);
        $sql = "SELECT * FROM tbl_category WHERE name like '%".$searchCategory."%' ORDER BY id DESC";
        return getAll($sql);
    }

    function filterByCategory($status) {
        $sql = "SELECT * FROM tbl_category WHERE status=$status ORDER BY id DESC";
        return getAll($sql);
    }

    function devicePage($indexStart, $count) {
        $sql = "SELECT * FROM tbl_category ORDER BY id DESC LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function getCategoryByID($id) {
        $sql = "SELECT * FROM tbl_category WHERE id='$id'";
        return getByID($sql);
    }

    function addNewCategory($name, $status, $date) {
        $name = validationInput($name);
        $sql = "INSERT INTO tbl_category (name, status, date) VALUES ('$name', '$status', '$date')";
        insert($sql);
    }

    function updateCategory($id, $name, $status) {
        $name = validationInput($name);
        $sql = "UPDATE tbl_category SET name='".$name."', status='".$status."' WHERE id=$id";
        update($sql);
    }

    function deleteCategory($id) {
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        delete($sql);
    }
    
    function deleteAllCategory() {
        $sql = "DELETE FROM tbl_category";
        delete($sql);
    }
?>