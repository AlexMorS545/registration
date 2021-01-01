<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" media="screen" href="v/style.css" />

  <title><?=$title?></title>
</head>
<body>
<div id="header">
  <h1><?=$title?></h1>
</div>

<div id="menu">
  <a href="index.php">Читать текст</a> |
  <a href="index.php?c=page&act=edit">Редактировать текст</a> |
	<?php if (!$user):?>
		<a href="index.php?c=user&act=reg">Регистрация</a> |
		<a href="index.php?c=user&act=login">Войти</a>
	<?php else:?>
		<a href="index.php?c=user&act=account">Личный кабинет</a> |
		<a href="index.php?c=user&act=logout">Выйти</a>
	<?php endif;?>
</div>
<div id="content">
<!--	--><?//=print_r($_SESSION['userId'])?>
  <?=$content?>
</div>

<div id="footer">
  Все права защищены. Адрес. Телефон.
</div>
</body>
</html>
