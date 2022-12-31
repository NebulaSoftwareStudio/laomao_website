<?php

$year = $_GET["year"] ?? date('Y');
$month = $_GET["month"];
$page = $_GET["page"] ?? 0;
$pageSize = $_GET["pageSize"] ?? 9;

include "../../../common/common.php";
$database = new database();

$start = $pageSize*$page;

$news_list = $database -> get_multi_data("select * from `news_".$database -> clean_input_string($year)."_archive` where `create_time` like '".$database -> clean_input_string($month)."%' order by `create_time` asc limit ".$start.",".$pageSize);

$total_count = $database -> get_single_data("select count(*) as `count` from `news_".$database -> clean_input_string($year)."_archive` where `create_time` like '".$database -> clean_input_string($month)."%' ");

$echo_object["news_list"] = $news_list;
$echo_object["total_count"] = (int)$total_count["count"];
$echo_object["test_info"] = $pageSize;

echo json_encode($echo_object);



