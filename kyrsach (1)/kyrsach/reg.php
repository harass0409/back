<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="enter.css">
</head>
<body>
	<div class="fon">
		<div class="welcome">
			Регистрация
			<form method="POST">
			<br><input type="text" name="firstname" placeholder="Имя">
			<br><input type="text" name="lastname" placeholder="Фамилия">
			<br><input type="text" name="login" placeholder="Логин (от 6 до 16)">
			<br><input type="password" name="password" placeholder="Пароль (от 6 до 16)">
			<br><input type="text" name="number_card" placeholder="Номер карты">
			<br><input type="submit" name="reg" value="Регистрация" class="reg">
			</form>
			<a href="index.php">На главную</a>
		<?php
			include "bd.php";
			include "form.php"
			
/*			if ($run_add_user) {
			echo "<script>window.location = 'enter.php';</script>";
			}
			else
			{
			echo "<div class=total><b>Ошибка</b></div>";
			}
			}
			else {
			}*/
			?>
		</div>
	</div>
</body>
</html>