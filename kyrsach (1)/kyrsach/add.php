<link rel="stylesheet" type="text/css" href="enter.css">
<div class="welcome">
<form method="POST">
	<select name="district">
		<option name="idustrial">Индустриальный</option>
		<option name="lenin">Ленинский</option>
		<option name="october">Октябрьский</option>
		<option name="first">Первомайский</option>
		<option name="ysti">Устиного</option>
	</select><br>
	<input type="text" name="street" placeholder="Улица"><br>
	<input type="submit" name="new_add_str" placeholder="Добавить">
	<br><a href="index.php">На главную</a>
</form>
<?php
include 'bd.php';
$district=filter_var(trim($_POST['district']),FILTER_SANITIZE_STRING);
$street=filter_var(trim($_POST['street']),FILTER_SANITIZE_STRING);
$new_add_str=$_POST['new_add_str'];
if ($new_add_str) {
$add_street_str="INSERT INTO `street` (`district`, `street`) VALUES ('$district', '$street')";
$run_add_street=mysqli_query($connect,$add_street_str);
	}
?>
</div>