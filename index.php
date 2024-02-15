<?php
include('config.php');

$bot = new Bot(BOT_TOKEN);

$url = "https://api.telegram.org/bot" . BOT_TOKEN;

// echo "Hello world";
$data = file_get_contents('php://input');
$logFile = "webhooksentdata.json";
$log = fopen($logFile, "a");
fwrite($log, $data);
fclose($log);

$getData = json_decode($data, true);
$userId = $getData['message']['from']['id'];

$userMessage = $getData['message']['text'];
$keyboard = "";
if ($userMessage == "Hi")
    $botMessage = "I Can Help You?";

if (strpos($userMessage, "/start") === 0) {
    $botMessage = "Hi";
    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => 'forward me to groups', 'callback_data' => 'press'],
                ['text' => 'forward me to groups', 'url' => 'https://argajaladri.or.id']
            ]
        ]
    ];
    $encodedKeyboard = json_encode($keyboard);

}

if (strpos($userMessage, "/hello") === 0) {
    $botMessage = "Saya disini";
    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => 'forward me to groups', 'url' => 'https://argajaladri.or.id']
            ]
        ]
    ];
    $userId = ID_CHANNEL;
    $encodedKeyboard = json_encode($keyboard);

}

$parameter = array(
    "chat_id" => $userId,
    "text" => $botMessage,
    "reply_markup" => $encodedKeyboard
);

$apiMessage = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiMessage);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));

$result = curl_exec($ch);
curl_close($ch);

var_dump($result);