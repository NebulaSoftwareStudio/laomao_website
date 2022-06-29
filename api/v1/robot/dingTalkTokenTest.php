<?php 
// 获取钉钉消息推送 hook Token
// $currentTime = getMillisecond();
$currentTime = '1653122990383';
$access_token = "1f9cc6956f1a2d1250e663b21ca700b27f923d8f74427621eec766d303da07f0";
$key = "SECab806e9d8b37dc8a931e210ea2135141729d60c433fb69d80779121eea033349";
$keyEncode = $key;
$keyString = "$currentTime\n$keyEncode";
$keyStringEncode = $keyString;
$hashResult = urlencode(base64_encode(hash_hmac( 'sha256', $keyStringEncode, $keyEncode, true)));
// $webhook = "https://oapi.dingtalk.com/robot/send?access_token=$access_token&timestamp=$currentTime&sign=$hashResult";
echo "$currentTime";
echo "\n";
echo "$keyStringEncode";
echo "\n";
echo "$hashResult";
echo "\n";
echo "sCt0TVgIgWMmCaS%2F6Fom79WO%2FAqeClgRiaEoVv1fQW8%3D  ----  对照组";
