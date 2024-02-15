<?php
include('config.php');

$parameter = array(
    "chat_id" => CHANNEL
);

$bot = new bot(BOT_TOKEN);
$resp = $bot->sends($parameter, "getChat");

echo $resp;