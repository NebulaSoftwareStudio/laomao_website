<?php
/**
 * 获取 solidot RSS 内容，更新数据库并推送给群聊机器人
 */

include "../../../common/common.php";
$database = new database();
$httpRequest = new httpRequest();


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

//for ($i = 0; $i < sizeof($list); $i++) {
//    $list[$i]["description"] = str_replace('<p><img src=\"https:\/\/img.solidot.org\/\/0\/446\/liiLIZF8Uh6yM.jpg\" height=\"120\" style=\"display:block\"\/><\/p>', "", $list[$i]["description"]);
//}

// 从数据库获取上次推送的状态
$latest_info = $database->get_single_data("select * from `rss_news` order by `create_time` desc limit 0,1");


// 调用 WebHook 推送消息
//print_r($list[0]["title"]);
for ($i = sizeof($list)-1; $i >= 0; $i--) {
    if (strtotime($list[$i]["pubDate"]) > strtotime($latest_info["create_time"])) {

        // 拼接推送数据
        $pushData["msgtype"] = "actionCard";
        $pushData["actionCard"]["title"] = $list[$i]["title"];
        $pushData["actionCard"]["text"] = "![screenshot](https://laomao.website/assets/images/sites/solidot.jpg)\n" .
            "### " . $list[$i]["title"] . " \n" . strip_tags($list[$i]["description"]) . substr(0, 255);
        $pushData["actionCard"]["btnOrientation"] = "0";
        $pushData["actionCard"]["singleTitle"] = "阅读全文";
        $pushData["actionCard"]["singleURL"] = $list[$i]["link"];

        // 获取钉钉消息推送 hook Token
        $currentTime = getMilliSecond();
        $access_token = DINGTALK_BOT_ACCESS_TOKEN;
        $key = DINGTALK_BOT_KEY;
        $keyEncode = $key;
        $keyString = "$currentTime\n$keyEncode";
        $keyStringEncode = $keyString;
        $hashResult = urlencode(base64_encode(hash_hmac( 'sha256', $keyStringEncode, $keyEncode, true)));
        $webhook = "https://oapi.dingtalk.com/robot/send?access_token=$access_token&timestamp=$currentTime&sign=$hashResult";
        $result = $httpRequest -> post_action($webhook, json_encode($pushData));
        echo $result;

//         $post_text = '* ' . $list[$i]["title"] . ' * ' . strip_tags($list[$i]["description"]);
//         $telegramUrl = "https://api.telegram.org/".TELEGRAM_BOT_ID.":".TELEGRAM_BOT_ACCESS_TOKEN."/sendMessage?chat_id=-1001194014875&parse_mode=Markdown&text=" . $post_text;
//         $result = $httpRequest -> post_action($telegramUrl, '{}');
//         echo $result;

        //插入数据库
        $sql = "INSERT INTO `rss_news` (`ID`, `title`, `link`, `description`, `create_time`, `content`, `source`, `classify`) VALUES
                    (NULL, '" . $list[$i]["title"] . "', '" . $list[$i]["link"] . "', '" . addslashes(strip_tags($list[$i]["description"]) . substr(0, 255)) . "',
                    '" . (date('Y-m-d H:i:s', strtotime($list[$i]["pubDate"]))) . "',
                    '" . addslashes($list[$i]["description"]) . "', 'solidot', '-')";
        $result = $database -> add_data($sql);
        echo $result;

    }
}


function getMilliSecond()
{
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}

