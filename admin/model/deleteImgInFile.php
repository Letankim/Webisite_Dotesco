<?php
    function deletePathInFile($allPathDelete) {
        foreach ($allPathDelete as $item) {
            $path = PATH_UPLOADS.$item['source'];
            unlink($path);
        }
    }
?>