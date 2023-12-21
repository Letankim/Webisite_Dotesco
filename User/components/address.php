<?php
    include_once "../../config/config.php";
    include_once PATH_ROOT_USER."/DAO/DistrictDao.php";
    include_once PATH_ROOT_USER."/DAO/WardDao.php";
    $data = $_POST['data'];
    $type = $_POST['type'];
    $htmlResponse = "";
    switch ($type) {
        case 0:
            $districtDao = new DistrictDao();
            $allDistrict = $districtDao->getAllByProvince($data);
            $htmlResponse.="<option value=''>Chọn Quận / Huyện</option>";
            foreach($allDistrict as $district) {
                $htmlResponse.="<option value='".$district->getDistrict_id()."'>".$district->getName()."</option>";;
            }
            echo $htmlResponse;
            break;
        case 1:
            $wardDao = new WardDao();
            $allWards = $wardDao->getAllByDistrict($data);
            foreach($allWards as $ward) {
                $htmlResponse.="<option value='".$ward->getWards_id()."'>".$ward->getName()."</option>";;
            }
            echo $htmlResponse;
            break;
        case 2:
            break;
        default:
        break;
    }
?>