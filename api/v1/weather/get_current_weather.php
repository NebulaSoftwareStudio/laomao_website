<?php
/**
 * 天气
 */
require "../../../common/globalVar.php";
require "../../../common/request.php";
$location = $_GET["location"];

$city_info = getAction("https://geoapi.qweather.com/v2/city/lookup?location=".$location."&key=".$GLOBALS['QWEATHER_KEY'], "");
$city_info = json_decode($city_info);
if($city_info -> code === '200'){
    $city_info = $city_info -> location[0];
}

$weather_info = getAction("https://devapi.qweather.com/v7/weather/now?location=".$location."&key=".$GLOBALS['QWEATHER_KEY'], "");
$weather_info = json_decode($weather_info);
if($weather_info -> code === '200'){
    $weather_info = $weather_info -> now;
}

$echoArray = array(
    "city_info" => $city_info,
    "weather_info" => $weather_info,
);

echo json_encode($echoArray);

