<link rel="stylesheet" type="text/css" href="enter.css">
<div class="fon">
<div class="tabel">
<?php


	include "bd.php";
	$str_out_users="SELECT * FROM `history`";
	$run_out_users=mysqli_query($connect,$str_out_users);
	

if (mysqli_num_rows($run_out_users)>0) {
	# code...

	echo "<table border=1 cellspacing=0>
		<tr>
			<th>№ п/п
			<th>Пользователь
			<th>Район
			<th>Улица
			<th>Транспорт
			<th colspan=2>Действия
		</tr>

	";

		}
			$str_out_users="SELECT * FROM `history` ORDER BY `id` DESC";
			$run_out_users=mysqli_query($connect,$str_out_users);

			$int_out_users=mysqli_num_rows($run_out_users);/*общее количество пользователей*/
			$page_number=$_GET['page_number'];/*страницы записанные на get*/
			if ($page_number == NULL) {
				$page_number=0;
			}/*определяем на какой мы странице*/
			$users_in_page=4;/*сколько хотим видеть пользователей на одной странице*/
			$sql_page_number= $page_number*$users_in_page;/*с какой строки будет вывод*/
			$str_out_users_page="SELECT * FROM `history` ORDER BY `history`.`id` ASC LIMIT $sql_page_number, $users_in_page";/*сортируем и ограничиваем*/
			$run_out_users_page=mysqli_query($connect, $str_out_users_page);
					$id=0;
					while ($out=mysqli_fetch_array($run_out_users_page)) 

							{
		echo "<tr>		
		<td align=center>$out[id]
		<td>$out[login]
		<td>$out[district]
		<td>$out[street]
		<td>$out[transport]
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
							echo "<div class=number><a href=index.php?page_number=$i><b>$p</b></a></div>";
							$p++;
						}
					?>
						<a href="index.php">На главную</a>
					</div>
</div>