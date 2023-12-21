<?php
function getArrayInSession($name) {
    $storeInSession = isset($_SESSION[$name]) ? $_SESSION[$name] : '';
    if(is_string($storeInSession)) {
        $storeInSession = unserialize($storeInSession);
    } else {
        $storeInSession = [];
    }
    $storeInSession = is_array($storeInSession) ? $storeInSession : [];
    return $storeInSession;
}
?>