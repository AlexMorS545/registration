<?php
/**
 * Шаблон личного кабинета
 */
foreach ($user as $u):
?>
<h1>Добро пожаловать! <?=$u['login']?></h1>
<h3>Ваш email! <?=$u['email']?></h3>
<?php endforeach;?>
