<?php
/**
 * 定期更新 pornSite 数据库
 */

include "../../../common/common.php";
$database = new database();

// 获取目标网页内容
$webContent = file_get_contents("https://lspimg.com/pornsites.html");
//$webContent = file_get_contents("./text.html");

//echo $webContent;
$pattern = "/<li>(.*)<\/li>/";
preg_match_all($pattern, $webContent, $pat_array);
//print_r($pat_array[0]);

$newArray = Array();
$statusArray = Array();
for($i=0;$i<sizeof($pat_array[0]);$i++){
    $itemString = $pat_array[0][$i];
    // 从字符串中取出时间
    preg_match("/<li>(.*) \| <a/", $itemString, $timeArray);
    $time = $timeArray[0];
    $time = str_replace("<li>", "", $time);
    $time = str_replace("| <a", "", $time);
    // 从字符串中取出网址
    preg_match("/href=\"(.*)\">/", $itemString, $urlArray);
    $url = $urlArray[0];
    $url = str_replace("href=\"", "", $url);
    $url = str_replace("\">", "", $url);
    // 从字符串中取出title
    preg_match("/\">(.*)<\/a/", $itemString, $titleArray);
    $title = $titleArray[0];
    $title = str_replace("\">", "", $title);
    $title = str_replace("</a", "", $title);

    $itemArray = array(
        "itemString" => $itemString,
        "time" => $time,
        "url" => $url,
        "title" => $title
    );

    array_push($newArray, $itemArray);

    $status = $database->add_data("INSERT INTO `porn_site`(`url`, `title`, `sourceUpdateTime`) SELECT 
'$url', '$title', '$time' FROM DUAL WHERE NOT EXISTS(SELECT `url` FROM
`porn_site` WHERE `url` = '$url');");
    array_push($statusArray, $status);
}

print_r($statusArray);
