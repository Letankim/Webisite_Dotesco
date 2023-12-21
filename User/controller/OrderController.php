<?php
require_once PATH_ROOT_USER."/DAO/ProductDao.php";
require_once PATH_ROOT_USER."/DAO/CategoryDao.php";
require_once PATH_ROOT_USER."/DAO/OriginDao.php";
require_once PATH_ROOT_USER."/DAO/BillDao.php";
require_once PATH_ROOT_USER."/DAO/EmailDao.php";
require_once PATH_ROOT_USER."/DAO/BillDetailDao.php";
require_once PATH_ROOT_USER."/DAO/ProvinceDao.php";
require_once PATH_ROOT_USER."/DAO/DistrictDao.php";
require_once PATH_ROOT_USER."/DAO/WardDao.php";
require_once PATH_ROOT_APP."/model/Cart.php";
require_once PATH_ROOT_APP."/model/Bill.php";
require_once PATH_ROOT_APP."/model/BillDetail.php";
require_once PATH_ROOT_APP."/lib/Time.php";
require_once PATH_ROOT_APP."/mail/sendmail.php";
require_once PATH_ROOT_APP."/mail/orderConfirmation.php";
require_once PATH_ROOT_APP."/lib/GetArraySession.php";
class OrderController {
    private static $productDao;
    private static $categoryDao;
    private static $originDao;
    private static $emailAdmin;
    private static $provinceDao;

    function __construct() {
        self::$productDao = new ProductDao();
        self::$categoryDao = new CategoryDao();
        self::$originDao = new OriginDao();
        self::$provinceDao = new ProvinceDao();
        $emailDao = new EmailDao();
        $emailRecipients = $emailDao->getEmailReply();
        if($emailRecipients == null) {
            $emailRecipients = "letankim2003@gmail.com";
        } else {
            $emailRecipients = $emailRecipients->getEmail();
        }
        self::$emailAdmin = $emailRecipients;
    }

    public function orderBuyNow() {
        $allProvince = self::$provinceDao->getAll();
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $isCart = false;
        if(isset($_POST['order'])) {
            $id = $_POST['idProduct'];
            $numberOfProduct = $_POST['numberOfProduct'];
            $boughtProduct = self::$productDao->getOneByID($id);
            if($boughtProduct == null || ($boughtProduct != null && $boughtProduct->getStatus() == 0)) {
                header("Location: ./?act=404");
            } else {
                include_once PATH_ROOT_USER."/order.php";
            }
        } else {
            header("Location: ./?act=404");
        }
    }

    public function orderByCart() {
        $allProvince = self::$provinceDao->getAll();
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        $isCart = true;
        $allCart = getArrayInSession("cart");
        include_once PATH_ROOT_USER."/order.php";
    }

    public function order() {
        if(isset($_POST['confirm-order'])) {
            $districtDao = new DistrictDao();
            $wardDao = new WardDao();
            $idUser = 0;
            if(isset($_SESSION['idUser'])) {
                $idUser = $_SESSION['idUser'];
            }
            $id_bill = 0;
            $isOrder = "";
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $province = $_POST['province'];
            $district = $_POST['district'];
            $wards = $_POST['wards'];
            $payment = $_POST['methodPay'];
            $address = $wardDao->getOneByID($wards)->getName().
            ", ".$districtDao->getOneByID($district)->getName().
            ", ".self::$provinceDao->getOneByID($province)->getName();
            $detailsAddress =  $_POST['address-details'];
            $createAt = getCurrentTime();
            if(isset($_POST['cart']) && $_POST['cart']) {
                $_SESSION['buy_with-cart'] = true;
                $storeCart = getArrayInSession("cart");
                $totalByCart = 0;
                $detailCarts = array();
                if(isset($storeCart) && !empty($storeCart)) {
                    foreach($storeCart as $itemCart) {
                        $idProduct = $itemCart->getId();
                        $model = $itemCart->getModel();
                        $nameProduct = $itemCart->getName(); 
                        $numberOfProduct = $itemCart->getNumberOfProduct();
                        $price = $itemCart->getPrice();
                        $totalItem = $price * $numberOfProduct;
                        $totalByCart += $totalItem;
                        $billDetail = new BillDetail(null, $idProduct, $model, $nameProduct,null, $numberOfProduct, $price, $totalItem);
                        $detailCarts[] = $billDetail;
                    }
                }
                $bill = new Bill(null, $name, $address, $detailsAddress, $phone,$email,$idUser, $createAt, null, null, 1, $payment, null, $totalByCart, null);
                if($payment == 1) {
                    $_SESSION['billSaveInSession'] = serialize($bill);
                    $_SESSION['billDetailSaveInSession'] = serialize($detailCarts);
                    $_SESSION['total_pay_with_bank'] = $totalByCart; 
                    include_once PATH_ROOT_APP."/vnpay/new_pay.php";
                    $_SESSION['isOrderBank'] = true;
                } else {
                    $this->orderNowByCash($bill, $detailCarts);
                }
            } else {
                $idProduct = $_POST['idProduct'];
                $numberOfProduct = $_POST['numberOfProduct'];
                $currentProduct = self::$productDao->getOneByID($idProduct);
                $nameProduct = $currentProduct->getName();
                $model = $currentProduct->getModelID();
                $price = $currentProduct->getPrice();
                $priceSale = $currentProduct->getPriceSale();
                $priceLast = $price - $priceSale;
                $totalItem = $numberOfProduct * $priceLast;
                $bill = new Bill(null, $name, $address, $detailsAddress, $phone, $email,$idUser, $createAt, null, null, 1, $payment, null, $totalItem, null);
                $billDetail = new BillDetail(null, $idProduct, $model, $nameProduct,null, $numberOfProduct, $priceLast, $totalItem); 
                $arrayDetailBill = array();
                $arrayDetailBill[] = $billDetail;
                if($payment == 1) {
                    $_SESSION['billSaveInSession'] = serialize($bill);
                    $_SESSION['billDetailSaveInSession'] = serialize($arrayDetailBill);
                    $_SESSION['total_pay_with_bank'] = $totalItem; 
                    include_once PATH_ROOT_APP."/vnpay/new_pay.php";
                    $_SESSION['isOrderBank'] = true;
                } else {
                    $this->orderNowByCash($bill, $arrayDetailBill);
                }
            }
        } else {
            header("Location: ./?act=404");
        }
    }

