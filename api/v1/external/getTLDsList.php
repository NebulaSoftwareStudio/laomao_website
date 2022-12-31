<?php
/**
 * 获取所有支持的顶级域名列表
 */

include "../../../common/common.php";
$database = new database();

$echoArray = array();

$sql = "select `id`, `tld` from `tlds_alpha_by_domain_list` where `is_delete` = 0";
// 获取数据库内容
$result = $database->get_multi_data($sql);

if ($result != null) {
    $echoArray = array(
        "success" => true,
        "result" => $result,
    );
} else {
    $echoArray = array(
        "success" => false,
        "result" => null,
    );
}


echo json_encode($echoArray);


