<?php
/**
 * 测试脚本，接收Telegram消息后自动回复机器人实现
 */

include "../../../common/common.php";
$httpRequest = new httpRequest();

$input = file_get_contents('php://input');
$input = json_decode($input, true);

$url = 'https://api.telegram.org/' . TELEGRAM_BOT_ID . ':' . TELEGRAM_BOT_ACCESS_TOKEN . '/sendMessage';
$data = [
    'chat_id' => $input["message"]["chat"]["id"],
    'text' => "你刚才说了什么“" . $input["message"]["text"] . "”是吧，我听不懂。给爷爬。",
];
$result = $httpRequest -> post_action($url, json_encode($data));
$result = json_decode($result, true);
if ($result['ok'] == true) {
    echo true;
} else {
    echo false;
}


