<?php
include('config.php');

if (isset($_REQUEST['POST'])) {
    $userId = $_POST['id'];
    $msg = $_POST['input_text'];
// https://t.me/argajaladr_bot/your_app?startapp
    $parameter = array(
        "chat_id" => $userId,
        "text" => $msg,
        "parse_mode" => "html"
    );
    var_dump($parameter);

    $apiMessage = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiMessage);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));

    $result = curl_exec($ch);
    curl_close($ch);

    var_dump($result);
}

?>
<!DOCTYPE html>
<html>

<body>

    <h2>HTML Forms</h2>

    <form action="/class.php" method="post">
        <input type="hidden" name="id" value="<?php echo ID_CHANNEL; ?>">
        <input type="text" name="input_text">
        <input type="submit" name="submit" value="submit">
    </form>

</body>

</html>

