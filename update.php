<?php
include('config.php');

$apiGetUpdate= "https://api.telegram.org/bot" . BOT_TOKEN . "/getUpdates";
$up = file_get_contents($apiGetUpdate);
var_dump($up);  