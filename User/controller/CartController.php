<?php
require_once PATH_ROOT_USER."/DAO/ProductDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_APP."/model/Cart.php";
require_once PATH_ROOT_APP."/lib/GetArraySession.php";
class CartController {
    private static $productDao;
    private static $categoryDao;
    private static $originDao;
    function __construct() {
        self::$productDao = new ProductDao();
        self::$categoryDao = new CategoryDao();
        self::$originDao = new OriginDao();
    }

    public function userCart() {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $allCart = getArrayInSession('cart');
        include_once PATH_ROOT_USER."/cart.php";
    }

    public function addToCart() {
        if(isset($_POST['addToCart'])) {
            $idProduct = $_POST['id'];
            $currentProduct = self::$productDao->getOneByID($idProduct);
            $name = $currentProduct->getName();
            $model = $currentProduct->getModelID();
            $img = $currentProduct->getImg();
            $price = $currentProduct->getPrice();
            $priceSale = $currentProduct->getPriceSale();
            $lastPrice = $price - $priceSale;
            $numberOfProduct = $_POST['numberAddCard'];
            $total = $lastPrice * $numberOfProduct;
            $cart = new Cart($idProduct,$name, $model, $img, $lastPrice, $numberOfProduct,$total);
            $this->saveToCart($cart);
            header("Location: ./?act=gio-hang");
        } else {
            header("Location: ./?act=404");
        }
    }

    function saveToCart($cart) {
        $storeCart = getArrayInSession('cart');
        $isExistProduct = 0;
        for ($i=0; $i < count($storeCart); $i++) { 
            $idCartOld = $storeCart[$i]->getId();
            $idCartAdd = $cart->getId();
            $total = $storeCart[$i]->getTotal();
            if($idCartOld == $idCartAdd){
                $isExistProduct = 1;
                $newNumberOfProduct = $cart->getNumberOfProduct() + $storeCart[$i]->getNumberOfProduct();
                $storeCart[$i]->setNumberOfProduct($newNumberOfProduct);
                $storeCart[$i]->setTotal($newNumberOfProduct * $cart->getPrice() + $total);
                break;
            }
        }
        if($isExistProduct == 0){
            $storeCart[]=$cart;
        }
        $_SESSION['cart'] = serialize($storeCart);
    }

    public function deleteItemCart() {
        if(isset($_GET['idCart']) && ($_GET['idCart']>=0)){
            $storeCart = getArrayInSession('cart');
            $idDelete = $_GET['idCart'];
            array_splice($storeCart, $idDelete,1);
            $_SESSION['cart'] = serialize($storeCart);
            header("Location: ./?act=gio-hang");
        } else {
            header("Location: ./?act=404");
        }
    }

    public function deleteAllCart() {
        if(isset($_GET['isDeleted'])&&($_GET['isDeleted'])){
            $_SESSION['cart'] = serialize([]);
            header("Location: ./?act=gio-hang");
        } else {
            header("Location: ./?act=404");
        }
    }
}
?>