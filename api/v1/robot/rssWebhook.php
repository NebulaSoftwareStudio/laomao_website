<?php

require "../../../common/globalVar.php";
require "../../../common/database.php";

$arrContextOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),
);

$buff = file_get_contents("https://www.solidot.org/index.rss", false, stream_context_create($arrContextOptions));

// 解析XML文件
$result = simplexml_load_string($buff, 'SimpleXMLElement', LIBXML_NOCDATA);
$result = json_decode(json_encode($result), true);
$list = $result['channel']['item'];

for ($i = 0; $i < sizeof($list); $i++) {
    $list[$i]["content"] = str_replace('<p><img src=\"https:\/\/img.solidot.org\/\/0\/446\/liiLIZF8Uh6yM.jpg\" height=\"120\" style=\"display:block\"\/><\/p>', "", $list[$i]["content"]);
}


// 从数据库获取上次推送的状态
$latest_info = select_data("select * from `rss_news` order by `create_time` desc limit 0,1");


// 调用 WebHook 推送消息
for ($i = sizeof($list); $i >= 0; $i--) {
    if (strtotime($list[$i]["pubDate"]) > strtotime($latest_info["create_time"])) {
        
        
        // 推送
        $pushData["msgtype"] = "actionCard";
        $pushData["actionCard"]["title"] = $list[$i]["title"];
        $pushData["actionCard"]["text"] = "![screenshot](https://laomao.website/assets/images/sites/solidot.jpg)\n" .
            "### " . $list[$i]["title"] . " \n" . strip_tags($list[$i]["description"]) . substr(0, 255);
        $pushData["actionCard"]["btnOrientation"] = "0";
        $pushData["actionCard"]["singleTitle"] = "阅读全文";
        $pushData["actionCard"]["singleURL"] = $list[$i]["link"];

        // 获取钉钉消息推送 hook Token
        $currentTime = getMillisecond();
        $access_token = $GLOBALS['DINGTALK_BOT_ACCESS_TOKEN'];
        $key = $GLOBALS['DINGTALK_BOT_KEY'];
        $keyEncode = $key;
        $keyString = "$currentTime\n$keyEncode";
        $keyStringEncode = $keyString;
        $hashResult = urlencode(base64_encode(hash_hmac( 'sha256', $keyStringEncode, $keyEncode, true)));
        $webhook = "https://oapi.dingtalk.com/robot/send?access_token=$access_token&timestamp=$currentTime&sign=$hashResult";
        $result = request_by_curl($webhook, json_encode($pushData));
        echo $result;


        //插入数据库
        insert_data("INSERT INTO `rss_news` (`ID`, `title`, `link`, `description`, `create_time`, `content`) VALUES 
                    (NULL, '" . $list[$i]["title"] . "', '" . $list[$i]["link"] . "', '" . addslashes(strip_tags($list[$i]["description"]) . substr(0, 255)) . "', 
                    '" . (date('Y-m-d H:i:s', strtotime($list[$i]["pubDate"]))) . "', 
                    '" . addslashes($list[$i]["description"]) . "')");

    }
}


// 使用 curl 发起 POST 请求
function request_by_curl($remote_server, $post_string)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
    // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function getMillisecond() 
{
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}

