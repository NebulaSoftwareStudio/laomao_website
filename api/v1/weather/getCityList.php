<?php
/**
 * 查询城市列表
 */

require "../../../common/globalVar.php";
require "../../../common/database.php";

// 根据条件拼接SQL语句
$sql = "select * from `china_city_list_latest`";
if(isset($_GET["locationId"])){

}else{

}

// 获取数据库内容
$result = select_more_data($sql);
echo json_encode($result);