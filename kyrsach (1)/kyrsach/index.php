<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="fon">
<div class="sait">
<div class="head">
<div class="logo">
<a href="#">LOGO</a>
</div>
<div class="enter">
<?php
include 'bd.php';
$enter=$_POST['enter'];
$exit=$_POST['exit'];
$balance=$_POST['balance'];
$add=$_POST['add'];
if ($enter) {
$_SESSION['login']=$_POST['login'];
$_SESSION['password']=$_POST['password'];
$_SESSION['enter']=$_POST['enter'];
}
if ($exit) {
session_unset();
}
if ($_SESSION['enter']) {
$str_auth="SELECT * FROM users WHERE login='$_SESSION[login]' and password='$_SESSION[password]'";
$run_auth=mysqli_query($connect,$str_auth);
$out_auth=mysqli_fetch_array($run_auth);
$count_row=mysqli_num_rows($run_auth);
if($count_row){
echo "$out_auth[firstname] $out_auth[lastname]<br>
Баланс:$out_auth[balance]
<form method=POST>
<input type=submit name=exit value=Выйти>
</form>
";
if ($_SESSION['enter'] && $out_auth['role']==0) {
echo "<form method=POST action=balance.php>
<button name=login value=$_SESSION[login]>пополнить</button>
</form>";
}
}
else
{
include 'enter.php';
echo "Такого пользователя не существует";
session_unset();
}
}
else
{
include 'enter.php';
}
?>
</div>
				</div>
				<div class="info">
					<h1>Аренда Самокатов, Велосипедов, Сигвеев:</h1>
					<h2>Не дорогая аренда оборудования на короткий период.</h2>
				</div>
				<div class="how">
					<?php
					if ($_SESSION['enter'] && $out_auth['role']==1) {
						include 'admin.php';						
					}
					elseif ($_SESSION['enter'] && $out_auth['role']==0) {
						echo '<a href="order.php" class=order>На главную</a>';
					}
					else {
						echo "<h1>Как начать пользоваться нашим сайтом?</h1>
					<h2>Все просто.</h2>
					<h2>Вам ну всего лишь войти или зарегестрироваться на нашем сайте.</h2>
					<img src=img/strelka.png>";
					}
					?>
				</div>
				<div class="phone">
					<?php 
					if ($_SESSION['enter'] && $out_auth['role']==1) {
						echo '<a href="add.php">Добавить</a>
							<a href="history.php">История</a>';	}
					elseif ($_SESSION['enter'] && $out_auth['role']==0) {		

					}
					else {
						echo "<div class=text><h1>Наше мобильное приложение.</h1>
						<h2>С помошью нашего мобильного приложени вы сможете быстрее и проше брать на прокат наши транспортные средства.</h2></div>
						<div class=img>
						<img src=img/googleplay2.png>
						<img src=img/appstore.png></div>";
					}
					?>
				</div>
				<div class="footer">
					<div>Тел:<a href="#">8-800-555-35-35</a></div>
					<div>©Copyright2021</div>
					<div>Email:<a href="#">Samokat2021@mail.ru</a></div>
				</div>
			</div>
		</div>
	</body>
	</html>	
	




<!-- if ($enter==NULL) {
					echo "<form method=post>
						<input type=submit name=Enter value=Войти class=enter>
						</form>"; -->

	<!-- $login=$_POST["login"];
					$password=$_POST["password"];
					$firstname=$_POST["firstname"];
					$lastname=$_POST["lastname"];
					$balance=$_POST["balance"];
					$exit=$_POST["exit"];
					$enter=$_POST["enter"];
					if ($enter) {
					$str_auth="SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
					$run_auth=mysqli_query($connect,$str_auth);
					$out_auth=mysqli_fetch_array($run_auth);
					$check_users=mysqli_num_rows($run_auth);
				} -->