<?php
include('config.php');
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    $data = file_get_contents('php://input');
    $logFile = "webhooksentdata.json";
    $log = fopen($logFile, "a");
    fwrite($log, $data);
    fclose($log);

    $getData = json_decode($data, true);

    $userId = $_POST['id'];
    $msg = $_POST['input_text'];

    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => 'Go To', 'url' => 'https://argajaladri.or.id']
            ]
        ]
    ];
    $encodedKeyboard = json_encode($keyboard);

    $parameter = array(
        "chat_id" => $userId,
        "text" => urlencode($msg),
        "reply_markup" => $encodedKeyboard
    );
    // var_dump($parameter);

    $apiMessage = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiMessage);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));

    $result = curl_exec($ch);
    curl_close($ch);

    // var_dump($result);
    header("Location: https://t.me/+BmlAhs0rixEwOTQ1");
}