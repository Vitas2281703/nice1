<?php
 
  $sendto = "veretenov.vit@gmail.com"; // почта, на которую будет приходить письмо !!! Измените на свою!!!
  $username = $_POST['name']; // сохраняем в переменную данные полученные из поля c именем
  $usertel = $_POST['telephone']; // сохраняем в переменную данные полученные из поля c телефонным номером
 // проверяем наличие данных в чекбоксе и сохраняем их
  $adapt = '';
    if (empty($_POST["adapt"]))
    {
       $adapt = "Адаптивный дизайн не нужен";
    }
    elseif (!empty($_POST["adapt"]) && is_array($_POST["adapt"]))
    {
       $adapt = implode(" ", $_POST["adapt"]);
    }
 

 
// Формирование заголовка письма
  $subject = "Новый клиент!";
  $headers = "From: " . strip_tags($sendto) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($sendto) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
 
// Формирование тела письма
  $msg = "<html><body style='font-family:Montserrat;'>";
  $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
  $msg .= "<p><strong>Имя клиента:</strong> ".$username."</p>\r\n";
  $msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
  $msg .= "</body></html>";
 
// отправка сообщения
  if(@mail($sendto, $subject, $msg, $headers)) {
  echo "<center><img src='images/vkladka4.png'></center>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
  } else {
  echo "<center><img src='images/ne-tpravleno.png'></center>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
  }
 
?>