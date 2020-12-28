<?php

/* https://api.telegram.org/bot1495758595:AAGqG6E1TqsTsiGgnpYvh1nbGkxu_IPII_E/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */


$name = $_POST['user_name'];
$surname = $_POST['user_surname'];
$age = $_POST['user_age'];
$map = $_POST['user_map'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$token = "Tokeningizni qoyasiz!";
$chat_id = "Telegram Gruppa ID si";
$arr = array(
  '👨‍💼 Ползователь: ' => $name . " ". $surname . " ;",
  '🕑 Лет: ' => $age . ";",
  '🗺 Местонохождения: ' => $map . " ;",
  '📲 Телефон: ' => $phone . " ;",
  '📧 Email: ' => $email . " ;",
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};


if(mb_strlen($name) <= 4 || mb_strlen($name) >= 10){
  echo "Недопустима, Длина имя: (От 4 до 10)!" ;
  exit();
}else{
  if(mb_strlen($surname) <= 4 || mb_strlen($surname) >= 15){
    echo "Недопустима, Длина фамилии: (От 4 до 15)!" ;
    die();
  }else{
    if(mb_strlen($age) <= 1 || mb_strlen($age) > 2){
      echo "Недопустима, Длина лет: (От 1 до 3)!" ;
      exit();
    }
    else{
      if(mb_strlen($map) <= 5 || mb_strlen($age) > 15){
        echo "Недопустима, Длина местонохождения: (От 5 до 15)!" ;
        exit();
      }
      
      else
      {
        if(mb_strlen($email) <= 6 || mb_strlen($email) >= 30)
        {
          echo "Недопустима, Длина Email: (От 5 до 20)!" ;
          exit();
        }
        else{
          $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
        
          if ($sendToTelegram) 
          {
            echo '<script>let url = "https://t.me/joinchat/JHw2MBss7cPDGjtoZBfaGw" ; window.location = url;</script>'; 
          }
          
          else 
          {
              echo "Error";
          }
        }
      }
    }
  }
  exit();
}  
?>