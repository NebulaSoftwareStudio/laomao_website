<?php
/**
 * 查询城市列表
 */

include "../../../common/common.php";
$database = new database();

$echoArray = array();
if(isset($_GET["keyword"])){
    $keyword = addslashes($_GET["keyword"]);
    // 根据条件拼接SQL语句
    $sql = "select * from `china_city_list_latest` where `Location_Name_ZH` like '%$keyword%' or
                                             `Location_Name_EN` like '%$keyword%' or
                                             `Adm1_Name_ZH` like '%$keyword%' or 
                                             `Adm1_Name_EN` like '%$keyword%' or 
                                             `Adm2_Name_ZH` like '%$keyword%' or 
                                             `Adm2_Name_EN` like '%$keyword%'";
    // 获取数据库内容
    $result = $database->get_multi_data($sql);
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
