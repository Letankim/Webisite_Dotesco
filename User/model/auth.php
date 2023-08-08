<?php
    function addNewAccount($username, $email,$password,$role, $status) {
        $username = validationInput($username);
        $password = encodePassword($password);
        $sql = "INSERT INTO tbl_account (username, email,password, role, status) 
        VALUES ('$username', '$email','$password','$role', '$status')";
        insert($sql);
    }

    function isExistAccount($username) {
        $sql = "SELECT * FROM tbl_account WHERE username = '$username'";
        return getByID($sql);
    }

    function isExistAccountForget($username, $email) {
        $sql = "SELECT * FROM tbl_account WHERE username = '$username' AND email = '$email'";
        return getByID($sql);
    }

    function addAccount($username, $email, $password) {
        $sql = "INSERT INTO tbl_account (username, email,password, role, status)
         VALUES ('$username', '$email', '$password', 0, 1)";
        insert($sql);
    }

    function updatePassword($id,$password) {
        $sql = "UPDATE tbl_account SET password = '$password' WHERE id = '$id'";
        update($sql);
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
?>