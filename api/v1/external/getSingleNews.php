<?php
/**
 * 根据ID获取其中一条新闻数据
 */

$id = $_GET["id"];
$year = $_GET["year"] ?? date('Y');

require "../../../common/globalVar.php";
require "../../../common/database.php";

echo json_encode(@select_data("select * from `news_".clean_input_string($year)."_archive` where `ID` = '".clean_input_string($id)."'"));
