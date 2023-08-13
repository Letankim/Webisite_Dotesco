<?php
    function getAllAccount() {
        $sql = "SELECT * FROM tbl_account ORDER BY role DESC, id DESC";
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

    function addNewAccount($username, $email,$password,$role, $status, $date) {
        $username = validationInput($username);
        $password = encodePassword($password);
        $sql = "INSERT INTO tbl_account (username, email,password, role, status, date) 
        VALUES ('$username', '$email','$password','$role', '$status', '$date')";
        insert($sql);
    }

    function isExistAccountForget($username, $email) {
        $sql = "SELECT * FROM tbl_account WHERE username = '$username' AND email = '$email'";
        return getByID($sql);
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
    function deleteAllAccount() {
        $sql = "DELETE FROM tbl_account";
        delete($sql);
    }

    function isExistAccount($username) {
        $sql = "SELECT * FROM tbl_account WHERE username = '$username'";
        return getByID($sql);
    }

    function resetPassword($lengthOfPassword) {
        $letterUpper = "ABCDEFGHIJKLMNOQPRSTUYWVZX";
        $letterLower = "abcdefghijklmnoqprstuvwyzx";
        $number = "123456789";
        $special = "!@#&^?$*";
        $newPassword = array();
        $ratio = rand(1, 4) % 4;
        for($i = 0; $i < $lengthOfPassword; $i++) {
            if($ratio == 1) {
                $newPassword[$i] = $letterUpper[rand(1, 26) % 26];
                $ratio = rand(1, 4) % 4;
            } else if($ratio == 2) {
                $newPassword[$i] = $letterLower[rand(1, 26) % 26];
                $ratio = rand(1, 4) % 4;
            } else if($ratio == 3) {
                $newPassword[$i] = $number[rand(1, 10) % 10];
                $ratio = rand(1, 4) % 4;
            } else {
                $newPassword[$i] = $special[rand(1, 8) % 8];
                $ratio = rand(1, 4) % 4;
            }
        }
        return $newPassword;
    }

    function updatePassword($id,$password) {
        $sql = "UPDATE tbl_account SET password = '$password' WHERE id = '$id'";
        update($sql);
    }
    
?>