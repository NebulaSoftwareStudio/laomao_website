<?php
/**
 * 获取天气信息
 */

include "../../../common/common.php";
$database = new database();
$request = new httpRequest();

$location = $_GET["location"]??'';
$echoArray = array();
$city_info = $request->get_action("https://geoapi.qweather.com/v2/city/lookup?location=".$location."&key=".QWEATHER_KEY, null);
$city_info = json_decode($city_info);
if($city_info != null){
    if($city_info -> code === '200'){
        $city_info = $city_info -> location[0];
    }

    $weather_info = $request->get_action("https://devapi.qweather.com/v7/weather/now?location=".$location."&key=".QWEATHER_KEY, null);
    $weather_info = json_decode($weather_info);
    if($weather_info != null){
        if($weather_info -> code === '200'){
            $weather_info = $weather_info -> now;
        }

        $echoArray = array(
            "success" => true,
            "city_info" => $city_info,
            "weather_info" => $weather_info,
        );
    }else{
        $echoArray = array(
            "success" => false,
            "city_info" => null,
            "weather_info" => null,
        );
    }
}else{
    $echoArray = array(
        "success" => false,
        "city_info" => null,
        "weather_info" => null,
    );
}

echo json_encode($echoArray);

