<link rel="stylesheet" type="text/css" href="style.css">
<?php
				include "bd.php";

	$del_id=$_GET['del_id'];
	$str_del_user="DELETE FROM `users` WHERE id = $del_id ";
	$run_del_user=mysqli_query($connect,$str_del_user);
	$str_out_users="SELECT * FROM `users`";
	$run_out_users=mysqli_query($connect,$str_out_users);
	

if (mysqli_num_rows($run_out_users)>0) {
	echo "<table border=1 cellspacing=0>
		<tr>
			<th>№ п/п
			<th>Логин
			<th>Пароль
			<th>Имя
			<th>Фамилия
			<th>Номер карты
			<th>Баланс
			<th>Роль
			<th colspan=2>Действия
		</tr>

	";

		}
			$str_out_users="SELECT * FROM `users` ORDER BY `id` DESC";
			$run_out_users=mysqli_query($connect,$str_out_users);

			$int_out_users=mysqli_num_rows($run_out_users);/*общее количество пользователей*/
			$page_number=$_GET['page_number'];/*страницы записанные на get*/
			if ($page_number == NULL) {
				$page_number=0;
			}/*определяем на какой мы странице*/
			$users_in_page=4;/*сколько хотим видеть пользователей на одной странице*/
			$sql_page_number= $page_number*$users_in_page;/*с какой строки будет вывод*/
			$str_out_users_page="SELECT * FROM `users` ORDER BY `users`.`id` ASC LIMIT $sql_page_number, $users_in_page";/*сортируем и ограничиваем*/
			$run_out_users_page=mysqli_query($connect, $str_out_users_page);
					$id=0;
					while ($out=mysqli_fetch_array($run_out_users_page)) 

							{
		$id++;
		switch ($out[role]) {
			case '1':
				$out[role]=Администратор;
				break;
									
			case '0':
				$out[role]=Пользователь;
				break;
		}
		echo "<tr>		
		<td align=center>$out[id]
		<td>$out[login]
		<td>$out[password]
		<td>$out[firstname]
		<td>$out[lastname]
		<td>$out[number_card]
		<td>$out[balance]
		<td>$out[role]
		<td><a href=?del_id=$out[id] class=delete>Удалить</a>
		<td><a href=edit.php?red_id=$out[id] class=edit>Изменить</a>
	  	</tr>";
							}/*вывод пользователей*/
					echo "</table>";
					$float_count=$int_out_users%4;
					$int_count=floor($int_out_users/4);
					$p=1;

					if ($float_count>0) {
						$int_count++;
					}
						for ($i=0; $i < $int_count; $i++) { 
							echo "<div class=number><a href=?page_number=$i><b>$p</b></a></div>";
							$p++;
						}
					?>