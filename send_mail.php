<?php 
//Если форма отправлена
  if (isset($_POST['submit'])) {
           //Проверка Поля ИМЯ
          if (trim($_POST['user_name']) == '') {
            $hasError = true;
            } else {
                $name =substr(htmlspecialchars(trim($_POST['user_name'])), 0, 50); 
                }
 
 //Проверка правильности ввода EMAIL
  if (trim($_POST['user_email']) == '')  {
  $hasError = true;
  } else if (!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,4})$/", trim($_POST['user_email']))) {
  $hasError = true;
  } else {
  $email =substr(htmlspecialchars(trim($_POST['user_email'])), 0, 30);  
  }
 //Проверка наличия ТЕКСТА сообщения
  if(trim($_POST['letter_text']) == '') {
  $hasError = true;
  } else {
  if(function_exists('stripslashes')) {
  $comments = stripslashes(trim($_POST['letter_text']));
  } else {
  $comments = wordwrap(htmlspecialchars(trim($_POST['letter_text'])), 50, "\r\n"); 
  }
  }
 //Если ошибок нет, отправить email
  if(!isset($hasError)) {
    $emailTo = 'mwp201@yandex.ru'; //Сюда введите Ваш email
    $body = 'Имя отправителя :'.$name."\r\n".'Email отправителя :'.$email."\r\n".'Тест сообщения :'.$comments;
    mail($emailTo, $body, $headers);
    $emailSent = true;
  }
      if ($emailSent == true) echo 'Спасибо! Ваше письмо отправлено.'; 
      else if ($hasError == true) echo 'Ваше письмо не отправлено! <br> Проверьте правильность заполнения полей!'; 
  }
?>


    <html>

    <head>
        <meta charset="UTF-8">
        <title>Отчет об отправлении</title>
    </head>

    <body>
        <a href="index.html">
            <input type="button" value="НАЗАД">
        </a>
    </body>

    </html>