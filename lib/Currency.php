<?php
    function currency_format($number, $suffix = 'vnđ') {
        if (!empty($number)) { 
            return number_format($number, 0, ',', '.') . " {$suffix}";
        }
        if($number <= 0) {
            return 0;
        }
    }
?>