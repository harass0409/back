	<?php
	include 'bd.php';
	$edit_lastname=$_POST['edit_lastname'];
	$edit_firstname=$_POST['edit_firstname'];
	$edit_login=$_POST['edit_login'];
	$edit_balance=$_POST['edit_balance'];
	$edit=$_POST['edit'];
	$red_id=$_GET['red_id'];

if ($edit) {
	
	$str_upd_user="UPDATE `users` SET `lastname` = '$edit_lastname',`firstname` = '$edit_firstname',`login` = '$edit_login',`balance` = '$edit_balance' WHERE `id` = $red_id;";
	$run_upd_user=mysqli_query($connect,$str_upd_user);
	# code...
}


	$str_out_users="SELECT * FROM `users` WHERE id=$red_id";
	$run_out_users=mysqli_query($connect,$str_out_users);
	$out=mysqli_fetch_array($run_out_users);

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Редактирование пользователя <?php echo "$out[login]";?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="enter.css">
</head>
<body>
	<div class="fon">
	<div class="welcome">
	<form method="POST">
		<input type="text" name="edit_lastname" placeholder="Фамилия" value="<?php echo $out[lastname]?>"><br>
		<input type="text" name="edit_firstname" placeholder="Имя" value="<?php echo $out[firstname]?>"><br>
		<input type="text" name="edit_login" placeholder="Логин" value="<?php echo $out[login]?>"><br>
		<input type="text" name="edit_balance" placeholder="Баланс" value="<?php echo $out[balance]?>"><br>
		<input type="submit" name="edit" value="Изменить"><br>
	</form>
	<a href="index.php">На главную</a>

	<?php
	if ($edit && $out) {
		echo "<br>Изменения сохранены";
	}
	else
	{
	}
	?></div></div>
</body>
</html>