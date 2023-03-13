<?php
session_start();
if(empty($_POST['name'])) {
} else {$_SESSION['username'] = $_POST['name'];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginstyles.css">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <label>Логин</label>
        <input type="text" placeholder="Введите логин" name='name'>
        <label>Пароль</label>
        <input type="password" placeholder="Введите пароль" name='pass'>
        <label>Подтверждение пароля</label>
        <input type="password" placeholder="Повторите пароль" name='pass_again'>
        <button>Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/login.php">авторизируйтесь</a>
        </p>

    </form>
</body>
</html>

<?php
  // Обработчик HTML-формы

  /////////////////////////////////////////////////
  // 1. Блок проверки правильности данных
  /////////////////////////////////////////////////

  // Проверяем не пустой ли суперглобальный массив $_POST
  if(empty($_POST['name'])) exit();
  // Проверяем правильно ли заполнены обязательные поля
  if(empty($_POST['name'])) exit('Поле "Имя" не заполнено');
  if(empty($_POST['pass'])) exit('Одно из полей "Пароль" не заполнено');
  if(empty($_POST['pass_again'])) exit('Одно из полей "Пароль" не заполнено');
  if($_POST['pass'] != $_POST['pass_again']) exit('Пароли не совпадают');


  /////////////////////////////////////////////////
  // 2. Блок проверки имени на уникальность
  /////////////////////////////////////////////////
  // Имя файла данных
  $filename = "text.txt"; 
  /* // Проверяем не было ли переданное имя
  // зарегистрировано ранее
  $arr = file($filename);
  foreach($arr as $line)
  {
    // Разбиваем строку по разделителю ::
    $data = explode("::",$line);
    // В массив $temp помещаем имена уже зарегистрированных
    // посетителей
    $temp[] = $data[0];
  }
  // Проверяем не содержится ли текущее имя
  // в массиве имён $temp
  if(in_array($_POST['name'], $temp))
  {
    exit("Данное имя уже зарегистрировано, пожалуйста, выберите другое");
  } */

  /////////////////////////////////////////////////
  // 3. Блок регистрации пользователя
  /////////////////////////////////////////////////
  // Помещаем данные в текстовый файл
  $fd = fopen($filename, "a");
  if(!$fd) exit("Ошибка при открытии файла данных");
  $str = $_POST['name']."::".
         md5(($_POST['pass']))."::".
  header('Location: login.php');
  fwrite($fd,$str);
  fclose($fd);
  // Осуществляем перезагрузку страницы,
  // чтобы сбросить POST-данные
?>