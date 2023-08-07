<?php
    function encodePassword($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashedPassword;
    }

    function decodePassword($user, $password) {
        if(count($user) > 0) {
            return password_verify($password, $user[0]['password']);
        }
        return false;
    }
?>