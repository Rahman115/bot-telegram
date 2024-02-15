<?php

define('BOT_TOKEN', '6722321373:AAH8AAzN9IPM2NBCyPGOYrHc7CYFJe2aBxM');
define('CHANNEL', '-1002055361849');
define('JOIN', 'https://t.me/+BmlAhs0rixEwOTQ1');
define('ID_CHANNEL', '-1002041569106');

class bot
{
    public $token;
    public $url;
    public function __construct($bot_token)
    {
        $this->token = $bot_token;
    }
    public function sends($param, $method = "")
    {
        
        $this->url = "https://api.telegram.org/bot" . $this->token . "/{$method}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function getData(){
        $data = file_get_contents('php://input');
        $getData = json_decode($data, true);

        return $getData;
    }
}