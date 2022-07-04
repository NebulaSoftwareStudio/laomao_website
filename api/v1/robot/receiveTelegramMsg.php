<?php

/**
 * 测试脚本，接收Telegram消息后自动回复机器人实现
 */

require "../../../common/globalVar.php";

$input = file_get_contents('php://input');
$input = json_decode($input, true);


$url = 'https://api.telegram.org/'.$GLOBALS['TELEGRAM_BOT_ID'].':'.$GLOBALS['TELEGRAM_BOT_ACCESS_TOKEN'].'/sendMessage';
//$param = "?chat_id=".$chatId."&text=".$text;
$data = [
    'chat_id' => $input["message"]["chat"]["id"],
    'text' => "你刚才说了什么“".$input["message"]["text"]."”是吧，我听不懂。给爷爬。",
];
$result = curl_post($url, $data);
$result = json_decode($result, true);
if ($result['ok'] == true) {
    echo true;
} else {
    echo false;
}

//$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//fwrite($myfile, json_encode($input));
//fclose($myfile);



function curl_post($url, $data)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}
