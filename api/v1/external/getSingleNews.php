<?php
/**
 * 根据ID获取其中一条新闻数据
 */

$id = $_GET["id"];
$year = $_GET["year"] ?? date('Y');

include "../../../common/common.php";
$database = new database();

echo json_encode($database->get_single_data("select * from `news_" . $database->clean_input_string($year) . "_archive` 
where `ID` = '" . $database->clean_input_string($id) . "'"));
