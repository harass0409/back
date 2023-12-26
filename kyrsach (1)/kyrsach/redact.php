<?php
	include 'bd.php';
	$edit_firstname=$_POST['edit_firstname'];
	$edit_lastname=$_POST['edit_lastname'];
	$edit_login=$_POST['edit_login'];
	$edit_password=$_POST['edit_password'];
	$edit_number_card=$_POST['edit_number_card'];
	$edit_balance=$_POST['edit_balance'];
	$edit=$_POST['edit'];
	$red_id=$_GET['red_id'];

if ($edit) {
	
	$str_upd_user="UPDATE `users` SET `lastname` = '$edit_lastname',`firstname` = '$edit_firstname',`login` = '$edit_login',`password` = '$edit_password' ,`number_card` = '$edit_number_card' ,`balance` = '$edit_balance' WHERE `id` = $red_id;";
	$run_upd_user=mysqli_query($connect,$str_upd_user);
	echo "$str_upd_user";
}


	$str_out_users="SELECT * FROM `users` WHERE id=$red_id";
	$run_out_users=mysqli_query($connect,$str_out_users);
	$out=mysqli_fetch_array($run_out_users);

	?>
	<p>Редактирование пользователя <?php echo "$out[login]";?></p>
	<form method="POST">
		<input type="text" name="edit_fam" placeholder="Фамилия" value="<?php echo $out[fam]?>"><br>
		<input type="text" name="edit_name" placeholder="Имя" value="<?php echo $out[name]?>"><br>
		<input type="text" name="edit_login" placeholder="Логин" value="<?php echo $out[login]?>"><br>
		<input type="password" name="edit_password" placeholder="Пароль" value="<?php echo $out[password]?>"><br>
		<input type="password" name="edit_pass" placeholder="Банковская карта" value="<?php echo $out[number_card]?>"><br>
		<input type="password" name="edit_pass" placeholder="Баланс" value="<?php echo $out[balance]?>"><br>
	</form>
		<?php
	if ($run_upd_user) {
		echo "Изменения сохранены";
	}
	else
	{
		echo "Ошибка при сохранении";
	}
	?>
