<?php
require_once PATH_ROOT_USER."/DBConnection/ConnectionUser.php";
require_once PATH_ROOT_APP."/model/Image.php";
class ImageDescriptionDao {
    private static $db;

    public function __construct()
    {
        self::$db = new ConnectionUser();
    }

    private function img($row) {
        $id = $row['id'];
        $idProduct = $row['idProduct'];
        $src = $row['src'];
        $image = new Image($id, $idProduct, $src);
        return $image;
    }

    function getImageDescByProduct($idProduct) {
        $params = array(":idProduct"=>$idProduct);
        $sql = "SELECT * FROM tbl_image WHERE idProduct = :idProduct";
        $resultSQL = self::$db->getAll($sql, $params);
        $images = array();
        foreach ($resultSQL as $row) {
            $images[] = $this->img($row);
        }
        return $images;
    }
}

?>