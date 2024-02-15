<?php
include('config.php');

$url = "https://bot.argajaladri.or.id/index.php";


$api = "https://api.telegram.org/bot" . BOT_TOKEN . "/setWebhook?url=" . $url;

$r = file_get_contents($api);

echo $r;