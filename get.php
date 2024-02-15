<?php
include('config.php');

$apiWebhookInfo = "https://api.telegram.org/bot" . BOT_TOKEN . "/getWebhookInfo";
$res = file_get_contents($apiWebhookInfo);
echo $res;