<?php 
session_start();
?>
<link rel="stylesheet" type="text/css" href="enter.css">
<div class="fon">
<div class="welcome">
	<br><a href="index.php">На главную</a>
<form method="GET">
	<select name="sort_district">
	<option value="Индустриальный">Индустриальный</option>
	<option value="Ленинский">Ленинский</option>
	<option value="Октябрьский">Октябрьский</option>
	<option value="Первомайский">Первомайский</option>
	<option value="Устиного">Устиного</option>
	</select>
	<input type="submit" name="search" value="Искать">
	<input type="submit" name="new_add_od" value="Заказать">
	<select name="transport">
		<option value="Велосипед">Велосипед</option>
		<option value="Самокат">Самокат</option>
		<option value="Гироскутер">Гироскутер</option>
	</select>


<?php
include 'bd.php';
$transport=$_GET['transport'];
$new_add_od=$_GET['new_add_od'];
$login=$_SESSION['login'];
$street=$_GET['street'];
$district=$_GET['district'];
$sort_district=$_GET['sort_district'];
$search=$_GET['search'];

if ($search) {
	$str_district="SELECT * FROM `street` WHERE district LIKE '%$sort_district%'";
	$run_district=mysqli_query($connect,$str_district);
	echo "<select name=street>";
if (mysqli_num_rows($run_district)>0) {
	while ($out=mysqli_fetch_array($run_district)) {
	$id++;
	echo "<option value=$out[street]>$out[street]</option>";}
	echo "</select>";
}}
if ($new_add_od) {
	$add_od=mysqli_query($connect,"INSERT INTO `history` (`login`, `district`, `street`, `transport`) VALUES ('$login', '$sort_district', '$street', '$transport')");}
?>
</form>
</div></div>