    public function orderNowWithVnPay() {
        $isOrderNow = isset($_SESSION['isOrderBank']) ? $_SESSION['isOrderBank'] : false;
        $billDao = new BillDao();
        $billDetailDao =  new BillDetailDao();
        $statusPayment = $_GET['vnp_TransactionStatus'];
        $transactionCode = $_GET['vnp_TransactionNo'];
        $_SESSION['orderedStatus'] = true;
        if($statusPayment == '00') {
            if ($isOrderNow) {
                $billSaveInSession = unserialize($_SESSION['billSaveInSession']);
                $billSaveInSession->setTransactionCode($transactionCode);
                $listBillDetailInSession = getArrayInSession("billDetailSaveInSession");
                $id_bill = $billDao->addToBill($billSaveInSession);
                if($id_bill >= 1) {
                    $isOrder = 0;
                    foreach($listBillDetailInSession as $billDetailSaveInSession) {
                        $billDetailSaveInSession->setIdBill($id_bill);
                        $isOrder = $billDetailDao->addToDetailBill($billDetailSaveInSession);
                        $index = 0;
                        while($isOrder <= 0) {
                            $isOrder = $billDetailDao->addToDetailBill($billDetailSaveInSession);
                            $index++;
                            if($index == 3) {
                                break;
                            }
                        }
                    }
                    if($isOrder >= 1) {
                        $formSendBill = orderConfirmation($billSaveInSession, $listBillDetailInSession);
                        $formSendBillAdmin = orderConfirmationToAdmin($billSaveInSession, $listBillDetailInSession);
                        $emailCustomer = $billSaveInSession->getEmail();
                        $isSend = sendmail("Thông báo đơn hàng mới", $formSendBill, $emailCustomer, "Dotesco", self::$emailAdmin);
                        $isSend = sendmail("Thông báo đơn hàng mới", $formSendBillAdmin, self::$emailAdmin, "Dotesco", "");
                        header("Location: ?act=order-success");
                    } else {
                        header("Location: ?act=order-fail");
                    }
                } else {
                    header("Location: ?act=404");
                }
                unset($_SESSION['billSaveInSession']);
                unset($_SESSION['billDetailSaveInSession']);
            }
        } else {
            header("Location: ?act=order-fail");
        }
    }

    public function orderNowByCash($bill, $listBillDetail) {
        $isOrderNow = isset($_SESSION['isOrderNow']) ? $_SESSION['isOrderNow'] : false;
        $billDao = new BillDao();
        $billDetailDao =  new BillDetailDao();
        $id_bill = $billDao->addToBill($bill);
        $_SESSION['orderedStatus'] = true;
        if($id_bill >= 1) {
            $isOrder = 0;
            foreach($listBillDetail as $billDetail) {
                $billDetail->setIdBill($id_bill);
                $isOrder = $billDetailDao->addToDetailBill($billDetail);
                $index = 0;
                while($isOrder <= 0) {
                    $isOrder = $billDetailDao->addToDetailBill($billDetail);
                    $index++;
                    if($index == 3) {
                        break;
                    }
                }
            }
            if($isOrder >= 1) {
                $formSendBill = orderConfirmation($bill, $listBillDetail);
                $formSendBillAdmin = orderConfirmationToAdmin($bill, $listBillDetail);
                $emailCustomer = $bill->getEmail();
                $isSend = sendmail("Thông báo đơn hàng mới", $formSendBill, $emailCustomer, "Dotesco", self::$emailAdmin);
                $isSend = sendmail("Thông báo đơn hàng mới", $formSendBillAdmin, self::$emailAdmin, "Dotesco", "");
                header("Location: ?act=order-success");
            } else {
                header("Location: ?act=order-fail");
            }
        } else {
            header("Location: ?act=order-fail");
        }
    }

    public function orderStatus($status) {
        $allCategoryActive = self::$categoryDao->getAllActive();
        $allOriginActive = self::$originDao->getAllActive();
        include_once PATH_ROOT_USER."/components/navigation.php";
        if(isset($_SESSION['orderedStatus']) && $_SESSION['orderedStatus'] == true) {
            if($status == 'success') {
                include_once PATH_ROOT_USER."/orderSuccess.php";
                if(isset($_SESSION['buy_with-cart']) && $_SESSION['buy_with-cart'] == true) {
                    $_SESSION['cart'] = serialize(array());
                    unset($_SESSION['buy_with-cart']);
                }
            } else {
                include_once PATH_ROOT_USER."/orderFail.php";
            }
            unset($_SESSION['total_pay_with_bank']);
            unset($_SESSION['orderedStatus']);
        } else {
            header("Location: ?act=404");
        }
    }
}
?>