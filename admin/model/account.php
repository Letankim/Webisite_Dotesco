<?php
    function getAllAccount() {
        $sql = "SELECT * FROM tbl_account ORDER BY id DESC";
        return getAll($sql);
    }

    function searchAccount($searchCategory) {
        $searchCategory = validationInput($searchCategory);
        $sql = "SELECT * FROM tbl_account WHERE username like '%".$searchCategory."%' ORDER BY id DESC";
        return getAll($sql);
    }

    function filterByAccount($status) {
        $sql = "SELECT * FROM tbl_account WHERE status=$status ORDER BY id DESC";
        return getAll($sql);
    }

    function devicePageAccount($indexStart, $count) {
        $sql = "SELECT * FROM tbl_account ORDER BY id DESC LIMIT $indexStart, $count";
        return getAll($sql);
    }

    function getAccountByID($id) {
        $sql = "SELECT * FROM tbl_account WHERE id='$id'";
        return getByID($sql);
    }

    function getAccountByUsername($username) {
        $sql = "SELECT * FROM tbl_account WHERE username='$username'";
        return getByID($sql);
    }

    function addNewAccount($username, $email,$password,$role, $status) {
        $username = validationInput($username);
        $password = encodePassword($password);
        $sql = "INSERT INTO tbl_account (username, email,password, role, status) 
        VALUES ('$username', '$email','$password','$role', '$status')";
        insert($sql);
    }

    function updateAccount($id, $password, $email,$status, $role) {
        $password = encodePassword($password);
        $sql = "UPDATE tbl_account SET password='".$password."', email='".$email."', role ='".$role."',status='".$status."' WHERE id=$id";
        update($sql);
    }

    function deleteAccount($id) {
        $sql = "DELETE FROM tbl_account WHERE id=$id";
        delete($sql);
    }

    function isExistAccount($username) {
        $sql = "SELECT * FROM tbl_account WHERE username = '$username'";
        return getByID($sql);
    }
    
?>