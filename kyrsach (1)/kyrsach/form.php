<?php
			$firstname=filter_var(trim($_POST['firstname']),FILTER_SANITIZE_STRING);
			$lastname=filter_var(trim($_POST['lastname']),FILTER_SANITIZE_STRING);
			$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
			$password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
			$number_card=filter_var(trim($_POST['number_card']),FILTER_SANITIZE_STRING);
			$reg=$_POST["reg"];
			if ($reg && mb_strlen($number_card) < 15 || mb_strlen($number_card) > 17) {
				echo "неправильно набран Номер карты";
				exit();
			}
			elseif ($reg && mb_strlen($login) < 6 || mb_strlen($login) > 16) {
				echo "неправильно набран Логин";
				exit();
			}
			elseif ($reg && mb_strlen($password) < 6 || mb_strlen($password) > 16) {
				echo "неправильно набран Пароль";
				exit();
			}
			if ($reg) {
				$str_add_user="INSERT INTO `users` (`firstname`, `lastname`, `login`, `password`, `number_card`) VALUES ('$firstname', '$lastname', '$login', '$password', '$number_card');";
			$run_add_user=mysqli_query($connect,$str_add_user);
			
			if ($run_add_user) {
			echo "<script>window.location = 'index.php';</script>";
			}
			else
			{
			echo "<div class=total><b>Ошибка</b></div>";
			}
			}
			else {
			}
?>