<?php
/**
 * 获取最新的单条新闻
 */

include "../../../common/common.php";
$database = new database();

echo json_encode($database->get_single_data("select * from `rss_news` order by `ID` desc limit 1"));
