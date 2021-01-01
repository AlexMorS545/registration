<?php
/**
 * Шаблон страницы входа
 */
if (!isset($user)):
?>
	<form method="post" class="form">
		<input type="text" class="login" name="name" required placeholder="Ваше login">
		<input type="password" class="pass" name="pass" required placeholder="Ваш пароль">
		<button type="submit" class="btn" name="reg">Войти</button>
	</form>
<?php else:?>
	<?=$user?>
<?php endif;?>
