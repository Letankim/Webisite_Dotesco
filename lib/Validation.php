<?php
function validationInput($value) {
    $result = "";
    for($i = 0; $i < strlen($value); $i++) {
        if($value[$i] == "'") {
            $result.="''";
        } else {
            $result.=$value[$i];
        }
    }
    return $result;
}
?>