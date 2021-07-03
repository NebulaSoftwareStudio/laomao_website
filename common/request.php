<?php
/**
 * ***** PHP 常用请求方法封装 *****
 * * GET * POST * PUT * DELETE *
 *
 * User: Hanawa Hinata
 * Date: 2020/12/23
 * Time: 22:46
 */



// 使用 curl 发起 POST 请求
function postAction($url, $param) {
    $ch = curl_init();//初始化cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json;charset=utf-8'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING , 'utf-8');
    // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
    // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $data = curl_exec($ch);
    curl_close($ch);//释放cURL句柄
    return $data;
}


function getAction($url, $param){
    $ch = curl_init();//初始化cURL
    //抓取指定网页
    curl_setopt($ch,CURLOPT_URL,$url);
    //要求结果为字符串并输出到屏幕上
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //设置header
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_ENCODING , 'utf-8');
    //绕过ssl验证
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $data = curl_exec($ch);//执行并获得HTML内容
    curl_close($ch);//释放cURL句柄
    return $data;
}
