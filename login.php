<?php
session_start();
$_SESSION['username'] = $_POST['name'];
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

<?php
  // Имя файла данных
  $filename = "text.txt"; 
  // Определяем константу FIRST для
  // того, чтобы точно определить 
  // был ли выполнен файл 1.php
  define("FIRST",1);
  // Проверяем не пусто ли содержимое
  // массива $_POST - если это так, 
  // выводим форму для авторизации
  if(empty($_POST))
  {
    ?>
       <form action="" method="post">
        <label>Логин</label>
        <input type="text" placeholder="Введите логин" name='name'>
        <label>Пароль</label>
        <input type="password" placeholder="Введите пароль" name='pass'>
        <button>Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>
        </p>
    </form>
   <?php
  }
  // В противном случае, если POST-данные
  // переданы - обрабатываем их
  else
  {
    // Проверяем корректность введённого имени
    // и пароля
    $arr = file($filename);
    $i = 0;
    $temp = array();
    foreach($arr as $line)
    {
      // Разбиваем строку по разделителю ::
      $data = explode("::",$line);
      // В массив $temp помещаем имена и пароли
      // зарегистрированных посетителей
      $temp['name'][$i]     = $data[0];
      $temp['password'][$i] = $data[1];
      // Увеличиваем счётчик
      $i++;
    }
    // Если в массиве $temp['name'] нет введённого
    // логина - останавливаем работу скрипта
    if(!in_array($_POST['name'],$temp['name']))
    {
      exit("Пользователь с таким именем не зарегистрирован");
    }
    // Если пользователь с именем $_POST['name'] обнаружен
    // проверяем правильность введённого пароля
    $index = array_search($_POST['name'],$temp['name']);
    if(md5($_POST['pass']) != $temp['password'][$index])
    {
      exit("Пароль не соответствует логину");
    }
    header('Location: index.php');
  }
  ?>
    
</body>
</html>


