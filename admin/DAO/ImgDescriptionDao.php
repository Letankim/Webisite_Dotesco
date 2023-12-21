<?php
require_once PATH_ROOT_ADMIN."/DBConnection/ConnectionAdmin.php";
require_once PATH_ROOT."/model/Image.php";
class ImgDescriptionDao {
    private static $db;
    function __construct() {
        self::$db = new ConnectionAdmin();
    }

    private function img($row) {
        $id = $row['id'];
        $idProduct = $row['idProduct'];
        $src = $row['src'];
        $image = new Image($id, $idProduct, $src);
        return $image;
    }

    public function getImageDescByProduct($idProduct) {
        $params = array(":idProduct"=>$idProduct);
        $sql = "SELECT * FROM tbl_image WHERE idProduct=:idProduct";
        $resultSQL = self::$db->getAll($sql, $params);
        $images = array();
        foreach ($resultSQL as $row) {
            $images[] = $this->img($row);
        }
        return $images;
    }

    function deleteImgDescProduct($idProduct) {
        $params = array(":idProduct"=>$idProduct);
        $sql = "DELETE FROM tbl_image WHERE idProduct=:idProduct";
        return self::$db->delete($sql, $params);
    }

    function addImgDesc($image) {
        $params = array(
            ":idProduct"=>$image->getIdProduct(),
            ":src"=>$image->getSrc()
        );
        $sql = "INSERT INTO tbl_image (idProduct, src) VALUES (:idProduct, :src)"; 
        return self::$db->insert($sql, $params);
    }
}
?>