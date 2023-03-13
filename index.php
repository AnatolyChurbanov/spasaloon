<?php
session_start();
if(empty($_GET['do'])){
   } else if ($_GET['do'] == 'logout') { 
    unset($_SESSION['username']);
    session_destroy();
   };
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>СПА-салон "SPA Thai'</title>
</head>
<body>
     <header>
        <h1>Добро пожаловать в СПА-салон "SPA Thai"</h1>
    <?php 
        if($_SESSION == true){ 
        echo '<a class="username" href="" target="_blank">' . $_SESSION['username'] . '</a></li>';
        echo ' <a href="index.php?do=logout" class = "button">Выйти</a> </li>';
        /* echo '<form id="exit" method="post" action="index.php"><button class = "button">Выйти</button></form><a class="button"</li>'; */
    }
    else {
        echo '<a class="button" href="login.php" target="_blank">Войти</a>';
    }
    ?>
        <nav class="top-menu">
            <a class="navbar-logo" href=""><img src="https://html5book.ru/wp-content/uploads/2017/04/lily-logo.png"></a>
            <ul class="menu-main">
              <li><a href="">СПА-салон</a></li>
              <li><a href="">Услуги СПА</a></li>
              <li><a href="">Отдельные зоны</a></li>
              <li><a href="">Контакты</a></li>
              <li><a href="">Акции</a></li>
              <li><a href="">+78005553535</a></li>
            </ul>
          </nav>   
     </header>

     <main>
        <div class="products">
            <ul class="products__list">
                <li class="products__item">
                    <h3 class="products__title">СПА для двоих</h3>
                    <img src="https://morskiebani.ru/images/двоих.jpg" alt="фото товара">
                </li>
        
                <li class="products__item">
                    <h3 class="products__title">Мальчишники и девичники</h3>
                    <img src="https://izhlife.ru/uploads/posts/2018-01/1517313546_ledyspa.jpg" alt="фото товара">
                </li>
        
                <li class="products__item">
                    <h3 class="products__title">Люкс услуги</h3>
                    <img src="https://www.tourmag.com/photo/art/grande/6569402-9907684.jpg?v=1398589151" alt="фото товара">
                </li>
        
                <li class="products__item">
                    <h3 class="products__title">Массаж</h3>
                    <img src="https://avatars.mds.yandex.net/get-altay/5534836/2a000001835b47f3a8d345e176b3f6611a2e/XXL" alt="фото товара">
                </li>
        
                <li class="products__item">
                    <h3 class="products__title">Водные процедуры</h3>
                    <img src="http://tonus38.ru/images/2021/02/11/65473b.jpg" alt="фото товара">
                </li>
        
                <li class="products__item">
                    <h3 class="products__title">Русская баня</h3>
                    <img src="https://pro-dachnikov.com/uploads/posts/2021-09/1632526649_35-p-banya-spa-foto-37.jpg" alt="фото товара">
                </li>
        
                <li class="products__item">
                    <h3 class="products__title">Турецкая баня</h3>
                    <img src="https://pro-dachnikov.com/uploads/posts/2021-09/1632383069_63-p-khamam-banya-foto-66.jpg" alt="фото товара">
                </li>
        
                <li class="products__item">
                    <h3 class="products__title">Японская баня</h3>
                    <img src="https://mykaleidoscope.ru/uploads/posts/2021-03/1615657604_37-p-yaponskaya-banya-sento-obraz-39.jpg" alt="фото товара">
                </li>
            </ul>
        </div>
        
     </main>

     <footer>

     </footer>
</body>
</html>
