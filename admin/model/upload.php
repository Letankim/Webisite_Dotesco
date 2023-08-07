<?php   
    function uploadImg($path) {
        $target_dir = PATH_UPLOADS;
        $target_file = $target_dir . basename($path['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        if($uploadOk == 1) {
            move_uploaded_file($path["tmp_name"], $target_file);
        }
    }
?>