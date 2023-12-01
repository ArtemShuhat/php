<?php
include_once 'credits.php';

if (isset($_POST['submit'])) {
    $apiToken = TOKEN;
    $data = [
        'chat_id' => CHAT_ID,
        'text' => $_POST['message'],
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
}