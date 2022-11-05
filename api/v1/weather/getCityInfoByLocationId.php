<?php
/**
 * 根据 locationId 获取城市信息
 */

include "../../../common/common.php";
$database = new database();

$echoArray = array();
if(isset($_GET["locationId"])){
    $locationId = addslashes($_GET["locationId"]);
    // 根据条件拼接SQL语句
    $sql = "select * from `china_city_list_latest` where `Location_ID` = '$locationId'";
    // 获取数据库内容
    $result = $database->get_single_data($sql);
    if($result != null){
        $echoArray = array(
            "success" => true,
            "result" => $result,
        );
    }else{
        $echoArray = array(
            "success" => false,
            "result" => null,
        );
    }
}else{
    $echoArray = array(
        "success" => false,
        "result" => null,
    );
}

echo json_encode($echoArray);
