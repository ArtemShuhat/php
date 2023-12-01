<?php
include 'credits.php'; 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$txt = $_POST['text'];

$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Email' => $email,
  "text" => $txt
);
$text = "";

foreach($arr as $key => $value) {
  $text .= "<b>".$key."</b> ".$value."%0A";
}; 

$sendToTelegram = fopen("https://api.telegram.org/bot{TOKEN}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$text}","r"); 
if ($sendToTelegram) {
  echo "OK";
} else {
  echo "Error";
}