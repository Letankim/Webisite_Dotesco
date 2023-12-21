<?php
require_once PATH_ROOT."/model/Image.php";
function uploadImage($target_dir, $pathImg) {
    $div = explode(".",$pathImg["name"]);
    if(count($div) > 0) {
        $imageFileType = strtolower(end($div));
        $unique_img = concat($div).date('YmdHis').".".$imageFileType;
        $target_file = $target_dir.$unique_img;
        $uploadOk = 1;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        if($uploadOk == 1) {
            move_uploaded_file($pathImg["tmp_name"], $target_file);
            $img = $unique_img;
            return $img;
        }
    }
    return "";
}

function concat($array) {
    $result = "";
    for($i = 0; $i < count($array)  - 1; $i++) {
        $result = $result.$array[$i];
    }
    return $result;
}

function uploadImgDesc($target_dir, $pathImg, $objectDao,  $idProduct) {
    $filename = $pathImg['name'];
    $fileTmp = $pathImg['tmp_name'];
    $isDone = false;
    if($filename[0] != "") {
        foreach ($filename as $key => $val)
        {
            $divDesc = explode(".",$val);
            $imageFileTypeDesc = strtolower(end($divDesc));
            $uploadOk = 1;
            if($imageFileTypeDesc != "jpg" && $imageFileTypeDesc != "png" && $imageFileTypeDesc != "jpeg"
            && $imageFileTypeDesc != "gif" ) {
                $uploadOk = 0;
            }
            if($uploadOk == 1) {
                $unique_img_desc = concat($divDesc).date('YmdHis').".".$imageFileTypeDesc;
                move_uploaded_file($fileTmp[$key], $target_dir.$unique_img_desc);
                $img = new Image(null, $idProduct, $unique_img_desc);
                $objectDao->addImgDesc($img);
                $isDone = true;
            }
        }
    }
    return $isDone;
}

function deletePathInFile($pathRoot, $allPathDelete) {
    foreach ($allPathDelete as $item) {
        $path = $pathRoot.$item->getSrc();
        unlink($path);
    }
}
?>