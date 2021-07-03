<?php

$month = $_GET["month"];
$page = isset($_GET["page"])?$_GET["page"]:0;

require "../../../common/globalVar.php";
require "../../../common/database.php";

$start = 9*$page;

$news_list = select_more_data("select * from `rss_news` where `create_time` like '".clean_input_string($month)."%' order by `create_time` asc limit ".$start.",9");

$total_count = select_data("select count(*) as `count` from `rss_news` where `create_time` like '".clean_input_string($month)."%' ");

$echo_object["news_list"] = $news_list;
$echo_object["total_count"] = (int)$total_count["count"];

echo json_encode($echo_object);



