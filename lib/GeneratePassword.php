<?php
function generatePassword($lengthOfPassword) {
    $letterUpper = "ABCDEFGHIJKLMNOQPRSTUYWVZX";
    $letterLower = "abcdefghijklmnoqprstuvwyzx";
    $number = "1234567890";
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