<?php
    include_once "../config/config.php";
    require_once PATH_ROOT_ADMIN."/DAO/StatisticalDao.php";
    $form = $_POST['form'];
    $to = $_POST['to'];
    $statisticalDao = new StatisticalDao();
    $result = $statisticalDao->getAllThongByDate($form, $to);
    foreach($result as $row) {
        $middle = strtotime($row->getDate());   
        $new_date = date('Y-m-d', $middle); 
        $chartResult[] = array(
            "soluongdonhang"=>$row->getSoluongdonhang(),
            "doanhthu"=>$row->getDoanhthu(),
            "date"=>$new_date,
        );
    }
    $chartResult = isset($chartResult) ? $chartResult : [];
    echo json_encode($chartResult);
?>