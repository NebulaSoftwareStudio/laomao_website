<?php

/**
 * Class httpRequest
 * 外部 HTTP 请求相关操作
 */
class httpRequest
{
    private function curl_request($url, $param, $method){
        $ch = curl_init();                                             // 初始化cURL
        curl_setopt($ch,CURLOPT_URL,$url);                      // 抓取指定网页
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // 要求结果为字符串并输出到屏幕上
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
        curl_setopt($ch, CURLOPT_HEADER, 0);                // 设置header
        // 线下环境不用开启 curl 证书验证, 未调通情况可尝试添加该代码
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        if($method == 'POST'){
            curl_setopt($ch,CURLOPT_POST,1);               // Post 请求方式
            curl_setopt($ch,CURLOPT_POSTFIELDS, $param);         // 参数
        } else if ($method === 'GET') {
            // 参数
            if (isset($param)) {
                $url = $url . "?";
                foreach ($param as $key => $value) {
                    $url = $url . $key . "=" . $value;
                }
            }
        }
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function get_action($url, $param){
        $this -> curl_request($url, $param, 'GET');
    }

    public function post_action($url, $param){
        $this -> curl_request($url, $param, 'POST');
    }
}
